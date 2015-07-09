<?php

namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Property
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eduflats\Bundle\EduflatsBundle\Entity\PropertyRepository")
 */
class Property
{
    public function __construct() {
        $this->campus = new ArrayCollection();
        $this->tag = new ArrayCollection();
    }
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *                 min = 3,
     *                 max = 150,
     *                 minMessage = "Title Must Be more descriptive",  
     *                 maxMessage = "150 Charactes Limit exceed"     
     *              )
     */
    private $title;
    
    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="property")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    private $university;

    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    private $tag;
    
    /**
     * @ORM\Column(name="badges", type="array")
     */
    private $badges;
    
    /**
     * @ORM\ManyToMany(targetEntity="Campus")
     */
    private $campus;
    
    /**
     * @var string
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *                 min = 10,
     *                 max = 80,
     *                 minMessage = "Address must be more specific",
     *                 maxMessage = "80 characters limit exceeded"
     *              )
     */
    private $address;

    /**
     * @var integer
     * @ORM\Column(name="postalcode", type="integer")
     * @Assert\NotBlank()
     * @Assert\Length(
     *                 min = 3,
     *                 minMessage = "Postal code must contain atleast 3 digits"
     *              )
     */
    private $postalcode;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="propertytype", type="integer")
     */
    private $propertytype;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="rent", type="integer")
     */
    private $rent;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="leaseperiod", type="integer")
     */
    private $leaseperiod;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="utilities", type="integer")
     */
    private $utilities;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="bedrooms", type="integer")
     */
    private $bedrooms;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="bathrooms", type="integer")
     */
    private $bathrooms;

    /**
     * @var string
     * @ORM\Column(name="additionaldetails", type="string", length=255)
     * @Assert\Length(
     *                 min = 10,
     *                 max = 200,
     *                 minMessage = "Details must be more specific",
     *                 maxMessage = "200 characters limit exceeded"
     *              )
     */
    private $additionaldetails;


    /**
     * Get id
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Property
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postalcode
     *
     * @param string $postalcode
     * @return Property
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode
     *
     * @return string 
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set propertytype
     *
     * @param integer $propertytype
     * @return Property
     */
    public function setPropertytype($propertytype)
    {
        $this->propertytype = $propertytype;

        return $this;
    }

    /**
     * Get propertytype
     *
     * @return integer 
     */
    public function getPropertytype()
    {
        return $this->propertytype;
    }

    /**
     * Set rent
     *
     * @param string $rent
     * @return Property
     */
    public function setRent($rent)
    {
        $this->rent = $rent;

        return $this;
    }

    /**
     * Get rent
     *
     * @return string 
     */
    public function getRent()
    {
        return $this->rent;
    }

    /**
     * Set leaseperiod
     *
     * @param integer $leaseperiod
     * @return Property
     */
    public function setLeaseperiod($leaseperiod)
    {
        $this->leaseperiod = $leaseperiod;

        return $this;
    }

    /**
     * Get leaseperiod
     *
     * @return integer 
     */
    public function getLeaseperiod()
    {
        return $this->leaseperiod;
    }

    /**
     * Set utilities
     *
     * @param integer $utilities
     * @return Property
     */
    public function setUtilities($utilities)
    {
        $this->utilities = $utilities;

        return $this;
    }

    /**
     * Get utilities
     *
     * @return integer 
     */
    public function getUtilities()
    {
        return $this->utilities;
    }

    /**
     * Set bedrooms
     *
     * @param integer $bedrooms
     * @return Property
     */
    public function setBedrooms($bedrooms)
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    /**
     * Get bedrooms
     *
     * @return integer 
     */
    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    /**
     * Set bathrooms
     *
     * @param integer $bathrooms
     * @return Property
     */
    public function setBathrooms($bathrooms)
    {
        $this->bathrooms = $bathrooms;

        return $this;
    }

    /**
     * Get bathrooms
     *
     * @return integer 
     */
    public function getBathrooms()
    {
        return $this->bathrooms;
    }

    /**
     * Set additionaldetails
     *
     * @param string $additionaldetails
     * @return Property
     */
    public function setAdditionaldetails($additionaldetails)
    {
        $this->additionaldetails = $additionaldetails;

        return $this;
    }

    /**
     * Get additionaldetails
     *
     * @return string 
     */
    public function getAdditionaldetails()
    {
        return $this->additionaldetails;
    }

    /**
     * Set university
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Univerisity $university
     * @return Property
     */
    public function setUniversity(\Eduflats\Bundle\EduflatsBundle\Entity\University $university = null)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\Univerisity 
     */
    public function getUniversity()
    {
        return $this->university;
    }

    /**
     * Add campus
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus
     * @return Property
     */
    public function addCampus(\Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus)
    {
        $this->campus[] = $campus;

        return $this;
    }

    /**
     * Remove campus
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus
     */
    public function removeCampus(\Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus)
    {
        $this->campus->removeElement($campus);
    }

    /**
     * Get campus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * Add tag
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Tag $tag
     * @return Property
     */
    public function addTag(\Eduflats\Bundle\EduflatsBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Tag $tag
     */
    public function removeTag(\Eduflats\Bundle\EduflatsBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set badges
     *
     * @param array $badges
     * @return Property
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
        return $this;
    }

    /**
     * Get badges
     *
     * @return array 
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Property
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}
