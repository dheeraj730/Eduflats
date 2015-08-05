<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campus
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Campus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="campus") 
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $university;

    /**
     * @ORM\ManyToMany(targetEntity="Property", mappedBy="campus")
     */
    protected $property;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $tName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ismain", type="boolean", nullable=false)
     */
    protected $isMain;

    /**
     * @var string
     *
     * @ORM\Column(name="campuscode", type="string", length=255, nullable=false)
     */
    protected $tCampusCode;

    /**
     * @var string
     *
     * @ORM\Column(name="addresstitle", type="string", length=255, nullable=false)
     */
    protected $tAddressTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="addressline1", type="string", length=255, nullable=false)
     */
    protected $tAddressLine1;

    /**
     * @var string
     *
     * @ORM\Column(name="addressline2", type="string", length=255, nullable=false)
     */
    protected $tAddressLine2;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    protected $tCity;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=false)
     */
    protected $tState;

    /**
     * @var integer
     *
     * @ORM\Column(name="country", type="integer", nullable=false)
     */
    protected $nCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=255, nullable=false)
     */
    protected $tZipcode;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", nullable=false)
     */
    protected $nLatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", nullable=false)
     */
    protected $nLongitude;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdat", type="datetime", nullable=false)
     */
    protected $dCreatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedat", type="datetime", nullable=false)
     */
    protected $dUpdatedAt;
    

    public function __construct() {
        $this->property = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set university
     *
     * @param University $university
     * @return Campus
     */
    public function setUniversity(University $university = null)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return University 
     */
    public function getUniversity()
    {
        return $this->university;
    }
    
    
    /**
     * Add property
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Property $property
     * @return Campus
     */
    public function addProperty(\Eduflats\Bundle\EduflatsBundle\Entity\Property $property)
    {
        $this->property[] = $property;

        return $this;
    }

    /**
     * Remove property
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Property $property
     */
    public function removeProperty(\Eduflats\Bundle\EduflatsBundle\Entity\Property $property)
    {
        $this->property->removeElement($property);
    }

    /**
     * Get property
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProperty()
    {
        return $this->property;
    }
    
    /**
     * Set tName
     *
     * @param string $tName
     * @return Campus
     */
    public function setTName($tName)
    {
        $this->tName = $tName;

        return $this;
    }

    /**
     * Get tName
     *
     * @return string 
     */
    public function getTName()
    {
        return $this->tName;
    }

    /**
     * Set isMain
     *
     * @param boolean $isMain
     * @return Campus
     */
    public function setIsMain($isMain)
    {
        $this->isMain = $isMain;

        return $this;
    }

    /**
     * Get isMain
     *
     * @return boolean 
     */
    public function getIsMain()
    {
        return $this->isMain;
    }

    /**
     * Set tCampusCode
     *
     * @param string $tCampusCode
     * @return Campus
     */
    public function setTCampusCode($tCampusCode)
    {
        $this->tCampusCode = $tCampusCode;

        return $this;
    }

    /**
     * Get tCampusCode
     *
     * @return string 
     */
    public function getTCampusCode()
    {
        return $this->tCampusCode;
    }

    /**
     * Set tAddressTitle
     *
     * @param string $tAddressTitle
     * @return Campus
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
     * @return Campus
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
     * @return Campus
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
     * @return Campus
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
     * Set tState
     *
     * @param string $tState
     * @return Campus
     */
    public function setTState($tState)
    {
        $this->tState = $tState;

        return $this;
    }

    /**
     * Get tState
     *
     * @return string 
     */
    public function getTState()
    {
        return $this->tState;
    }

    /**
     * Set nCountry
     *
     * @param integer $nCountry
     * @return Campus
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
     * Set tZipcode
     *
     * @param string $tZipcode
     * @return Campus
     */
    public function setTZipcode($tZipcode)
    {
        $this->tZipcode = $tZipcode;

        return $this;
    }

    /**
     * Get tZipcode
     *
     * @return string 
     */
    public function getTZipcode()
    {
        return $this->tZipcode;
    }

    /**
     * Set nLatitude
     *
     * @param float $nLatitude
     * @return Campus
     */
    public function setNLatitude($nLatitude)
    {
        $this->nLatitude = $nLatitude;

        return $this;
    }

    /**
     * Get nLatitude
     *
     * @return float 
     */
    public function getNLatitude()
    {
        return $this->nLatitude;
    }

    /**
     * Set nLongitude
     *
     * @param float $nLongitude
     * @return Campus
     */
    public function setNLongitude($nLongitude)
    {
        $this->nLongitude = $nLongitude;

        return $this;
    }

    /**
     * Get nLongitude
     *
     * @return float 
     */
    public function getNLongitude()
    {
        return $this->nLongitude;
    }

    /**
     * Set dCreatedAt
     *
     * @param \DateTime $dCreatedAt
     * @return Campus
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
     * @return Campus
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
}
