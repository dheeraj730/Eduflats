<?php

namespace Test\Bundle\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
/**
 * Admin
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Test\Bundle\TestBundle\Entity\AdminRepository")
 */
class Admin implements AdvancedUserInterface, \Serializable
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
     * @ORM\ManyToOne(targetEntity="University", inversedBy="admin")
     * @ORM\JoinColumn(name="University_id", referencedColumnName="id")
     */
    private $university;

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
    private $username;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Length(
     *                 min = 3,
     *                 minMessage = "Password must contain atleast 3 characters"
     *              )
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Email
     */
    //@Assert\Regex(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/)
    private $email;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    private $roles;

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
     * @return Admin
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
     * @return Admin
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
     * @return Admin
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
     * Set university
     *
     * @param \Test\Bundle\TestBundle\Entity\University $university
     * @return Admin
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
     * Set roles
     *
     * @param array $roles
     * @return Admin
     */
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
        return true;
    }

    public function serialize() {
        return serialize([
            $this->id,
        ]);
    }

    public function unserialize($serialized) {
        list(
            $this->id
        )=unserialize($serialized);
    }

}
