<?php

namespace Jeancsil\DynamicDBBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerAware;
use Jeancsil\DynamicDBBundle\Resolver\UrlResolver;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Bundle\FrameworkBundle\HttpKernel;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpFoundation\Response;

class DynamicDBConfiguratorListener extends ContainerAware
{
	private $urlResolver;

	public function __construct(
		UrlResolver $urlResolver,
		ContainerInterface $container
	){
		$this->urlResolver = $urlResolver;
		$this->container = $container;
	}

	public function onKernelLoadConfiguration(GetResponseEvent $event)
	{
		if(HttpKernel::MASTER_REQUEST != $event->getRequestType()){
			return;
		}

		try {
			$companyData = $this->urlResolver->resolve(
				$event->getRequest()->server->get('SERVER_NAME')
			);
		} catch (AccessDeniedHttpException $e) {
			throw new \Exception($e->getMessage());
		}

		$event->getRequest()->attributes->set('company', $companyData);

		$this->switchDatabase(
			$companyData->getDbName(),
			$companyData->getDbUser(),
			$companyData->getDbPass()
		);
	}

	/**
	 * @param string $dbName
	 * @param string $dbUser
	 * @param string $dbPass
	 * @see http://stackoverflow.com/a/9291896
	 */
	private function switchDatabase($dbName, $dbUser, $dbPass)
	{
		$connection = $this->container->get(sprintf('doctrine.dbal.%s_connection', 'customer'));
		$connection->close();

		$refConn = new \ReflectionObject($connection);
		$refParams = $refConn->getProperty('_params');
		$refParams->setAccessible('public');

		$params = $refParams->getValue($connection);
		$params['dbname'] = $dbName;
		$params['user'] = $dbUser;
		$params['password'] = $dbPass;

		$refParams->setAccessible('private');
		$refParams->setValue($connection, $params);

		$this->container->get('doctrine')->resetEntityManager('customer');
	}
}