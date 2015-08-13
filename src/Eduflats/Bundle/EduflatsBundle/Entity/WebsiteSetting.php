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
     * @ORM\Column(name="logo", type="string", length=255, nullable=false)
     */
    protected $tLogo;

    /**
     * @var string
     * Holds title of website
     * @ORM\Column(name="websitename", type="string", length=255, nullable=false)
     */
    protected $tWebsiteName;

    /**
     * @var string
     * holds tagline
     * @ORM\Column(name="tagline", type="string", length=255, nullable=false)
     */
    protected $tTagLine;

    /**
     * @var string
     * holds hex value or color name of website's background
     * @ORM\Column(name="backgroundcolor", type="string", length=255, nullable=false)
     */
    protected $tBackgroundColor;

    /**
     * @var string
     * holds hex value or color name of website's font
     * @ORM\Column(name="fontcolor", type="string", length=255, nullable=false)
     */
    protected $tFontColor;

     /**
     * @var \DateTime
     * lisitng configuration created on
     * @ORM\Column(name="createdat", type="datetime")
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
     * Set tBackgroundColor
     *
     * @param string $tBackgroundColor
     * @return WebsiteSettings
     */
    public function setTBackgroundColor($tBackgroundColor)
    {
        $this->tBackgroundColor = $tBackgroundColor;

        return $this;
    }

    /**
     * Get tBackgroundColor
     *
     * @return string 
     */
    public function getTBackgroundColor()
    {
        return $this->tBackgroundColor;
    }

    /**
     * Set tFontColor
     *
     * @param string $tFontColor
     * @return WebsiteSettings
     */
    public function setTFontColor($tFontColor)
    {
        $this->tFontColor = $tFontColor;

        return $this;
    }

    /**
     * Get tFontColor
     *
     * @return string 
     */
    public function getTFontColor()
    {
        return $this->tFontColor;
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
}
