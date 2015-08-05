<?php

namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteSettings
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class WebsiteSettings
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
     * @ORM\OneToOne(targetEntity="University", inversedBy="websiteSettings")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $university;
    
    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    protected $tLogo;

    /**
     * @var string
     *
     * @ORM\Column(name="websitename", type="string", length=255)
     */
    protected $tWebsiteName;

    /**
     * @var string
     *
     * @ORM\Column(name="tagline", type="string", length=255)
     */
    protected $tTagLine;

    /**
     * @var string
     *
     * @ORM\Column(name="backgroundcolor", type="string", length=255)
     */
    protected $tBackgroundColor;

    /**
     * @var string
     *
     * @ORM\Column(name="fontcolor", type="string", length=255)
     */
    protected $tFontColor;


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
}
