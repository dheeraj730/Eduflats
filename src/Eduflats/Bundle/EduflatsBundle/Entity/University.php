<?php

namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * University
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eduflats\Bundle\EduflatsBundle\Entity\UniversityRepository")
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
     * @ORM\OneToMany(targetEntity="Client", mappedBy="university")
     */
    private $client;
    
    /**
     * @ORM\OneToMany(targetEntity="Campus", mappedBy="university")
     */
    private $campus;
    
    /**
     * @ORM\OneToMany(targetEntity="Property", mappedBy="university")
     */
    private $property;
    
    /**
     * @ORM\OneToMany(targetEntity="Badge", mappedBy="university")
     */
    private $badge;
    
    /**
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="university")
     */
    private $tag;
    
    public function __construct() {
        $this->client = new ArrayCollection();
        $this->campus = new ArrayCollection();
        $this->property = new ArrayCollection();
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
     * Add campus
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus
     * @return University
     */
    public function addCampus(\Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus)
    {
        $this->campus[] = $campus;

        return $this;
    }

    /**
     * Remove campus
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus
     */
    public function removeCampus(\Eduflats\Bundle\EduflatsBundle\Entity\Campus $campus)
    {
        $this->campus->removeElement($campus);
    }

    /**
     * Get campus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * Add property
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Property $property
     * @return University
     */
    public function addProperty(\Eduflats\Bundle\EduflatsBundle\Entity\Property $property)
    {
        $this->property[] = $property;

        return $this;
    }

    /**
     * Remove property
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Property $property
     */
    public function removeProperty(\Eduflats\Bundle\EduflatsBundle\Entity\Property $property)
    {
        $this->property->removeElement($property);
    }

    /**
     * Get property
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Add badge
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Badge $badge
     * @return University
     */
    public function addBadge(\Eduflats\Bundle\EduflatsBundle\Entity\Badge $badge)
    {
        $this->badge[] = $badge;

        return $this;
    }

    /**
     * Remove badge
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Badge $badge
     */
    public function removeBadge(\Eduflats\Bundle\EduflatsBundle\Entity\Badge $badge)
    {
        $this->badge->removeElement($badge);
    }

    /**
     * Get badge
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * Add tag
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Tag $tag
     * @return University
     */
    public function addTag(\Eduflats\Bundle\EduflatsBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Tag $tag
     */
    public function removeTag(\Eduflats\Bundle\EduflatsBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add client
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Client $client
     * @return University
     */
    public function addClient(\Eduflats\Bundle\EduflatsBundle\Entity\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \Eduflats\Bundle\EduflatsBundle\Entity\Client $client
     */
    public function removeClient(\Eduflats\Bundle\EduflatsBundle\Entity\Client $client)
    {
        $this->client->removeElement($client);
    }

    /**
     * Get client
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClient()
    {
        return $this->client;
    }
}
