<?php

namespace Jeancsil\DynamicDBBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Jeancsil\DynamicDBBundle\Entity\Company;

class CompanyRepository extends EntityRepository
{
	/**
	 * @param Jeancsil\DynamicDBBundle\Entity\Company $company
	 */
	public function append(Company $company)
	{
		$this->getEntityManager()->persist($company);
		$this->getEntityManager()->flush();
	}

	/**
	 * @param Jeancsil\DynamicDBBundle\Entity\Company $company
	 */
	public function update(Company $company)
	{
		$this->append($company);
	}
}