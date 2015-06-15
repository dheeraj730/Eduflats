<?php

namespace Test\Bundle\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rental
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\Bundle\TestBundle\Entity\RentalRepository")
 */
class Rental
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
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="postalCode", type="string", length=255)
     */
    private $postalCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="propertyType", type="integer")
     */
    private $propertyType;

    /**
     * @var string
     *
     * @ORM\Column(name="rent", type="string", length=255)
     */
    private $rent;

    /**
     * @var integer
     *
     * @ORM\Column(name="leasePeriod", type="integer")
     */
    private $leasePeriod;

    /**
     * @var integer
     *
     * @ORM\Column(name="bedrooms", type="integer")
     */
    private $bedrooms;

    /**
     * @var integer
     *
     * @ORM\Column(name="bathrooms", type="integer")
     */
    private $bathrooms;

    /**
     * @var string
     *
     * @ORM\Column(name="additionalDetails", type="string", length=255)
     */
    private $additionalDetails;


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
     * Set address
     *
     * @param string $address
     * @return Rental
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
     * Set postalCode
     *
     * @param string $postalCode
     * @return Rental
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set propertyType
     *
     * @param integer $propertyType
     * @return Rental
     */
    public function setPropertyType($propertyType)
    {
        $this->propertyType = $propertyType;

        return $this;
    }

    /**
     * Get propertyType
     *
     * @return integer 
     */
    public function getPropertyType()
    {
        return $this->propertyType;
    }

    /**
     * Set rent
     *
     * @param string $rent
     * @return Rental
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
     * Set leasePeriod
     *
     * @param integer $leasePeriod
     * @return Rental
     */
    public function setLeasePeriod($leasePeriod)
    {
        $this->leasePeriod = $leasePeriod;

        return $this;
    }

    /**
     * Get leasePeriod
     *
     * @return integer 
     */
    public function getLeasePeriod()
    {
        return $this->leasePeriod;
    }

    /**
     * Set bedrooms
     *
     * @param integer $bedrooms
     * @return Rental
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
     * @return Rental
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
     * Set additionalDetails
     *
     * @param string $additionalDetails
     * @return Rental
     */
    public function setAdditionalDetails($additionalDetails)
    {
        $this->additionalDetails = $additionalDetails;

        return $this;
    }

    /**
     * Get additionalDetails
     *
     * @return string 
     */
    public function getAdditionalDetails()
    {
        return $this->additionalDetails;
    }
}
