<?php

namespace Jeancsil\DynamicDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jeancsil\DynamicDBBundle\Entity\Company
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Jeancsil\DynamicDBBundle\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string $domain
     *
     * @ORM\Column(name="domain", type="string", length=255)
     */
    private $domain;

    /**
     * @var string $dbname
     *
     * @ORM\Column(name="dbname", type="string", length=100)
     */
    private $dbname;

    /**
     * @var string $dbuser
     *
     * @ORM\Column(name="dbuser", type="string", length=100)
     */
    private $dbuser;

    /**
     * @var string $dbpass
     *
     * @ORM\Column(name="dbpass", type="string", length=100)
     */
    private $dbpass;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set domain
     *
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * Get domain
     *
     * @return string 
     */
    public function getDomain()
    {
        return $this->domain;
    }

	/**
	 * @return the $dbname
	 */
	public function getDbname() {
		return $this->dbname;
	}

	/**
	 * @param string $dbname
	 */
	public function setDbname($dbname) {
		$this->dbname = $dbname;
	}

	/**
	 * @return the $dbuser
	 */
	public function getDbuser() {
		return $this->dbuser;
	}

	/**
	 * @param string $dbuser
	 */
	public function setDbuser($dbuser) {
		$this->dbuser = $dbuser;
	}

	/**
	 * @return the $dbpass
	 */
	public function getDbpass() {
		return $this->dbpass;
	}

	/**
	 * @param string $dbpass
	 */
	public function setDbpass($dbpass) {
		$this->dbpass = $dbpass;
	}

}