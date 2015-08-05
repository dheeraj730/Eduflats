<?php

namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * University
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class University
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
     * @ORM\OneToMany(targetEntity="Campus", mappedBy="university")
     */
    protected $campus;
    
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="university")
     */
    protected $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Property", mappedBy="university")
     */
    protected $property;
    
    /**
     * @ORM\OneToOne(targetEntity="ListingConfiguration", mappedBy="university")
     */
    protected $listingConfiguration;
    
    /**
     * @ORM\OneToOne(targetEntity="WebsiteSettings", mappedBy="university")
     */
    protected $websiteSettings;

    /**
     * @var string
     *
     * @ORM\Column(name="universityname", type="string", length=255, nullable=false)
     */
    protected $tUniversityName;

    /**
     * @var string
     *
     * @ORM\Column(name="subdomainname", type="string", length=255, nullable=false)
     */
    protected $tSubdomainName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="validity", type="datetime", nullable=false)
     */
    protected $dValidity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="blacklisted", type="boolean", nullable=false)
     */
    protected $bBlacklisted;

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

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    protected $bEnabled;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->campus = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add campus
     *
     * @param Campus $campus
     * @return University
     */
    public function addCampus(Campus $campus)
    {
        $this->campus[] = $campus;

        return $this;
    }

    /**
     * Remove campus
     *
     * @param Campus $campus
     */
    public function removeCampus(Campus $campus)
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
     * Add user
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\User $user
     * @return University
     */
    public function addUser(\Eduflats\Bundle\EduflatsBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\User $user
     */
    public function removeUser(\Eduflats\Bundle\EduflatsBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set tUniversityName
     *
     * @param string $tUniversityName
     * @return University
     */
    public function setTUniversityName($tUniversityName)
    {
        $this->tUniversityName = $tUniversityName;

        return $this;
    }

    /**
     * Get tUniversityName
     *
     * @return string 
     */
    public function getTUniversityName()
    {
        return $this->tUniversityName;
    }

    /**
     * Set tSubdomainName
     *
     * @param string $tSubdomainName
     * @return University
     */
    public function setTSubdomainName($tSubdomainName)
    {
        $this->tSubdomainName = $tSubdomainName;

        return $this;
    }

    /**
     * Get tSubdomainName
     *
     * @return string 
     */
    public function getTSubdomainName()
    {
        return $this->tSubdomainName;
    }

    /**
     * Set dValidity
     *
     * @param \DateTime $dValidity
     * @return University
     */
    public function setDValidity($dValidity)
    {
        $this->dValidity = $dValidity;

        return $this;
    }

    /**
     * Get dValidity
     *
     * @return \DateTime 
     */
    public function getDValidity()
    {
        return $this->dValidity;
    }

    /**
     * Set bBlacklisted
     *
     * @param boolean $bBlacklisted
     * @return University
     */
    public function setBBlacklisted($bBlacklisted)
    {
        $this->bBlacklisted = $bBlacklisted;

        return $this;
    }

    /**
     * Get bBlacklisted
     *
     * @return boolean 
     */
    public function getBBlacklisted()
    {
        return $this->bBlacklisted;
    }

    /**
     * Set dCreatedAt
     *
     * @param \DateTime $dCreatedAt
     * @return University
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
     * @return University
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
     * Set bEnabled
     *
     * @param boolean $bEnabled
     * @return University
     */
    public function setBEnabled($bEnabled)
    {
        $this->bEnabled = $bEnabled;

        return $this;
    }

    /**
     * Get bEnabled
     *
     * @return boolean 
     */
    public function getBEnabled()
    {
        return $this->bEnabled;
    }


    /**
     * Add property
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Property $property
     * @return University
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
     * Set websiteSettings
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\WebsiteSettings $websiteSettings
     * @return University
     */
    public function setWebsiteSettings(\Eduflats\Bundle\EduflatsBundle\Entity\WebsiteSettings $websiteSettings = null)
    {
        $this->websiteSettings = $websiteSettings;

        return $this;
    }

    /**
     * Get websiteSettings
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\WebsiteSettings 
     */
    public function getWebsiteSettings()
    {
        return $this->websiteSettings;
    }

    /**
     * Set listingConfiguration
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\ListingConfiguration $listingConfiguration
     * @return University
     */
    public function setListingConfiguration(\Eduflats\Bundle\EduflatsBundle\Entity\ListingConfiguration $listingConfiguration = null)
    {
        $this->listingConfiguration = $listingConfiguration;

        return $this;
    }

    /**
     * Get listingConfiguration
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\ListingConfiguration 
     */
    public function getListingConfiguration()
    {
        return $this->listingConfiguration;
    }
}