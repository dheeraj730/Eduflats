<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-08-05 09:11:21.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace Eduflats\Bundle\EduflatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity\Authentication
 *
 * @ORM\Entity(repositoryClass="AuthenticationRepository")
 * @ORM\Table(name="authentication", indexes={@ORM\Index(name="fk_authentication_authentication_type1_idx", columns={"authenticationTypeId"}), @ORM\Index(name="fk_authentication_university1_idx", columns={"university_id"})})
 */
class Authentication
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $authenticationTypeId;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $bRistrictions;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $bEmailVerification;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $bLDAP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tLDAPserver;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $nPortNo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $bCAS;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tCASserver;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $bCASdisablePassiveAuthetication;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $buseSSL;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tUserDNformat;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $bForceAcceptSSLCertificate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $bHTTPpostAuthentication;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tURL;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tUserNameVariable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tPasswordVariable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $tValidResponse;

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
     * @ORM\ManyToOne(targetEntity="AuthenticationType", inversedBy="authentications")
     * @ORM\JoinColumn(name="authenticationTypeId", referencedColumnName="id")
     */
    protected $authenticationType;

    /**
     * @ORM\ManyToOne(targetEntity="University", inversedBy="authentications")
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
     * @return \Entity\Authentication
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
     * Set the value of authenticationTypeId.
     *
     * @param integer $authenticationTypeId
     * @return \Entity\Authentication
     */
    public function setAuthenticationTypeId($authenticationTypeId)
    {
        $this->authenticationTypeId = $authenticationTypeId;

        return $this;
    }

    /**
     * Get the value of authenticationTypeId.
     *
     * @return integer
     */
    public function getAuthenticationTypeId()
    {
        return $this->authenticationTypeId;
    }

    /**
     * Set the value of bRistrictions.
     *
     * @param boolean $bRistrictions
     * @return \Entity\Authentication
     */
    public function setBRistrictions($bRistrictions)
    {
        $this->bRistrictions = $bRistrictions;

        return $this;
    }

    /**
     * Get the value of bRistrictions.
     *
     * @return boolean
     */
    public function getBRistrictions()
    {
        return $this->bRistrictions;
    }

    /**
     * Set the value of bEmailVerification.
     *
     * @param boolean $bEmailVerification
     * @return \Entity\Authentication
     */
    public function setBEmailVerification($bEmailVerification)
    {
        $this->bEmailVerification = $bEmailVerification;

        return $this;
    }

    /**
     * Get the value of bEmailVerification.
     *
     * @return boolean
     */
    public function getBEmailVerification()
    {
        return $this->bEmailVerification;
    }

    /**
     * Set the value of bLDAP.
     *
     * @param boolean $bLDAP
     * @return \Entity\Authentication
     */
    public function setBLDAP($bLDAP)
    {
        $this->bLDAP = $bLDAP;

        return $this;
    }

    /**
     * Get the value of bLDAP.
     *
     * @return boolean
     */
    public function getBLDAP()
    {
        return $this->bLDAP;
    }

    /**
     * Set the value of tLDAPserver.
     *
     * @param string $tLDAPserver
     * @return \Entity\Authentication
     */
    public function setTLDAPserver($tLDAPserver)
    {
        $this->tLDAPserver = $tLDAPserver;

        return $this;
    }

    /**
     * Get the value of tLDAPserver.
     *
     * @return string
     */
    public function getTLDAPserver()
    {
        return $this->tLDAPserver;
    }

    /**
     * Set the value of nPortNo.
     *
     * @param integer $nPortNo
     * @return \Entity\Authentication
     */
    public function setNPortNo($nPortNo)
    {
        $this->nPortNo = $nPortNo;

        return $this;
    }

    /**
     * Get the value of nPortNo.
     *
     * @return integer
     */
    public function getNPortNo()
    {
        return $this->nPortNo;
    }

    /**
     * Set the value of bCAS.
     *
     * @param boolean $bCAS
     * @return \Entity\Authentication
     */
    public function setBCAS($bCAS)
    {
        $this->bCAS = $bCAS;

        return $this;
    }

    /**
     * Get the value of bCAS.
     *
     * @return boolean
     */
    public function getBCAS()
    {
        return $this->bCAS;
    }

    /**
     * Set the value of tCASserver.
     *
     * @param string $tCASserver
     * @return \Entity\Authentication
     */
    public function setTCASserver($tCASserver)
    {
        $this->tCASserver = $tCASserver;

        return $this;
    }

    /**
     * Get the value of tCASserver.
     *
     * @return string
     */
    public function getTCASserver()
    {
        return $this->tCASserver;
    }

    /**
     * Set the value of bCASdisablePassiveAuthetication.
     *
     * @param boolean $bCASdisablePassiveAuthetication
     * @return \Entity\Authentication
     */
    public function setBCASdisablePassiveAuthetication($bCASdisablePassiveAuthetication)
    {
        $this->bCASdisablePassiveAuthetication = $bCASdisablePassiveAuthetication;

        return $this;
    }

    /**
     * Get the value of bCASdisablePassiveAuthetication.
     *
     * @return boolean
     */
    public function getBCASdisablePassiveAuthetication()
    {
        return $this->bCASdisablePassiveAuthetication;
    }

    /**
     * Set the value of buseSSL.
     *
     * @param boolean $buseSSL
     * @return \Entity\Authentication
     */
    public function setBuseSSL($buseSSL)
    {
        $this->buseSSL = $buseSSL;

        return $this;
    }

    /**
     * Get the value of buseSSL.
     *
     * @return boolean
     */
    public function getBuseSSL()
    {
        return $this->buseSSL;
    }

    /**
     * Set the value of tUserDNformat.
     *
     * @param string $tUserDNformat
     * @return \Entity\Authentication
     */
    public function setTUserDNformat($tUserDNformat)
    {
        $this->tUserDNformat = $tUserDNformat;

        return $this;
    }

    /**
     * Get the value of tUserDNformat.
     *
     * @return string
     */
    public function getTUserDNformat()
    {
        return $this->tUserDNformat;
    }

    /**
     * Set the value of bForceAcceptSSLCertificate.
     *
     * @param boolean $bForceAcceptSSLCertificate
     * @return \Entity\Authentication
     */
    public function setBForceAcceptSSLCertificate($bForceAcceptSSLCertificate)
    {
        $this->bForceAcceptSSLCertificate = $bForceAcceptSSLCertificate;

        return $this;
    }

    /**
     * Get the value of bForceAcceptSSLCertificate.
     *
     * @return boolean
     */
    public function getBForceAcceptSSLCertificate()
    {
        return $this->bForceAcceptSSLCertificate;
    }

    /**
     * Set the value of bHTTPpostAuthentication.
     *
     * @param boolean $bHTTPpostAuthentication
     * @return \Entity\Authentication
     */
    public function setBHTTPpostAuthentication($bHTTPpostAuthentication)
    {
        $this->bHTTPpostAuthentication = $bHTTPpostAuthentication;

        return $this;
    }

    /**
     * Get the value of bHTTPpostAuthentication.
     *
     * @return boolean
     */
    public function getBHTTPpostAuthentication()
    {
        return $this->bHTTPpostAuthentication;
    }

    /**
     * Set the value of tURL.
     *
     * @param string $tURL
     * @return \Entity\Authentication
     */
    public function setTURL($tURL)
    {
        $this->tURL = $tURL;

        return $this;
    }

    /**
     * Get the value of tURL.
     *
     * @return string
     */
    public function getTURL()
    {
        return $this->tURL;
    }

    /**
     * Set the value of tUserNameVariable.
     *
     * @param string $tUserNameVariable
     * @return \Entity\Authentication
     */
    public function setTUserNameVariable($tUserNameVariable)
    {
        $this->tUserNameVariable = $tUserNameVariable;

        return $this;
    }

    /**
     * Get the value of tUserNameVariable.
     *
     * @return string
     */
    public function getTUserNameVariable()
    {
        return $this->tUserNameVariable;
    }

    /**
     * Set the value of tPasswordVariable.
     *
     * @param string $tPasswordVariable
     * @return \Entity\Authentication
     */
    public function setTPasswordVariable($tPasswordVariable)
    {
        $this->tPasswordVariable = $tPasswordVariable;

        return $this;
    }

    /**
     * Get the value of tPasswordVariable.
     *
     * @return string
     */
    public function getTPasswordVariable()
    {
        return $this->tPasswordVariable;
    }

    /**
     * Set the value of tValidResponse.
     *
     * @param string $tValidResponse
     * @return \Entity\Authentication
     */
    public function setTValidResponse($tValidResponse)
    {
        $this->tValidResponse = $tValidResponse;

        return $this;
    }

    /**
     * Get the value of tValidResponse.
     *
     * @return string
     */
    public function getTValidResponse()
    {
        return $this->tValidResponse;
    }

    /**
     * Set the value of dCreatedAt.
     *
     * @param \DateTime $dCreatedAt
     * @return \Entity\Authentication
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
     * @return \Entity\Authentication
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
     * @return \Entity\Authentication
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
     * Set AuthenticationType entity (many to one).
     *
     * @param \Entity\AuthenticationType $authenticationType
     * @return \Entity\Authentication
     */
    public function setAuthenticationType(AuthenticationType $authenticationType = null)
    {
        $this->authenticationType = $authenticationType;

        return $this;
    }

    /**
     * Get AuthenticationType entity (many to one).
     *
     * @return \Entity\AuthenticationType
     */
    public function getAuthenticationType()
    {
        return $this->authenticationType;
    }

    /**
     * Set University entity (many to one).
     *
     * @param \Entity\University $university
     * @return \Entity\Authentication
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
        return array('id', 'authenticationTypeId', 'bRistrictions', 'bEmailVerification', 'bLDAP', 'tLDAPserver', 'nPortNo', 'bCAS', 'tCASserver', 'bCASdisablePassiveAuthetication', 'buseSSL', 'tUserDNformat', 'bForceAcceptSSLCertificate', 'bHTTPpostAuthentication', 'tURL', 'tUserNameVariable', 'tPasswordVariable', 'tValidResponse', 'dCreatedAt', 'dUpdatedAt', 'university_id');
    }
}
