<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-08-05 09:11:21.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entity\PropertyType
 *
 * @ORM\Entity(repositoryClass="PropertyTypeRepository")
 * @ORM\Table(name="propertyType", indexes={@ORM\Index(name="fk_propertyType_university1_idx", columns={"university_id"})})
 */
class PropertyType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $nPropertyType;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $university_id;

    /**
     * @ORM\OneToMany(targetEntity="PropertyHasPropertyType", mappedBy="propertyType")
     * @ORM\JoinColumn(name="id", referencedColumnName="propertyTypeId")
     */
    protected $propertyHasPropertyTypes;

    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="propertyTypes")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $university;

    public function __construct()
    {
        $this->propertyHasPropertyTypes = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\PropertyType
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of nPropertyType.
     *
     * @param integer $nPropertyType
     * @return \Entity\PropertyType
     */
    public function setNPropertyType($nPropertyType)
    {
        $this->nPropertyType = $nPropertyType;

        return $this;
    }

    /**
     * Get the value of nPropertyType.
     *
     * @return integer
     */
    public function getNPropertyType()
    {
        return $this->nPropertyType;
    }

    /**
     * Set the value of university_id.
     *
     * @param integer $university_id
     * @return \Entity\PropertyType
     */
    public function setUniversityId($university_id)
    {
        $this->university_id = $university_id;

        return $this;
    }

    /**
     * Get the value of university_id.
     *
     * @return integer
     */
    public function getUniversityId()
    {
        return $this->university_id;
    }

    /**
     * Add PropertyHasPropertyType entity to collection (one to many).
     *
     * @param \Entity\PropertyHasPropertyType $propertyHasPropertyType
     * @return \Entity\PropertyType
     */
    public function addPropertyHasPropertyType(PropertyHasPropertyType $propertyHasPropertyType)
    {
        $this->propertyHasPropertyTypes[] = $propertyHasPropertyType;

        return $this;
    }

    /**
     * Remove PropertyHasPropertyType entity from collection (one to many).
     *
     * @param \Entity\PropertyHasPropertyType $propertyHasPropertyType
     * @return \Entity\PropertyType
     */
    public function removePropertyHasPropertyType(PropertyHasPropertyType $propertyHasPropertyType)
    {
        $this->propertyHasPropertyTypes->removeElement($propertyHasPropertyType);

        return $this;
    }

    /**
     * Get PropertyHasPropertyType entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPropertyHasPropertyTypes()
    {
        return $this->propertyHasPropertyTypes;
    }

    /**
     * Set University entity (many to one).
     *
     * @param \Entity\University $university
     * @return \Entity\PropertyType
     */
    public function setUniversity(University $university = null)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get University entity (many to one).
     *
     * @return \Entity\University
     */
    public function getUniversity()
    {
        return $this->university;
    }

    public function __sleep()
    {
        return array('id', 'nPropertyType', 'university_id');
    }
}
