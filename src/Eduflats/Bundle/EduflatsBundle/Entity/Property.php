<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Property
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Property
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="property")
     * @ORM\JoinColumn(name="eduflats_user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="property")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $university;

    /**
     * @ORM\ManyToMany(targetEntity="Campus", inversedBy="property")
     * @ORM\JoinTable(name="campus_property")
     */
    protected $Campus;

    /**
     * @var type string
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    protected $tPropertyDescription;
    
    /**
     * @var type integer
     * @ORM\Column(name="propertytype", type="integer", nullable=false)
     */
    protected $nPropertyType;
    
    /**
     * hodlds index value of availability status
     * 
     * @var type integer
     * @ORM\Column(name="availabilitystatus", type="integer", nullable=false)
     */
    protected $nAvailabilityStatus;
    
    /**
     * @var type date
     * @ORM\Column(name="availablefrom", type="datetime", nullable=false)
     */
    protected $dAvailableFrom;
    
    /**
     * @var type integer
     * @ORM\Column(name="monthsofoccupancy", type="integer", nullable=false)
     */
    protected $nMonthsOfOccupancy;
    
    /**
     * @var type integer
     * @ORM\Column(name="bedroom", type="integer", nullable=false)
     */
    protected $nBedroom;
    
    /**
     * @var type integer
     * @ORM\Column(name="bathroom", type="integer", nullable=false)
     */
    protected $nBathroom;
    
    /**
     * @var type integer
     * @ORM\Column(name="totalfloors", type="integer", nullable=false)
     */
    protected $nTotalFloors;
    
    /**
     * @var type integer
     * @ORM\Column(name="floornumber", type="integer", nullable=false)
     */
    protected $nFloorNumber;
    
    /**
     * holds furnished status index from fixture
     *  
     * @var type integer
     * @ORM\Column(name="furnishedstatus", type="integer", nullable=false)
     */
    protected $nFurnishedStatus;
    
    /**
     * @var type integer
     * @ORM\Column(name="beds", type="integer", nullable=false)
     */
    protected $nBeds;
    
    /**
     * @var type integer
     * @ORM\Column(name="maximumoccupants", type="integer", nullable=false)
     */
    protected $nMaximumOccupants;
    
    /**
     * @var type integer
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    protected $nPrice;
    
    /**
     * @var type integer
     * @ORM\Column(name="maintainancecharge", type="integer", nullable=false)
     */
    protected $nMaintainanceCharge;
    
    /**
     * @var type boolean
     * @ORM\Column(name="borkerresponse", type="boolean", nullable=false)
     */
    protected $bBrokersResponse;

    /**
     * @var type integer
     * @ORM\Column(name="sqftcovered", type="integer", nullable=false)
     */
    protected $nSQFTcovered;

    /**
     * @var type integer
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    protected $nViews;
    
    /**
     * @var type integer
     * @ORM\Column(name="starrating", type="integer", nullable=false)
     */
    protected $nStarRating;
    
    /**
     * @var type integer
     * @ORM\Column(name="latitude", type="integer", nullable=false)
     */
    protected $nLatitude;
    
    /**
     * @var type integer
     * @ORM\Column(name="longitude", type="integer", nullable=false)
     */
    protected $nLongitude;
    
    /**
     * @var type boolean
     * @ORM\Column(name="displaycontactdetails", type="boolean", nullable=false)
     */
    protected $bDisplayContactDetails;
    
    /**
     * @var type string
     * @ORM\Column(name="addresstitle", type="string", length=255, nullable=false)
     */
    protected $tAddressTitle;
    
    /**
     * @var type string
     * @ORM\Column(name="addressline1", type="string", length=255, nullable=false)
     */
    protected $tAddressLine1;
    
    /**
     * @var type string
     * @ORM\Column(name="addressline2", type="string", length=255, nullable=false)
     */
    protected $tAddressLine2;
    
    
    /**
     * @var type string
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    protected $tCity;
    
     /**
     * @var type string
     * @ORM\Column(name="province", type="string", length=255, nullable=false)
     */
    protected $tProvince;
    
    /**
     * @var type string
     * @ORM\Column(name="zip", type="string", length=255, nullable=false)
     */
    protected $tZipCode;
    
    /**
     * @var type integer
     * @ORM\Column(name="country", type="integer", length=9, nullable=false)
     */
    protected $nCountry;
    
     /**
     * @var type boolean
     * @ORM\Column(name="isapprovednotrejected", type="boolean", nullable=false)
     */
    protected $isApprovedNotRejected;
    
     /**
     * @var type boolean
     * @ORM\Column(name="isactivenotexpired", type="boolean", nullable=false)
     */
    protected $isActiveNotExpired;
    
     /**
     * @var type string
     * @ORM\Column(name="nonapprovalreason", type="string", length=255, nullable=false)
     */
    protected $tNonApprovalReason;
    
     /**
     * @var type \Datetime
     * @ORM\Column(name="approvalrequestedon", type="datetime", nullable=false)
     */
    protected $dApprovalRequestedOn;
    
     /**
     * @var type \Datetime
     * @ORM\Column(name="approvedon", type="datetime", nullable=false)
     */
    protected $dApprovedOn;
    
     /**
     * @var type boolean
     * @ORM\Column(name="isblacklisted", type="boolean", nullable=false)
     */
    protected $isBlacklisted;
    
     /**
     * @var type \DateTime
     * @ORM\Column(name="closuredate", type="datetime", nullable=false)
     */
    protected $dClosureDate;
    
     /**
     * @var type \DateTime
     * @ORM\Column(name="createdat", type="datetime", nullable=false)
     */
    protected $dCreatedAt;
    
     /**
     * @var type \DateTime
     * @ORM\Column(name="updatedat", type="datetime", nullable=false)
     */
    protected $dUpdatedAt;

    public function __construct() {
        $this->Campus = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set user
     *
     * @param User $user
     * @return Property
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Add Campus
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus
     * @return Property
     */
    public function addCampus(\Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus)
    {
        $this->Campus[] = $campus;

        return $this;
    }

    /**
     * Remove Campus
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus
     */
    public function removeCampus(\Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus)
    {
        $this->Campus->removeElement($campus);
    }

    /**
     * Get Campus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCampus()
    {
        return $this->Campus;
    }
    
    /**
     * Set university
     *
     * @param University $university
     * @return Property
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
     * Set tPropertyDescription
     *
     * @param string $tPropertyDescription
     * @return Property
     */
    public function setTPropertyDescription($tPropertyDescription)
    {
        $this->tPropertyDescription = $tPropertyDescription;

        return $this;
    }

    /**
     * Get tPropertyDescription
     *
     * @return string 
     */
    public function getTPropertyDescription()
    {
        return $this->tPropertyDescription;
    }
    
     /**
     * Set nPropertyType
     *
     * @param integer $nPropertyType
     * @return Property
     */
    public function setNPropertyType($nPropertyType)
    {
        $this->nPropertyType = $nPropertyType;
        return $this;
    }

    /**
     * Get nPropertyType
     *
     * @return integer 
     */
    public function getNPropertyType()
    {
        return $this->nPropertyType;
    }
    
    /**
     * Set nAvailabilityStatus
     *
     * @param integer $nAvailabilityStatus
     * @return Property
     */
    public function setNAvailabilityStatus($nAvailabilityStatus)
    {
        $this->nAvailabilityStatus = $nAvailabilityStatus;

        return $this;
    }

    /**
     * Get nAvailabilityStatus
     *
     * @return integer 
     */
    public function getNAvailabilityStatus()
    {
        return $this->nAvailabilityStatus;
    }
    
    /**
     * Set dAvailableFrom
     *
     * @param \DateTime $dAvailableFrom
     * @return Property
     */
    public function setDAvailableFrom($dAvailableFrom)
    {
        $this->dAvailableFrom = $dAvailableFrom;

        return $this;
    }

    /**
     * Get dAvailableFrom
     *
     * @return \DateTime 
     */
    public function getDAvailableFrom()
    {
        return $this->dAvailableFrom;
    }

    /**
     * Set nMonthsOfOccupancy
     *
     * @param integer $nMonthsOfOccupancy
     * @return Property
     */
    public function setNMonthsOfOccupancy($nMonthsOfOccupancy)
    {
        $this->nMonthsOfOccupancy = $nMonthsOfOccupancy;

        return $this;
    }

    /**
     * Get nMonthsOfOccupancy
     *
     * @return integer 
     */
    public function getNMonthsOfOccupancy()
    {
        return $this->nMonthsOfOccupancy;
    }

    /**
     * Set nBedroom
     *
     * @param integer $nBedroom
     * @return Property
     */
    public function setNBedroom($nBedroom)
    {
        $this->nBedroom = $nBedroom;

        return $this;
    }

    /**
     * Get nBedroom
     *
     * @return integer 
     */
    public function getNBedroom()
    {
        return $this->nBedroom;
    }

    /**
     * Set nBathroom
     *
     * @param integer $nBathroom
     * @return Property
     */
    public function setNBathroom($nBathroom)
    {
        $this->nBathroom = $nBathroom;

        return $this;
    }

    /**
     * Get nBathroom
     *
     * @return integer 
     */
    public function getNBathroom()
    {
        return $this->nBathroom;
    }

    /**
     * Set nBeds
     *
     * @param integer $nBeds
     * @return Property
     */
    public function setNBeds($nBeds)
    {
        $this->nBeds = $nBeds;

        return $this;
    }

    /**
     * Get nBeds
     *
     * @return integer 
     */
    public function getNBeds()
    {
        return $this->nBeds;
    }

    /**
     * Set nMaximumOccupants
     *
     * @param integer $nMaximumOccupants
     * @return Property
     */
    public function setNMaximumOccupants($nMaximumOccupants)
    {
        $this->nMaximumOccupants = $nMaximumOccupants;

        return $this;
    }

    /**
     * Get nMaximumOccupants
     *
     * @return integer 
     */
    public function getNMaximumOccupants()
    {
        return $this->nMaximumOccupants;
    }

    /**
     * Set nRentalAmount
     *
     * @param integer $nRentalAmount
     * @return Property
     */
    public function setNRentalAmount($nRentalAmount)
    {
        $this->nRentalAmount = $nRentalAmount;

        return $this;
    }

    /**
     * Get nRentalAmount
     *
     * @return integer 
     */
    public function getNRentalAmount()
    {
        return $this->nRentalAmount;
    }

    /**
     * Set nViews
     *
     * @param integer $nViews
     * @return Property
     */
    public function setNViews($nViews)
    {
        $this->nViews = $nViews;

        return $this;
    }

    /**
     * Get nViews
     *
     * @return integer 
     */
    public function getNViews()
    {
        return $this->nViews;
    }

    /**
     * Set nLatitude
     *
     * @param integer $nLatitude
     * @return Property
     */
    public function setNLatitude($nLatitude)
    {
        $this->nLatitude = $nLatitude;

        return $this;
    }

    /**
     * Get nLatitude
     *
     * @return integer 
     */
    public function getNLatitude()
    {
        return $this->nLatitude;
    }

    /**
     * Set nLongitude
     *
     * @param integer $nLongitude
     * @return Property
     */
    public function setNLongitude($nLongitude)
    {
        $this->nLongitude = $nLongitude;

        return $this;
    }

    /**
     * Get nLongitude
     *
     * @return integer 
     */
    public function getNLongitude()
    {
        return $this->nLongitude;
    }

    /**
     * Set bDisplayContactDetails
     *
     * @param boolean $bDisplayContactDetails
     * @return Property
     */
    public function setBDisplayContactDetails($bDisplayContactDetails)
    {
        $this->bDisplayContactDetails = $bDisplayContactDetails;

        return $this;
    }

    /**
     * Get bDisplayContactDetails
     *
     * @return boolean 
     */
    public function getBDisplayContactDetails()
    {
        return $this->bDisplayContactDetails;
    }

    /**
     * Set tAddressTitle
     *
     * @param string $tAddressTitle
     * @return Property
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
     * @return Property
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
     * @return Property
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
     * @return Property
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
     * @return Property
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
     * Set tZipCode
     *
     * @param string $tZipCode
     * @return Property
     */
    public function setTZipCode($tZipCode)
    {
        $this->tZipCode = $tZipCode;

        return $this;
    }

    /**
     * Get tZipCode
     *
     * @return string 
     */
    public function getTZipCode()
    {
        return $this->tZipCode;
    }

    /**
     * Set nCountry
     *
     * @param integer $nCountry
     * @return Property
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
     * Set nTotalFloors
     *
     * @param integer $nTotalFloors
     * @return Property
     */
    public function setNTotalFloors($nTotalFloors)
    {
        $this->nTotalFloors = $nTotalFloors;

        return $this;
    }

    /**
     * Get nTotalFloors
     *
     * @return integer 
     */
    public function getNTotalFloors()
    {
        return $this->nTotalFloors;
    }

    /**
     * Set nFloorNumber
     *
     * @param integer $nFloorNumber
     * @return Property
     */
    public function setNFloorNumber($nFloorNumber)
    {
        $this->nFloorNumber = $nFloorNumber;

        return $this;
    }

    /**
     * Get nFloorNumber
     *
     * @return integer 
     */
    public function getNFloorNumber()
    {
        return $this->nFloorNumber;
    }

    /**
     * Set nFurnishedStatus
     *
     * @param integer $nFurnishedStatus
     * @return Property
     */
    public function setNFurnishedStatus($nFurnishedStatus)
    {
        $this->nFurnishedStatus = $nFurnishedStatus;

        return $this;
    }

    /**
     * Get nFurnishedStatus
     *
     * @return integer 
     */
    public function getNFurnishedStatus()
    {
        return $this->nFurnishedStatus;
    }

    /**
     * Set nPrice
     *
     * @param integer $nPrice
     * @return Property
     */
    public function setNPrice($nPrice)
    {
        $this->nPrice = $nPrice;

        return $this;
    }

    /**
     * Get nPrice
     *
     * @return integer 
     */
    public function getNPrice()
    {
        return $this->nPrice;
    }

    /**
     * Set nMaintainanceCharge
     *
     * @param integer $nMaintainanceCharge
     * @return Property
     */
    public function setNMaintainanceCharge($nMaintainanceCharge)
    {
        $this->nMaintainanceCharge = $nMaintainanceCharge;

        return $this;
    }

    /**
     * Get nMaintainanceCharge
     *
     * @return integer 
     */
    public function getNMaintainanceCharge()
    {
        return $this->nMaintainanceCharge;
    }

    /**
     * Set bBrokersResponse
     *
     * @param boolean $bBrokersResponse
     * @return Property
     */
    public function setBBrokersResponse($bBrokersResponse)
    {
        $this->bBrokersResponse = $bBrokersResponse;

        return $this;
    }

    /**
     * Get bBrokersResponse
     *
     * @return boolean 
     */
    public function getBBrokersResponse()
    {
        return $this->bBrokersResponse;
    }

    /**
     * Set nSQFTcovered
     *
     * @param integer $nSQFTcovered
     * @return Property
     */
    public function setNSQFTcovered($nSQFTcovered)
    {
        $this->nSQFTcovered = $nSQFTcovered;

        return $this;
    }

    /**
     * Get nSQFTcovered
     *
     * @return integer 
     */
    public function getNSQFTcovered()
    {
        return $this->nSQFTcovered;
    }

    /**
     * Set nStarRating
     *
     * @param integer $nStarRating
     * @return Property
     */
    public function setNStarRating($nStarRating)
    {
        $this->nStarRating = $nStarRating;

        return $this;
    }

    /**
     * Get nStarRating
     *
     * @return integer 
     */
    public function getNStarRating()
    {
        return $this->nStarRating;
    }

    /**
     * Set isApprovedNotRejected
     *
     * @param boolean $isApprovedNotRejected
     * @return Property
     */
    public function setIsApprovedNotRejected($isApprovedNotRejected)
    {
        $this->isApprovedNotRejected = $isApprovedNotRejected;

        return $this;
    }

    /**
     * Get isApprovedNotRejected
     *
     * @return boolean 
     */
    public function getIsApprovedNotRejected()
    {
        return $this->isApprovedNotRejected;
    }

    /**
     * Set isActiveNotExpired
     *
     * @param boolean $isActiveNotExpired
     * @return Property
     */
    public function setIsActiveNotExpired($isActiveNotExpired)
    {
        $this->isActiveNotExpired = $isActiveNotExpired;

        return $this;
    }

    /**
     * Get isActiveNotExpired
     *
     * @return boolean 
     */
    public function getIsActiveNotExpired()
    {
        return $this->isActiveNotExpired;
    }
    /**
     * Set tNonApprovalReason
     *
     * @param string $tNonApprovalReason
     * @return Property
     */
    public function setTNonApprovalReason($tNonApprovalReason)
    {
        $this->tNonApprovalReason = $tNonApprovalReason;

        return $this;
    }

    /**
     * Get tNonApprovalReason
     *
     * @return string 
     */
    public function getTNonApprovalReason()
    {
        return $this->tNonApprovalReason;
    }

    /**
     * Set dApprovalRequestedOn
     *
     * @param \DateTime $dApprovalRequestedOn
     * @return Property
     */
    public function setDApprovalRequestedOn($dApprovalRequestedOn)
    {
        $this->dApprovalRequestedOn = $dApprovalRequestedOn;

        return $this;
    }

    /**
     * Get dApprovalRequestedOn
     *
     * @return \DateTime 
     */
    public function getDApprovalRequestedOn()
    {
        return $this->dApprovalRequestedOn;
    }

    /**
     * Set dApprovedOn
     *
     * @param \DateTime $dApprovedOn
     * @return Property
     */
    public function setDApprovedOn($dApprovedOn)
    {
        $this->dApprovedOn = $dApprovedOn;

        return $this;
    }

    /**
     * Get dApprovedOn
     *
     * @return \DateTime 
     */
    public function getDApprovedOn()
    {
        return $this->dApprovedOn;
    }

    /**
     * Set isBlacklisted
     *
     * @param boolean $isBlacklisted
     * @return Property
     */
    public function setIsBlacklisted($isBlacklisted)
    {
        $this->isBlacklisted = $isBlacklisted;

        return $this;
    }

    /**
     * Get isBlacklisted
     *
     * @return boolean 
     */
    public function getIsBlacklisted()
    {
        return $this->isBlacklisted;
    }

    /**
     * Set dClosureDate
     *
     * @param \DateTime $dClosureDate
     * @return Property
     */
    public function setDClosureDate($dClosureDate)
    {
        $this->dClosureDate = $dClosureDate;

        return $this;
    }

    /**
     * Get dClosureDate
     *
     * @return \DateTime 
     */
    public function getDClosureDate()
    {
        return $this->dClosureDate;
    }

    /**
     * Set dCreatedAt
     *
     * @param \DateTime $dCreatedAt
     * @return Property
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
     * @return Property
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
