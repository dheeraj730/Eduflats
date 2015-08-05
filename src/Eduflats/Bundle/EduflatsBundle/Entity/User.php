<?php

namespace Eduflats\Bundle\EduflatsBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="eduflats_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var type string
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    protected $tFirstName;
    
    /**
     * @var type string
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    protected $tLastName;
    
    /**
     * @var type string
     * @ORM\Column(name="phonenumber", type="string", length=255, nullable=true)
     */
    protected $tPhoneNumber;
    
    /**
     * @var type string
     * @ORM\Column(name="landline", type="string", length=255, nullable=true)
     */
    protected $tLandline;
    
    /**
     * @var type string
     * @ORM\Column(name="addresstitle", type="string", length=255, nullable=false)
     */
    protected $tAddressTitle;
    
    /**
     * @var type string
     * @ORM\Column(name="addressline1", type="string", length=255, nullable=false)
     */
    protected $tAddressLine1;
    
    /**
     * @var type string
     * @ORM\Column(name="addressline2", type="string", length=255, nullable=false)
     */
    protected $tAddressLine2;
    
    /**
     * @var type string
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    protected $tCity;
    
    /**
     * @var type string
     * @ORM\Column(name="province", type="string", length=255, nullable=false)
     */
    protected $tProvince;
    
    /**
     * @var type string
     * @ORM\Column(name="zip", type="string", length=255, nullable=false)
     */
    protected $tZipCode;
    
    /**
     * @var type integer
     * @ORM\Column(name="country", type="integer", length=9, nullable=false)
     */
    protected $nCountry;
    
    /**
     * @var type date
     * @ORM\Column(name="createdat", type="datetime", nullable=false)
     */
    protected $dCreatedAt;
    
    /**
     * @var type date
     * @ORM\Column(name="updatedat", type="datetime", nullable=false)
     */
    protected $dUpdatedAt;
    
    /**
     * @var type date
     * @ORM\Column(name="exitdate", type="datetime", nullable=false)
     */
    protected $dExitDate;

    
    
    public function __construct() {
        parent::__construct();
    }

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
     * Set tFirstName
     *
     * @param string $tFirstName
     * @return User
     */
    public function setTFirstName($tFirstName)
    {
        $this->tFirstName = $tFirstName;

        return $this;
    }

    /**
     * Get tFirstName
     *
     * @return string 
     */
    public function getTFirstName()
    {
        return $this->tFirstName;
    }

    /**
     * Set tLastName
     *
     * @param string $tLastName
     * @return User
     */
    public function setTLastName($tLastName)
    {
        $this->tLastName = $tLastName;

        return $this;
    }

    /**
     * Get tLastName
     *
     * @return string 
     */
    public function getTLastName()
    {
        return $this->tLastName;
    }

    /**
     * Set tPhoneNumber
     *
     * @param string $tPhoneNumber
     * @return User
     */
    public function setTPhoneNumber($tPhoneNumber)
    {
        $this->tPhoneNumber = $tPhoneNumber;

        return $this;
    }

    /**
     * Get tPhoneNumber
     *
     * @return string 
     */
    public function getTPhoneNumber()
    {
        return $this->tPhoneNumber;
    }

    /**
     * Set tLandline
     *
     * @param string $tLandline
     * @return User
     */
    public function setTLandline($tLandline)
    {
        $this->tLandline = $tLandline;

        return $this;
    }

    /**
     * Get tLandline
     *
     * @return string 
     */
    public function getTLandline()
    {
        return $this->tLandline;
    }

    /**
     * Set tAddressTitle
     *
     * @param string $tAddressTitle
     * @return User
     */
    public function setTAddressTitle($tAddressTitle)
    {
        $this->tAddressTitle = $tAddressTitle;

        return $this;
    }

    /**
     * Get tAddressTitle
     *
     * @return string 
     */
    public function getTAddressTitle()
    {
        return $this->tAddressTitle;
    }

    /**
     * Set tAddressLine1
     *
     * @param string $tAddressLine1
     * @return User
     */
    public function setTAddressLine1($tAddressLine1)
    {
        $this->tAddressLine1 = $tAddressLine1;

        return $this;
    }

    /**
     * Get tAddressLine1
     *
     * @return string 
     */
    public function getTAddressLine1()
    {
        return $this->tAddressLine1;
    }

    /**
     * Set tAddressLine2
     *
     * @param string $tAddressLine2
     * @return User
     */
    public function setTAddressLine2($tAddressLine2)
    {
        $this->tAddressLine2 = $tAddressLine2;

        return $this;
    }

    /**
     * Get tAddressLine2
     *
     * @return string 
     */
    public function getTAddressLine2()
    {
        return $this->tAddressLine2;
    }

    /**
     * Set tCity
     *
     * @param string $tCity
     * @return User
     */
    public function setTCity($tCity)
    {
        $this->tCity = $tCity;

        return $this;
    }

    /**
     * Get tCity
     *
     * @return string 
     */
    public function getTCity()
    {
        return $this->tCity;
    }

    /**
     * Set tProvince
     *
     * @param string $tProvince
     * @return User
     */
    public function setTProvince($tProvince)
    {
        $this->tProvince = $tProvince;

        return $this;
    }

    /**
     * Get tProvince
     *
     * @return string 
     */
    public function getTProvince()
    {
        return $this->tProvince;
    }

    /**
     * Set tZipCode
     *
     * @param string $tZipCode
     * @return User
     */
    public function setTZipCode($tZipCode)
    {
        $this->tZipCode = $tZipCode;

        return $this;
    }

    /**
     * Get tZipCode
     *
     * @return string 
     */
    public function getTZipCode()
    {
        return $this->tZipCode;
    }

    /**
     * Set nCountry
     *
     * @param integer $nCountry
     * @return User
     */
    public function setNCountry($nCountry)
    {
        $this->nCountry = $nCountry;

        return $this;
    }

    /**
     * Get nCountry
     *
     * @return integer 
     */
    public function getNCountry()
    {
        return $this->nCountry;
    }

    /**
     * Set dCreatedAt
     *
     * @param \DateTime $dCreatedAt
     * @return User
     */
    public function setDCreatedAt($dCreatedAt)
    {
        $this->dCreatedAt = $dCreatedAt;

        return $this;
    }

    /**
     * Get dCreatedAt
     *
     * @return \DateTime 
     */
    public function getDCreatedAt()
    {
        return $this->dCreatedAt;
    }

    /**
     * Set dUpdatedAt
     *
     * @param \DateTime $dUpdatedAt
     * @return User
     */
    public function setDUpdatedAt($dUpdatedAt)
    {
        $this->dUpdatedAt = $dUpdatedAt;

        return $this;
    }

    /**
     * Get dUpdatedAt
     *
     * @return \DateTime 
     */
    public function getDUpdatedAt()
    {
        return $this->dUpdatedAt;
    }

    /**
     * Set dExitDate
     *
     * @param \DateTime $dExitDate
     * @return User
     */
    public function setDExitDate($dExitDate)
    {
        $this->dExitDate = $dExitDate;

        return $this;
    }

    /**
     * Get dExitDate
     *
     * @return \DateTime 
     */
    public function getDExitDate()
    {
        return $this->dExitDate;
    }
}
