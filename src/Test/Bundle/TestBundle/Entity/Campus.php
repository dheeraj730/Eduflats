<?php

namespace Test\Bundle\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Campus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\Bundle\TestBundle\Entity\CampusRepository")
 */
class Campus
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
     * @ORM\ManyToOne(targetEntity="University", inversedBy="campus")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    private $university;

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
     * @ORM\Column(name="address", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *                 min = 10,
     *                 max = 80,
     *                 minMessage = "Address must be more specific",
     *                 maxMessage = "80 characters limit exceeded"
     *              )
     */
    private $address;


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
     * @return Campus
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
     * Set address
     *
     * @param string $address
     * @return Campus
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
     * Set university
     *
     * @param \Test\Bundle\TestBundle\Entity\University $university
     * @return Campus
     */
    public function setUniversity(\Test\Bundle\TestBundle\Entity\University $university = null)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return \Test\Bundle\TestBundle\Entity\University 
     */
    public function getUniversity()
    {
        return $this->university;
    }

}
