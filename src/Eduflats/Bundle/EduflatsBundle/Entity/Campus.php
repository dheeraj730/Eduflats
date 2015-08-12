<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min=3,
     *                  max=35,
     *                  minMessage= "Name Field should contains at least 3 characters",
     *                  maxMessage = "Name Field Cannot contain more than 35 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Name can only contain letters")
     * @var string
     * campus name
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $tName;

    /**
     * @var boolean
     * indicates if campus is main
     * @ORM\Column(name="ismain", type="boolean", nullable=false)
     */
    protected $isMain;

    /**
     * @var string
     * holds campus code for university
     * @ORM\Column(name="campuscode", type="string", length=255, nullable=false)
     */
    protected $tCampusCode;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min=5,
     *                  max=35,
     *                  minMessage= "Title should contains at least 5 characters",
     *                  maxMessage = "Title Cannot contain more than 35 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Title can only contain letters")
     * @var string
     * campus address title
     * @ORM\Column(name="addresstitle", type="string", length=255, nullable=false)
     */
    protected $tAddressTitle;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min=5,
     *                  max=100,
     *                  minMessage= "address should contains at least 5 characters",
     *                  maxMessage = "address Cannot contain more than 100 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="address can only contain letters")
     * @var string
     * campus address
     * @ORM\Column(name="addressline1", type="string", length=255, nullable=false)
     */
    protected $tAddressLine1;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min=5,
     *                  max=100,
     *                  minMessage= "address should contains at least 5 characters",
     *                  maxMessage = "address Cannot contain more than 100 characters"
     *               )
     * @var string
     * campus address
     * @ORM\Column(name="addressline2", type="string", length=255, nullable=true)
     */
    protected $tAddressLine2;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min=3,
     *                  max=20,
     *                  minMessage= "needs a Min of 3 characters",
     *                  maxMessage = "ciy name Cannot contain more than 20 characters"
     *               )
     * @var string
     * city
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    protected $tCity;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min=3,
     *                  max=20,
     *                  minMessage= "needs a Min of 3 characters",
     *                  maxMessage = "province name Cannot contain more than 20 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Title can only contain letters")
     * @var string
     * 
     * @ORM\Column(name="province", type="string", length=255, nullable=false)
     */
    protected $tProvince;

    /**
     * @var integer
     *
     * @ORM\Column(name="country", type="integer", nullable=true)
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
     * @ORM\Column(name="latitude", type="float", nullable=true)
     */
    protected $nLatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", nullable=true)
     */
    protected $nLongitude;

    /**
     * @var \DateTime
     * campus details created on
     * @ORM\Column(name="createdat", type="datetime", nullable=false)
     */
    protected $dCreatedAt;

    /**
     * @var \DateTime
     * campus updated on
     * @ORM\Column(name="updatedat", type="datetime", nullable=true)
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
     * Set tProvince
     *
     * @param string $tProvince
     * @return Campus
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
