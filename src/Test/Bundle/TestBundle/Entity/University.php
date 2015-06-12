<?php

namespace Test\Bundle\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * University
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\Bundle\TestBundle\Entity\UniversityRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\OneToMany(targetEntity="Student", mappedBy="university")
     */
    private $student;
    
    /**
     * @ORM\OneToMany(targetEntity="PropertyProvider", mappedBy="propertyProvider")
     */
    private $propertyProvider;
    
    public function __construct() {
        $this->student = new ArrayCollection();
        $this->propertyProvider = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min=3,
     *                  max=35,
     *                  minMessage= "Name Field should contains at least 3 characters",
     *                  maxMessage = "Name Field Cannot contain more than 35 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="Name can only contain letters")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="subdomain", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min=3,
     *                  max=15,
     *                  minMessage= "Subdomains should contains at least 3 characters",
     *                  maxMessage = "Subdomains Cannot contain more than 15 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="subdomains can only contain letters")
     */
    private $subdomain;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;


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
     * Set id
     *
     * @param string $id
     * @return id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Set name
     *
     * @param string $name
     * @return University
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
     * Set subdomain
     *
     * @param string $subdomain
     * @return University
     */
    public function setSubdomain($subdomain)
    {
        $this->subdomain = $subdomain;

        return $this;
    }

    /**
     * Get subdomain
     *
     * @return string 
     */
    public function getSubdomain()
    {
        return $this->subdomain;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return University
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Add student
     *
     * @param \Test\Bundle\TestBundle\Entity\Student $student
     * @return University
     */
    public function addStudent(\Test\Bundle\TestBundle\Entity\Student $student)
    {
        $this->student[] = $student;

        return $this;
    }

    /**
     * Remove Student
     *
     * @param \Test\Bundle\TestBundle\Entity\Student $student
     */
    public function removeStudent(\Test\Bundle\TestBundle\Entity\Student $student)
    {
        $this->student->removeElement($student);
    }

    /**
     * Get student
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Add propertyProvider
     *
     * @param \Test\Bundle\TestBundle\Entity\PropertyProvider $propertyProvider
     * @return University
     */
    public function addPropertyProvider(\Test\Bundle\TestBundle\Entity\PropertyProvider $propertyProvider)
    {
        $this->propertyProvider[] = $propertyProvider;

        return $this;
    }

    /**
     * Remove propertyProvider
     *
     * @param \Test\Bundle\TestBundle\Entity\PropertyProvider $propertyProvider
     */
    public function removePropertyProvider(\Test\Bundle\TestBundle\Entity\PropertyProvider $propertyProvider)
    {
        $this->propertyProvider->removeElement($propertyProvider);
    }

    /**
     * Get propertyProvider
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPropertyProvider()
    {
        return $this->propertyProvider;
    }
}
