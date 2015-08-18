<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="property_category")
 * @ORM\Entity
 */
class PropertyCategory {
    
    /**
     * @var type integer
     * 
     * @ORM\ID
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
  
    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="propertyCategory")
     */
    protected $university;
    
    /**
     * @ORM\ManyToOne(targetEntity="Property", inversedBy="propertyCategory")
     */
    protected $property;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="propertyCategory")
     */
    protected $category;
    
    /**
     * @ORM\OneToOne(targetEntity="Options", inversedBy="propertyCategory")
     */
    protected $options;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        
        return $this->id;
    }


    /**
     * Set university
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\University $university
     * @return PropertyCategory
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
     * Set property
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Property $property
     * @return PropertyCategory
     */
    public function setProperty(\Eduflats\Bundle\EduflatsBundle\Entity\Property $property = null)
    {
        $this->property = $property;

        return $this;
    }

    /**
     * Get property
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\Property 
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Set category
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Category $category
     * @return PropertyCategory
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
     * Set options
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Options $options
     * @return PropertyCategory
     */
    public function setOptions(\Eduflats\Bundle\EduflatsBundle\Entity\Options $options = null)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\Options 
     */
    public function getOptions()
    {
        return $this->options;
    }
    
}
