<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListingsConfiguration
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ListingSetting
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
     * @ORM\OneToOne(targetEntity="University", inversedBy="listingSetting")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $university;

    /**
     * @var integer
     * represents number of days to show the listing (created date untill number of days)
     * @ORM\Column(name="advertiseperiod", type="integer")
     */
    private $nAdvertisePeriod;

    /**
     * @var boolean
     * shows/hides all badges of a property
     * @ORM\Column(name="enablebadges", type="boolean")
     */
    private $bEnableBadges;

    /**
     * @var boolean
     * shows/hides all badges of a property
     * @ORM\Column(name="$photorequired", type="boolean")
     */
    private $bPhotoRequired;

    /**
     * @var boolean
     * shows/hides star ratings of a property
     * @ORM\Column(name="enablestarratings", type="boolean")
     */
    private $bEnableStarRatings;

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
     * Set university
     *
     * @param University $university
     * @return ListingsConfiguration
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
     * Set nAdvertisePeriod
     *
     * @param integer $nAdvertisePeriod
     * @return ListingsConfiguration
     */
    public function setNAdvertisePeriod($nAdvertisePeriod)
    {
        $this->nAdvertisePeriod = $nAdvertisePeriod;

        return $this;
    }

    /**
     * Get nAdvertisePeriod
     *
     * @return integer 
     */
    public function getNAdvertisePeriod()
    {
        return $this->nAdvertisePeriod;
    }

    /**
     * Set bEnableBadges
     *
     * @param boolean $bEnableBadges
     * @return ListingsConfiguration
     */
    public function setBEnableBadges($bEnableBadges)
    {
        $this->bEnableBadges = $bEnableBadges;

        return $this;
    }

    /**
     * Get bEnableBadges
     *
     * @return boolean 
     */
    public function getBEnableBadges()
    {
        return $this->bEnableBadges;
    }

    /**
     * Set bEnableStarRatings
     *
     * @param boolean $bEnableStarRatings
     * @return ListingsConfiguration
     */
    public function setBEnableStarRatings($bEnableStarRatings)
    {
        $this->bEnableStarRatings = $bEnableStarRatings;

        return $this;
    }

    /**
     * Get bEnableStarRatings
     *
     * @return boolean 
     */
    public function getBEnableStarRatings()
    {
        return $this->bEnableStarRatings;
    }

    /**
     * Set dCreatedAt
     *
     * @param \DateTime $dCreatedAt
     * @return ListingsConfiguration
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
     * @return ListingsConfiguration
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
     * Set bPhotoRequired
     *
     * @param boolean $bPhotoRequired
     * @return ListingSetting
     */
    public function setBPhotoRequired($bPhotoRequired)
    {
        $this->bPhotoRequired = $bPhotoRequired;

        return $this;
    }

    /**
     * Get bPhotoRequired
     *
     * @return boolean 
     */
    public function getBPhotoRequired()
    {
        return $this->bPhotoRequired;
    }
}
