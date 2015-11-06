<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Options
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity("value")
 */
class Options
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
     * @ORM\OneToMany(targetEntity="PropertyCategory", mappedBy="options")
     */
    protected $propertyCategory;
    
    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="options")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $university;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="options")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;
  
    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, unique=true, nullable=true)
     */
    protected $value;


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
     * Set value
     *
     * @param string $value
     * @return Options
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set category
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Category $category
     * @return Options
     */
    public function setCategory(\Eduflats\Bundle\EduflatsBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set property_category
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Property_category $propertyCategory
     * @return Options
     */
    public function setPropertyCategory( $propertyCategory = null)
    {
        $this->property_category = $propertyCategory;

        return $this;
    }

    /**
     * Get property_category
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\Property_category 
     */
    public function getPropertyCategory()
    {
        return $this->property_category;
    }

    /**
     * Set university
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\University $university
     * @return Options
     */
    public function setUniversity(\Eduflats\Bundle\EduflatsBundle\Entity\University $university = null)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\University 
     */
    public function getUniversity()
    {
        return $this->university;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->propertyCategory = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add propertyCategory
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory $propertyCategory
     * @return Options
     */
    public function addPropertyCategory(\Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory $propertyCategory)
    {
        $this->propertyCategory[] = $propertyCategory;

        return $this;
    }

    /**
     * Remove propertyCategory
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory $propertyCategory
     */
    public function removePropertyCategory(\Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory $propertyCategory)
    {
        $this->propertyCategory->removeElement($propertyCategory);
    }
}
