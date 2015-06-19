<?php

namespace Test\Bundle\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="Test\Bundle\TestBundle\Entity\StudentRepository")
 */
class Student implements AdvancedUserInterface, \Serializable
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
     * @ORM\ManyToOne(targetEntity="University", inversedBy="student")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
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
     * @return User
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
     * @return User
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
    
    public function getSalt() {
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
    
    public function eraseCredentials() {
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

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Student
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
     * Set email
     *
     * @param string $email
     * @return Student
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

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->username,
            $this->email,
            $this->password
        ));
    }

    public function unserialize($serialized) {
        list(
            $this->id,
            $this->username,
            $this->email,
            $this->password
        ) = unserialize($serialized);
    }


    /**
     * Set university
     *
     * @param \Test\Bundle\TestBundle\Entity\University $university
     * @return Student
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
    

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return student
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Student
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set country
     *
     * @param integer $country
     * @return Student
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return integer 
     */
    public function getCountry()
    {
        return $this->country;
    }
}
