<?php

namespace Test\Bundle\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
/**
 * PropertyProvider
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\Bundle\TestBundle\Entity\PropertyProviderRepository")
 */
class PropertyProvider implements AdvancedUserInterface, \Serializable
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
     * @ORM\ManyToOne(targetEntity="University", inversedBy="propertyProvider")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id" )
     */
    private $university;
    
    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles;

    /**
     * @var string
     * @ORM\Column(name="username", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(
     *                 min = 3,
     *                 max = 15,
     *                 minMessage = "User Name field must contain atleast 3 characters",
     *                 maxMessage = "User Name field cannot contain more than 15 characters"
     *              )
     * @Assert\Type(type="alnum", message="User Name can contain only alphabets and numbers")
     */
    protected $username;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *                 min = 3,
     *                 minMessage = "Password must contain atleast 3 characters"
     *              )
     */
    protected $password;
    
    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Email
     */
    //@Assert\Regex(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/)
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min=3,
     *                  max=15,
     *                  minMessage= "First Name Field should contains at least 3 characters",
     *                  maxMessage = "First Name Field Cannot contain more than 15 characters"
     *               )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false , message="First name can only contain letters")
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *                  min = 3,
     *                  max = 15,
     *                  minMessage = "Last Name field must contain atleast 3 characters",
     *                  maxMessage = "Last Name Field Cannot contain more than 15 characters"
     *              )
     * @Assert\Regex(pattern="/[^a-z\s-]/i", match=false, message = "Last Name field can only contain letters")
     */
    private $lastname;

    /**
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled = true;

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
     * Set username
     *
     * @param string $username
     * @return PropertyProvider
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return PropertyProvider
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return PropertyProvider
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return PropertyProvider
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return PropertyProvider
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    public function eraseCredentials() {
        return;
    }

    public function setRoles(array $roles) {
        $this->roles = $roles;
        return $this;
    }
    
    public function getRoles() {
        $roles = $this->roles;
        $roles[] = 'ROLE_GUEST';
        return array_unique($roles);
    }

    public function getSalt() {
        return;
    }

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return $this->enabled;
    }

    public function serialize() {
        return serialize(array(
            $this->id
        ));
    }

    public function unserialize($serialized) {
        list(
            $this->id
        ) = unserialize($serialized);
    }


    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return PropertyProvider
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
     * Set university
     *
     * @param \Test\Bundle\TestBundle\Entity\University $university
     * @return PropertyProvider
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
