<?php

namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Client
 *
 * @ORM\Table(name="client") 
 * @UniqueEntity(fields="email",message ="client.email.not_unique")
 * @ORM\Entity(repositoryClass="Eduflats\Bundle\EduflatsBundle\Entity\ClientRepository")
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
     * @ORM\ManyToOne(targetEntity="University", inversedBy="client")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id" )
     */
    protected $university;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(
     *                 min = 3,
     *                 max = 15,
     *                 minMessage = "User Name field must contain atleast 3 characters",
     *                 maxMessage = "User Name field cannot contain more than 15 characters"
     *              )
     * @Assert\Type(type="alnum", message="User Name can contain only alphabets and numbers")
     */
    protected $username;

    /**
     * @Assert\NotBlank( message = "client.password.not_blank")
     * @Assert\Length(min=4,minMessage="client.password.min_length")
     */
    protected $plainPassword;

    /**
     * @var string
     * 
     * @Assert\NotBlank()
     * @Assert\Email
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *                  min=3,
     *                  max=15,
     *                  minMessage= "First Name Field should contains at least 3 characters",
     *                  maxMessage = "First Name Field Cannot contain more than 15 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="First name can only contain letters")
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *                  min = 3,
     *                  max = 15,
     *                  minMessage = "Last Name field must contain atleast 3 characters",
     *                  maxMessage = "Last Name Field Cannot contain more than 15 characters"
     *              )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false, message = "Last Name field can only contain letters")
     */
    protected $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="organization", type="string", length=255, nullable=true)
     * @Assert\Length(
     *                  min = 0,
     *                  max = 255,
     *                  maxMessage = "Organization name can be maximum 255 characters"
     *              )
     */
    protected $organization;
    
    /**
     * @var date
     * 
     * @ORM\Column(name="joiningdate", type="date", nullable=true)
     * @Assert\Date()
     */
    protected $joiningdate;

    /**
     * @var date
     * 
     * @ORM\Column(name="exitdate", type="date", nullable=true)
     * @Assert\Date()
     */
    protected $exitdate;

    /**
     * @var text
     * 
     * @ORM\Column(name="mobile", type="string", length=18, nullable=true)
     *  
     */
    protected $mobile;

    /**
     * @var text
     * 
     * @ORM\Column(name="landline", type="string", length=18, nullable=true)
     *  
     */
    protected $landline;

    /**
     * @ORM\Column(type="string", name="addressname", length=100,nullable=true)
     * @Assert\NotBlank(message="field.not_blank")
     * @Assert\Length(max=60,maxMessage="client.addressname.max_length")
     */
    protected $addressname;

    /**
     * @ORM\Column(type="string", name="addressline1", length=250,nullable=true)
     * @Assert\NotBlank(message="field.not_blank")
     * @Assert\Length(max=240,maxMessage="client.addressline.max_length")
     */
    protected $addressline1;

    /**
     * @ORM\Column(type="string", name="addressline2", length=250,nullable=true)
     * @Assert\Length(max=240,maxMessage="client.addressline.max_length")
     * 
     */
    protected $addressline2;

    /**
     * @ORM\Column(type="string", name="addresscity", length=100,nullable=true)
     * @Assert\NotBlank(message="field.not_blank")
     * @Assert\Length(max=100,maxMessage="client.addresscity.max_length")
     */
    protected $addresscity;

    /**
     * @ORM\Column(type="string", name="addressprovince", length=80,nullable=true)
     * @Assert\Length(max=78,maxMessage="client.addressprovince.max_length")
     */
    protected $addressprovince;

    /**
     * @ORM\Column(type="string", name="addresszipcode", length=20,nullable=true)
     * @Assert\NotBlank(message="field.not_blank")
     * @Assert\Length(max=20,maxMessage="client.addresszip.max_length")
     */
    protected $addresszipcode;

    /**
     * @ORM\Column(type="integer", name="addresscountry" , length=9, nullable=true)
     * @Assert\NotBlank(message="field.not_blank")
     */
    protected $addresscountry;

    /**
     * @ORM\Column(type="datetime", name="createdon",nullable=true)
     */
    protected $createdon;

    /**
     * @ORM\Column(type="datetime", name="modifiedon",nullable=true)
     */
    protected $modifiedon;

    /**
     * Constructor method
     */
    public function __construct() {
        parent::__construct();
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
     * Set universtity
     *
     * @param string $university
     * @return Client
     */
    public function setUniversity(\Eduflats\Bundle\EduflatsBundle\Entity\University $university) {
        $this->university = $university;

        return $this;
    }

    /**
     * Get universtity
     *
     * @return string 
     */
    public function getUniversity() {
        return $this->university;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Client
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Client
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Client
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Client
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Client
     */
    public function setEnabled($enabled) {
        $this->enabled = $enabled;

        return $this;
    }

    public function getOrganization() {
        return $this->organization;
    }

    public function setOrganization($organization) {
        $this->organization = $organization;
    }

    public function getNotify() {
        return $this->notify;
    }

    public function getDisplaycontact() {
        return $this->displaycontact;
    }

    public function getJoiningdate() {
        return $this->joiningdate;
    }

    public function getExitdate() {
        return $this->exitdate;
    }

    public function getMobile() {
        return $this->mobile;
    }

    public function getLandline() {
        return $this->landline;
    }

    public function getAddressname() {
        return $this->addressname;
    }

    public function getAddressline1() {
        return $this->addressline1;
    }

    public function getAddressline2() {
        return $this->addressline2;
    }

    public function getAddresscity() {
        return $this->addresscity;
    }

    public function getAddressprovince() {
        return $this->addressprovince;
    }

    public function getAddresszipcode() {
        return $this->addresszipcode;
    }

    public function getAddresscountry() {
        return $this->addresscountry;
    }

    public function setNotify($notify) {
        $this->notify = $notify;
    }

    public function setDisplaycontact($displaycontact) {
        $this->displaycontact = $displaycontact;
    }

    public function setJoiningdate(date $joiningdate) {
        $this->joiningdate = $joiningdate;
    }

    public function setExitdate(date $exitdate) {
        $this->exitdate = $exitdate;
    }

    public function setMobile(text $mobile) {
        $this->mobile = $mobile;
    }

    public function setLandline(text $landline) {
        $this->landline = $landline;
    }

    public function setAddressname($addressname) {
        $this->addressname = $addressname;
    }

    public function setAddressline1($addressline1) {
        $this->addressline1 = $addressline1;
    }

    public function setAddressline2($addressline2) {
        $this->addressline2 = $addressline2;
    }

    public function setAddresscity($addresscity) {
        $this->addresscity = $addresscity;
    }

    public function setAddressprovince($addressprovince) {
        $this->addressprovince = $addressprovince;
    }

    public function setAddresszipcode($addresszipcode) {
        $this->addresszipcode = $addresszipcode;
    }

    public function setAddresscountry($addresscountry) {
        $this->addresscountry = $addresscountry;
    }

    public function getPlainPassword() {
        return $this->plainPassword;
    }

    public function getCreatedon() {
        return $this->createdon;
    }

    public function getModifiedon() {
        return $this->modifiedon;
    }

    public function setPlainPassword($plainPassword) {
        $this->plainPassword = $plainPassword;
    }

    public function setCreatedon($createdon) {
        $this->createdon = $createdon;
    }

    public function setModifiedon($modifiedon) {
        $this->modifiedon = $modifiedon;
    }

}
