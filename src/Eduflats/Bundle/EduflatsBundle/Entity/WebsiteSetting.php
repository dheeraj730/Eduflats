<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteSettings
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class WebsiteSetting
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
     * @ORM\OneToOne(targetEntity="University", inversedBy="websiteSetting")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $university;
    
    /**
     * @var string
     * Holds url of logo
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    protected $tLogo;

    /**
     * @var string
     * Holds title of website
     * @ORM\Column(name="websitename", type="string", length=255, nullable=true)
     */
    protected $tWebsiteName;

    /**
     * @var string
     * holds tagline
     * @ORM\Column(name="tagline", type="string", length=255, nullable=true)
     */
    protected $tTagLine;

    /**
     * @var string
     * holds full name of Institution name
     * @ORM\Column(name="institutionname", type="string", length=255, nullable=true)
     */
    protected $tInstitutionName;
    
    /**
     * @var string
     * holds contact email address
     * @ORM\Column(name="emailtrackingaddress", type="string", length=255, nullable=true)
     */
    protected $tEmailTrackingAddress;
    
    /**
     * @var string
     * holds the reply to email for university
     * @ORM\Column(name="emailreplyto", type="string", length=255, nullable=true)
     */
    protected $tEmailReplyTo;
    
    /**
     * holds the country name for university
     * @ORM\Column(name="country", type="integer", nullable=true)
     * @var integer
     */
    protected $nCountry;
    
    /**
     * enable https secured connection
     * @ORM\Column(name="https", type="boolean", nullable=true)
     * @var boolean
     */
    protected $bHTTPS;
    
    /**
     * enable google analytics
     * @ORM\Column(name="googleanalytics", type="boolean", nullable=true)
     * @var boolean
     */
    protected $bGoogleAnalytics;
    
    /**
     * enable webmaster tools
     * @ORM\Column(name="webmastertools", type="boolean", nullable=true)
     * @var boolean
     */
    protected $bWebmasterTools;
    
    /**
     * enable website Language
     * @ORM\Column(name="websitelanguage", type="integer", nullable=true)
     * @var integer
     */
    protected $nWebsiteLanugage;
    
    
    /**
     * enable mail chimp
     * @ORM\Column(name="mailchimp", type="boolean", nullable=true)
     * @var boolean
     */
    protected $bMailchimp;
    
    /**
     * enable mail chimp
     * @ORM\Column(name="mailchimpapikey", type="boolean", nullable=true)
     * @var boolean
     */
    protected $bMailchimpApiKey;
    
    /**
     * @ORM\OneToOne(targetEntity="HexValue", mappedBy="websiteSetting")
     */
    protected $hexValue;
    
    /**
     * @ORM\OneToOne(targetEntity="TimeZone", mappedBy="websiteSetting")
     */
    protected $timeZone;

    /**
     * @var \DateTime
     * lisitng configuration created on
     * @ORM\Column(name="createdat", type="datetime", nullable=true)
     */
    private $dCreatedAt;

    /**
     * @var \DateTime
     * lisitng configuration updated on
     * @ORM\Column(name="updatedat", type="datetime", nullable=true)
     */
    private $dUpdatedAt;

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
     * Set tLogo
     *
     * @param string $tLogo
     * @return WebsiteSettings
     */
    public function setTLogo($tLogo)
    {
        $this->tLogo = $tLogo;

        return $this;
    }

    /**
     * Get tLogo
     *
     * @return string 
     */
    public function getTLogo()
    {
        return $this->tLogo;
    }

    /**
     * Set tWebsiteName
     *
     * @param string $tWebsiteName
     * @return WebsiteSettings
     */
    public function setTWebsiteName($tWebsiteName)
    {
        $this->tWebsiteName = $tWebsiteName;

        return $this;
    }

    /**
     * Get tWebsiteName
     *
     * @return string 
     */
    public function getTWebsiteName()
    {
        return $this->tWebsiteName;
    }

    /**
     * Set tTagLine
     *
     * @param string $tTagLine
     * @return WebsiteSettings
     */
    public function setTTagLine($tTagLine)
    {
        $this->tTagLine = $tTagLine;

        return $this;
    }

    /**
     * Get tTagLine
     *
     * @return string 
     */
    public function getTTagLine()
    {
        return $this->tTagLine;
    }

    /**
     * Set university
     *
     * @param University $university
     * @return WebsiteSettings
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
     * Set dCreatedAt
     *
     * @param \DateTime $dCreatedAt
     * @return WebsiteSettings
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
     * @return WebsiteSettings
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
     * Set tInstitutionName
     *
     * @param string $tInstitutionName
     * @return WebsiteSetting
     */
    public function setTInstitutionName($tInstitutionName)
    {
        $this->tInstitutionName = $tInstitutionName;

        return $this;
    }

    /**
     * Get tInstitutionName
     *
     * @return string 
     */
    public function getTInstitutionName()
    {
        return $this->tInstitutionName;
    }

    /**
     * Set tEmailTrackingAddress
     *
     * @param string $tEmailTrackingAddress
     * @return WebsiteSetting
     */
    public function setTEmailTrackingAddress($tEmailTrackingAddress)
    {
        $this->tEmailTrackingAddress = $tEmailTrackingAddress;

        return $this;
    }

    /**
     * Get tEmailTrackingAddress
     *
     * @return string 
     */
    public function getTEmailTrackingAddress()
    {
        return $this->tEmailTrackingAddress;
    }

    /**
     * Set tEmailReplyTo
     *
     * @param string $tEmailReplyTo
     * @return WebsiteSetting
     */
    public function setTEmailReplyTo($tEmailReplyTo)
    {
        $this->tEmailReplyTo = $tEmailReplyTo;

        return $this;
    }

    /**
     * Get tEmailReplyTo
     *
     * @return string 
     */
    public function getTEmailReplyTo()
    {
        return $this->tEmailReplyTo;
    }

    /**
     * Set nCountry
     *
     * @param integer $nCountry
     * @return WebsiteSetting
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
     * Set bHTTPS
     *
     * @param boolean $bHTTPS
     * @return WebsiteSetting
     */
    public function setBHTTPS($bHTTPS)
    {
        $this->bHTTPS = $bHTTPS;

        return $this;
    }

    /**
     * Get bHTTPS
     *
     * @return boolean 
     */
    public function getBHTTPS()
    {
        return $this->bHTTPS;
    }

    /**
     * Set bGoogleAnalytics
     *
     * @param boolean $bGoogleAnalytics
     * @return WebsiteSetting
     */
    public function setBGoogleAnalytics($bGoogleAnalytics)
    {
        $this->bGoogleAnalytics = $bGoogleAnalytics;

        return $this;
    }

    /**
     * Get bGoogleAnalytics
     *
     * @return boolean 
     */
    public function getBGoogleAnalytics()
    {
        return $this->bGoogleAnalytics;
    }

    /**
     * Set bWebmasterTools
     *
     * @param boolean $bWebmasterTools
     * @return WebsiteSetting
     */
    public function setBWebmasterTools($bWebmasterTools)
    {
        $this->bWebmasterTools = $bWebmasterTools;

        return $this;
    }

    /**
     * Get bWebmasterTools
     *
     * @return boolean 
     */
    public function getBWebmasterTools()
    {
        return $this->bWebmasterTools;
    }

    /**
     * Set nWebsiteLanugage
     *
     * @param integer $nWebsiteLanugage
     * @return WebsiteSetting
     */
    public function setNWebsiteLanugage($nWebsiteLanugage)
    {
        $this->nWebsiteLanugage = $nWebsiteLanugage;

        return $this;
    }

    /**
     * Get nWebsiteLanugage
     *
     * @return integer 
     */
    public function getNWebsiteLanugage()
    {
        return $this->nWebsiteLanugage;
    }

    /**
     * Set bMailchimp
     *
     * @param boolean $bMailchimp
     * @return WebsiteSetting
     */
    public function setBMailchimp($bMailchimp)
    {
        $this->bMailchimp = $bMailchimp;

        return $this;
    }

    /**
     * Get bMailchimp
     *
     * @return boolean 
     */
    public function getBMailchimp()
    {
        return $this->bMailchimp;
    }

    /**
     * Set bMailchimpApiKey
     *
     * @param boolean $bMailchimpApiKey
     * @return WebsiteSetting
     */
    public function setBMailchimpApiKey($bMailchimpApiKey)
    {
        $this->bMailchimpApiKey = $bMailchimpApiKey;

        return $this;
    }

    /**
     * Get bMailchimpApiKey
     *
     * @return boolean 
     */
    public function getBMailchimpApiKey()
    {
        return $this->bMailchimpApiKey;
    }

    /**
     * Set hexValue
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\HexValue $hexValue
     * @return WebsiteSetting
     */
    public function setHexValue(\Eduflats\Bundle\EduflatsBundle\Entity\HexValue $hexValue = null)
    {
        $this->hexValue = $hexValue;

        return $this;
    }

    /**
     * Get hexValue
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\HexValue 
     */
    public function getHexValue()
    {
        return $this->hexValue;
    }

    /**
     * Set timeZone
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\TimeZone $timeZone
     * @return WebsiteSetting
     */
    public function setTimeZone(\Eduflats\Bundle\EduflatsBundle\Entity\TimeZone $timeZone = null)
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * Get timeZone
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\TimeZone 
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }
}
