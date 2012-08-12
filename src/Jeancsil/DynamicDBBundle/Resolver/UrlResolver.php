<?php

namespace Jeancsil\DynamicDBBundle\Resolver;

use Jeancsil\DynamicDBBundle\Service\CompanyManager;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UrlResolver
{
	private $companyManager;

	public function __construct(CompanyManager $companyManager)
	{
		$this->companyManager = $companyManager;
	}

	/**
	 * Transforms a URL in a client using a database table.
	 * 
	 * @param string $domain
	 * @throws AccessDeniedHttpException
	 * @return Jeancsil\DynamicDBBundle\Entity\Company
	 * @todo Use cache to store the companies information.
	 */
	public function resolve($domain)
	{
		$companies = $this->companyManager->getAllCompanies();

		$cleanDomain = preg_replace('/(^www\.)/', '', $domain);

		foreach ($companies as $company){
			if($cleanDomain == preg_replace('/(^www\.)/', '', $company->getDomain())){
				return $company;
			}
		}

		throw new AccessDeniedHttpException('Can\'t access the system using this url.');
	}
}