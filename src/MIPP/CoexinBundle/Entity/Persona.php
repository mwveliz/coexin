<?php

namespace MIPP\CoexinBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table(name="persona")
 * @ORM\Entity
 */
class Persona extends BaseUser
{
    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", nullable=true)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="nac_cedula", type="string", nullable=true)
     */
    private $nacCedula;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", nullable=true)
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_area", type="string", nullable=true)
     */
    private $codArea;

    /**
     * @var string
     *
     * @ORM\Column(name="telf1", type="string", nullable=true)
     */
    private $telf1;

    /**
     * @var string
     *
     * @ORM\Column(name="telf2", type="string", nullable=true)
     */
    private $telf2;

    /**
     * @var string
     *
     * @ORM\Column(name="telf3", type="string", nullable=true)
     */
    private $telf3;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", nullable=true)
     */
    private $fax;

    

    /**
     * @var string
     *
     * @ORM\Column(name="lugar_residencia", type="string", nullable=true)
     */
    private $lugarResidencia;

    /**
     * @var string
     *
     * @ORM\Column(name="numeros_destino", type="string", nullable=true)
     */
    private $numerosDestino;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="persona_id_seq", allocationSize=1, initialValue=1)
     */
    protected $id;



    /**
     * Set cedula
     *
     * @param string $cedula
     * @return Persona
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nacCedula
     *
     * @param string $nacCedula
     * @return Persona
     */
    public function setNacCedula($nacCedula)
    {
        $this->nacCedula = $nacCedula;

        return $this;
    }

    /**
     * Get nacCedula
     *
     * @return string 
     */
    public function getNacCedula()
    {
        return $this->nacCedula;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Persona
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set codArea
     *
     * @param string $codArea
     * @return Persona
     */
    public function setCodArea($codArea)
    {
        $this->codArea = $codArea;

        return $this;
    }

    /**
     * Get codArea
     *
     * @return string 
     */
    public function getCodArea()
    {
        return $this->codArea;
    }

    /**
     * Set telf1
     *
     * @param string $telf1
     * @return Persona
     */
    public function setTelf1($telf1)
    {
        $this->telf1 = $telf1;

        return $this;
    }

    /**
     * Get telf1
     *
     * @return string 
     */
    public function getTelf1()
    {
        return $this->telf1;
    }

    /**
     * Set telf2
     *
     * @param string $telf2
     * @return Persona
     */
    public function setTelf2($telf2)
    {
        $this->telf2 = $telf2;

        return $this;
    }

    /**
     * Get telf2
     *
     * @return string 
     */
    public function getTelf2()
    {
        return $this->telf2;
    }

    /**
     * Set telf3
     *
     * @param string $telf3
     * @return Persona
     */
    public function setTelf3($telf3)
    {
        $this->telf3 = $telf3;

        return $this;
    }

    /**
     * Get telf3
     *
     * @return string 
     */
    public function getTelf3()
    {
        return $this->telf3;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Persona
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Persona
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
     * Set lugarResidencia
     *
     * @param string $lugarResidencia
     * @return Persona
     */
    public function setLugarResidencia($lugarResidencia)
    {
        $this->lugarResidencia = $lugarResidencia;

        return $this;
    }

    /**
     * Get lugarResidencia
     *
     * @return string 
     */
    public function getLugarResidencia()
    {
        return $this->lugarResidencia;
    }

    /**
     * Set numerosDestino
     *
     * @param string $numerosDestino
     * @return Persona
     */
    public function setNumerosDestino($numerosDestino)
    {
        $this->numerosDestino = $numerosDestino;

        return $this;
    }

    /**
     * Get numerosDestino
     *
     * @return string 
     */
    public function getNumerosDestino()
    {
        return $this->numerosDestino;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Persona
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
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
}
