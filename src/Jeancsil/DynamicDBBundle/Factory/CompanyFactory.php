<?php

namespace Jeancsil\DynamicDBBundle\Factory;

use Jeancsil\DynamicDBBundle\Entity\Company;

class CompanyFactory
{
	public function create($name, $domain, $dbName, $dbUser, $dbPass)
	{
		$company = new Company();
		$company->setName($name);
		$company->setDomain($domain);
		$company->setDbname($dbName);
		$company->setDbuser($dbUser);
		$company->setDbpass($dbPass);

		return $company;
	}
}