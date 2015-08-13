<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="client")
 * @ORM\Entity()
 */
class Client extends BaseUser {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Property", mappedBy="client")
     */
    protected $porperty;

    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="user")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $university;

    /**
     * @var type integer
     * holds index of list of porperties that are shortlisted by user
     * @ORM\Column(name="shortlist", type="integer", nullable=true)
     */
    protected $nShortlist;

    /**
     * @Assert\Length(
     *                  min=3,
     *                  max=35,
     *                  minMessage= "min 3 characters limit",
     *                  maxMessage = "name Cannot contain more than 35 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Name can only contain letters")
     * @var type string
     * firstname of user
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    protected $tFirstName;

    /**
     * @Assert\Length(
     *                  min=3,
     *                  max=35,
     *                  minMessage= "min 3 characters limit",
     *                  maxMessage = "name Cannot contain more than 35 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Name can only contain letters")
     * @var type string
     * lastname of user
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    protected $tLastName;

    /**
     * @Assert\Length(
     *                  min=3,
     *                  max=15,
     *                  minMessage= "min 3 characters limit",
     *                  maxMessage = "phone number Cannot contain more than 15 characters"
     *               )
     * @var type string
     * optional phone number
     * @ORM\Column(name="phonenumber", type="string", length=255, nullable=true)
     */
    protected $tPhoneNumber;

    /**
     * @Assert\Length(
     *                  min=3,
     *                  max=15,
     *                  minMessage= "min 3 characters limit",
     *                  maxMessage = "phone number Cannot contain more than 15 characters"
     *               )
     * @var type string
     * optional landline number
     * @ORM\Column(name="landline", type="string", length=255, nullable=true)
     */
    protected $tLandline;

    /**
     * @Assert\Length(
     *                  min=3,
     *                  max=35,
     *                  minMessage= "title should be more descriptive",
     *                  maxMessage = "title Cannot contain more than 35 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Name can only contain letters")
     * @var type string
     * address title of user
     * @ORM\Column(name="addresstitle", type="string", length=255, nullable=true)
     */
    protected $tAddressTitle;

    /**
     * @Assert\Length(
     *                  min=3,
     *                  max=100,
     *                  minMessage= "Address should be more descriptive",
     *                  maxMessage = "address Cannot contain more than 100 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Name can only contain letters")
     * @var type string
     * address 
     * @ORM\Column(name="addressline1", type="string", length=255, nullable=true)
     */
    protected $tAddressLine1;

    /**
     * @Assert\Length(
     *                  min=3,
     *                  max=100,
     *                  minMessage= "Address should be more descriptive",
     *                  maxMessage = "address Cannot contain more than 100 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Name can only contain letters")
     * @var type string
     * address 
     * @ORM\Column(name="addressline2", type="string", length=255, nullable=true)
     */
    protected $tAddressLine2;

    /**
     * @Assert\Length(
     *                  min=3,
     *                  max=20,
     *                  minMessage= "needs a Min of 3 characters",
     *                  maxMessage = "ciy name Cannot contain more than 20 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Title can only contain letters")
     * @var type string
     * city of location
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    protected $tCity;

    /**
     * @Assert\Length(
     *                  min=3,
     *                  max=20,
     *                  minMessage= "needs a Min of 3 characters",
     *                  maxMessage = "province name Cannot contain more than 20 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Title can only contain letters")
     * @var type string
     * @ORM\Column(name="province", type="string", length=255, nullable=true)
     */
    protected $tProvince;

    /**
     * 
     * @var type string
     * @ORM\Column(name="zip", type="string", length=255, nullable=true)
     */
    protected $tZipCode;

    /**
     * @var type integer
     * @ORM\Column(name="country", type="integer", length=9, nullable=true)
     */
    protected $nCountry;

    /**
     * @var type date
     * user creation date and time
     * @ORM\Column(name="createdat", type="datetime", nullable=true)
     */
    protected $dCreatedAt;

    /**
     * @var type date
     * user details updated date and time
     * @ORM\Column(name="updatedat", type="datetime", nullable=true)
     */
    protected $dUpdatedAt;

    /**
     * @var type date
     * date of user account deletion
     * @ORM\Column(name="exitdate", type="datetime", nullable=true)
     */
    protected $dExitDate;

    public function __construct() {
        parent::__construct();
        $this->porperty = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Add porperty
     *
     * @param Property $porperty
     * @return User
     */
    public function addPorperty(Property $porperty) {
        $this->porperty[] = $porperty;

        return $this;
    }

    /**
     * Remove porperty
     *
     * @param Property $porperty
     */
    public function removePorperty(Property $porperty) {
        $this->porperty->removeElement($porperty);
    }

    /**
     * Get porperty
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPorperty() {
        return $this->porperty;
    }

    /**
     * Set university
     *
     * @param University $university
     * @return User
     */
    public function setUniversity(University $university = null) {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return University 
     */
    public function getUniversity() {
        return $this->university;
    }
    
    /**
     * Set nShortlist
     *
     * @param integer $nShortlist
     * @return User
     */
    public function setNShortlist($nShortlist)
    {
        $this->nShortlist = $nShortlist;

        return $this;
    }

    /**
     * Get nShortlist
     *
     * @return integer 
     */
    public function getNShortlist()
    {
        return $this->nShortlist;
    }
    
    /**
     * Set tFirstName
     *
     * @param string $tFirstName
     * @return User
     */
    public function setTFirstName($tFirstName) {
        $this->tFirstName = $tFirstName;

        return $this;
    }

    /**
     * Get tFirstName
     *
     * @return string 
     */
    public function getTFirstName() {
        return $this->tFirstName;
    }

    /**
     * Set tLastName
     *
     * @param string $tLastName
     * @return User
     */
    public function setTLastName($tLastName) {
        $this->tLastName = $tLastName;

        return $this;
    }

    /**
     * Get tLastName
     *
     * @return string 
     */
    public function getTLastName() {
        return $this->tLastName;
    }

    /**
     * Set tPhoneNumber
     *
     * @param string $tPhoneNumber
     * @return User
     */
    public function setTPhoneNumber($tPhoneNumber) {
        $this->tPhoneNumber = $tPhoneNumber;

        return $this;
    }

    /**
     * Get tPhoneNumber
     *
     * @return string 
     */
    public function getTPhoneNumber() {
        return $this->tPhoneNumber;
    }

    /**
     * Set tLandline
     *
     * @param string $tLandline
     * @return User
     */
    public function setTLandline($tLandline) {
        $this->tLandline = $tLandline;

        return $this;
    }

    /**
     * Get tLandline
     *
     * @return string 
     */
    public function getTLandline() {
        return $this->tLandline;
    }

    /**
     * Set tAddressTitle
     *
     * @param string $tAddressTitle
     * @return User
     */
    public function setTAddressTitle($tAddressTitle) {
        $this->tAddressTitle = $tAddressTitle;

        return $this;
    }

    /**
     * Get tAddressTitle
     *
     * @return string 
     */
    public function getTAddressTitle() {
        return $this->tAddressTitle;
    }

    /**
     * Set tAddressLine1
     *
     * @param string $tAddressLine1
     * @return User
     */
    public function setTAddressLine1($tAddressLine1) {
        $this->tAddressLine1 = $tAddressLine1;

        return $this;
    }

    /**
     * Get tAddressLine1
     *
     * @return string 
     */
    public function getTAddressLine1() {
        return $this->tAddressLine1;
    }

    /**
     * Set tAddressLine2
     *
     * @param string $tAddressLine2
     * @return User
     */
    public function setTAddressLine2($tAddressLine2) {
        $this->tAddressLine2 = $tAddressLine2;

        return $this;
    }

    /**
     * Get tAddressLine2
     *
     * @return string 
     */
    public function getTAddressLine2() {
        return $this->tAddressLine2;
    }

    /**
     * Set tCity
     *
     * @param string $tCity
     * @return User
     */
    public function setTCity($tCity) {
        $this->tCity = $tCity;

        return $this;
    }

    /**
     * Get tCity
     *
     * @return string 
     */
    public function getTCity() {
        return $this->tCity;
    }

    /**
     * Set tProvince
     *
     * @param string $tProvince
     * @return User
     */
    public function setTProvince($tProvince) {
        $this->tProvince = $tProvince;

        return $this;
    }

    /**
     * Get tProvince
     *
     * @return string 
     */
    public function getTProvince() {
        return $this->tProvince;
    }

    /**
     * Set tZipCode
     *
     * @param string $tZipCode
     * @return User
     */
    public function setTZipCode($tZipCode) {
        $this->tZipCode = $tZipCode;

        return $this;
    }

    /**
     * Get tZipCode
     *
     * @return string 
     */
    public function getTZipCode() {
        return $this->tZipCode;
    }

    /**
     * Set nCountry
     *
     * @param integer $nCountry
     * @return User
     */
    public function setNCountry($nCountry) {
        $this->nCountry = $nCountry;

        return $this;
    }

    /**
     * Get nCountry
     *
     * @return integer 
     */
    public function getNCountry() {
        return $this->nCountry;
    }

    /**
     * Set dCreatedAt
     *
     * @param \DateTime $dCreatedAt
     * @return User
     */
    public function setDCreatedAt($dCreatedAt) {
        $this->dCreatedAt = $dCreatedAt;

        return $this;
    }

    /**
     * Get dCreatedAt
     *
     * @return \DateTime 
     */
    public function getDCreatedAt() {
        return $this->dCreatedAt;
    }

    /**
     * Set dUpdatedAt
     *
     * @param \DateTime $dUpdatedAt
     * @return User
     */
    public function setDUpdatedAt($dUpdatedAt) {
        $this->dUpdatedAt = $dUpdatedAt;

        return $this;
    }

    /**
     * Get dUpdatedAt
     *
     * @return \DateTime 
     */
    public function getDUpdatedAt() {
        return $this->dUpdatedAt;
    }

    /**
     * Set dExitDate
     *
     * @param \DateTime $dExitDate
     * @return User
     */
    public function setDExitDate($dExitDate) {
        $this->dExitDate = $dExitDate;

        return $this;
    }

    /**
     * Get dExitDate
     *
     * @return \DateTime 
     */
    public function getDExitDate() {
        return $this->dExitDate;
    }

}
