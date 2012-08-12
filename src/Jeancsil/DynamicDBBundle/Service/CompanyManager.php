<?php

namespace Jeancsil\DynamicDBBundle\Service;

use Jeancsil\DynamicDBBundle\Factory\CompanyFactory;
use Jeancsil\DynamicDBBundle\Repository\CompanyRepository;

class CompanyManager
{
	/**
	 * @var Jeancsil\DynamicDBBundle\Factory\CompanyFactory
	 */
	private $factory;

	/**
	 * @var Jeancsil\DynamicDBBundle\Repository\CompanyRepository
	 */
	private $repository;

	/**
	 * @param Jeancsil\DynamicDBBundle\Factory\CompanyFactory $factory
	 * @param Jeancsil\DynamicDBBundle\Repository\CompanyRepository $repository
	 */
	public function __construct(CompanyFactory $factory, CompanyRepository $repository)
	{
		$this->factory = $factory;
		$this->repository = $repository;
	}

	/**
	 * @param string $name
	 * @param string $domain
	 * @param string $dbName
	 * @param string $dbUser
	 * @param string $dbPass
	 * @return company
	 */
	public function create($name, $domain, $dbName, $dbUser, $dbPass)
	{
		$company = $this->factory->create($name, $domain, $dbName, $dbUser, $dbPass);
		$this->repository->append($company);

		return $company;
	}

	/**
	 * @return Jeancsil\DynamicDBBundle\Entity\Company[]
	 */
	public function getAllCompanies()
	{
		return $this->repository->findAll();
	}
}