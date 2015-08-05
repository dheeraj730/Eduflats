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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
}
