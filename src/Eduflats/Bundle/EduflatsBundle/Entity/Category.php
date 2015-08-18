<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Category
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
     * @ORM\OneToMany(targetEntity="PropertyCategory", mappedBy="category")
     */
    protected $propertyCategory;

    /**
     * @ORM\OneToMany(targetEntity="Options", mappedBy="category")
     */
    protected $options;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="required", type="boolean")
     */
    protected $required;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isMultiple", type="boolean")
     */
    protected $isMultiple;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="isText", type="boolean")
     */
    protected $isText;

    public function __construct() {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set required
     *
     * @param boolean $required
     * @return Category
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return boolean 
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set isMultiple
     *
     * @param boolean $isMultiple
     * @return Category
     */
    public function setIsMultiple($isMultiple)
    {
        $this->isMultiple = $isMultiple;

        return $this;
    }

    /**
     * Get isMultiple
     *
     * @return boolean 
     */
    public function getIsMultiple()
    {
        return $this->isMultiple;
    }

    /**
     * Set isText
     *
     * @param boolean $isText
     * @return Category
     */
    public function setIsText($isText)
    {
        $this->isText = $isText;

        return $this;
    }

    /**
     * Get isText
     *
     * @return boolean 
     */
    public function getIsText()
    {
        return $this->isText;
    }

    
    /**
     * Add options
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Options $options
     * @return Category
     */
    public function addOption(\Eduflats\Bundle\EduflatsBundle\Entity\Options $options)
    {
        $this->options[] = $options;

        return $this;
    }

    /**
     * Remove options
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Options $options
     */
    public function removeOption(\Eduflats\Bundle\EduflatsBundle\Entity\Options $options)
    {
        $this->options->removeElement($options);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOptions()
    {
        return $this->options;
    }


    /**
     * Set propertyCategory
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory $propertyCategory
     * @return Category
     */
    public function setPropertyCategory(\Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory $propertyCategory = null)
    {
        $this->propertyCategory = $propertyCategory;

        return $this;
    }

    /**
     * Get propertyCategory
     *
     * @return \Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory 
     */
    public function getPropertyCategory()
    {
        return $this->propertyCategory;
    }

    /**
     * Add propertyCategory
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\PropertyCategory $propertyCategory
     * @return Category
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
