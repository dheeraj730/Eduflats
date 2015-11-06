<?php
namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\EmailTemplate
 *
 * @ORM\Entity()
 * @ORM\Table(name="emailTemplates", indexes={@ORM\Index(name="fk_emailTemplates_university1_idx", columns={"university_id"})})
 */
class EmailTemplate
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tTemplateName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $tTemplateContent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $tDefaultEmail;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $dCreatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $dUpdatedAt;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $university_id;

    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="emailTemplates")
     * @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     */
    protected $university;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Entity\EmailTemplate
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of tTemplateName.
     *
     * @param string $tTemplateName
     * @return \Entity\EmailTemplate
     */
    public function setTTemplateName($tTemplateName)
    {
        $this->tTemplateName = $tTemplateName;

        return $this;
    }

    /**
     * Get the value of tTemplateName.
     *
     * @return string
     */
    public function getTTemplateName()
    {
        return $this->tTemplateName;
    }

    /**
     * Set the value of tTemplateContent.
     *
     * @param string $tTemplateContent
     * @return \Entity\EmailTemplate
     */
    public function setTTemplateContent($tTemplateContent)
    {
        $this->tTemplateContent = $tTemplateContent;

        return $this;
    }

    /**
     * Get the value of tTemplateContent.
     *
     * @return string
     */
    public function getTTemplateContent()
    {
        return $this->tTemplateContent;
    }

    /**
     * Set the value of tDefaultEmail.
     *
     * @param string $tDefaultEmail
     * @return \Entity\EmailTemplate
     */
    public function setTDefaultEmail($tDefaultEmail)
    {
        $this->tDefaultEmail = $tDefaultEmail;

        return $this;
    }

    /**
     * Get the value of tDefaultEmail.
     *
     * @return string
     */
    public function getTDefaultEmail()
    {
        return $this->tDefaultEmail;
    }

    /**
     * Set the value of dCreatedAt.
     *
     * @param \DateTime $dCreatedAt
     * @return \Entity\EmailTemplate
     */
    public function setDCreatedAt($dCreatedAt)
    {
        $this->dCreatedAt = $dCreatedAt;

        return $this;
    }

    /**
     * Get the value of dCreatedAt.
     *
     * @return \DateTime
     */
    public function getDCreatedAt()
    {
        return $this->dCreatedAt;
    }

    /**
     * Set the value of dUpdatedAt.
     *
     * @param \DateTime $dUpdatedAt
     * @return \Entity\EmailTemplate
     */
    public function setDUpdatedAt($dUpdatedAt)
    {
        $this->dUpdatedAt = $dUpdatedAt;

        return $this;
    }

    /**
     * Get the value of dUpdatedAt.
     *
     * @return \DateTime
     */
    public function getDUpdatedAt()
    {
        return $this->dUpdatedAt;
    }

    /**
     * Set the value of university_id.
     *
     * @param integer $university_id
     * @return \Entity\EmailTemplate
     */
    public function setUniversityId($university_id)
    {
        $this->university_id = $university_id;

        return $this;
    }

    /**
     * Get the value of university_id.
     *
     * @return integer
     */
    public function getUniversityId()
    {
        return $this->university_id;
    }

    /**
     * Set University entity (many to one).
     *
     * @param \Entity\University $university
     * @return \Entity\EmailTemplate
     */
    public function setUniversity(University $university = null)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get University entity (many to one).
     *
     * @return \Entity\University
     */
    public function getUniversity()
    {
        return $this->university;
    }

    public function __sleep()
    {
        return array('id', 'tTemplateName', 'tTemplateContent', 'tDefaultEmail', 'dCreatedAt', 'dUpdatedAt', 'university_id');
    }
}
