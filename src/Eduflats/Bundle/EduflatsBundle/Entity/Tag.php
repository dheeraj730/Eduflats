<?php

namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eduflats\Bundle\EduflatsBundle\Entity\TagRepository")
 */
class Tag
{
    public function __construct() {
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="tag")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    private $university;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

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
     * @return Tag
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
     * Set university
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\University $university
     * @return Tag
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
}