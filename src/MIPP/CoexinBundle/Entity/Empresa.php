<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa", indexes={@ORM\Index(name="IDX_B8D75A508F781FEB", columns={"id_persona"}), @ORM\Index(name="IDX_B8D75A5088EF0E82", columns={"id_tipo_empresa"})})
 * @ORM\Entity
 */
class Empresa
{
    /**
     * @var string
     *
     * @ORM\Column(name="rif", type="string", nullable=true)
     */
    private $rif;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_admin", type="text", nullable=true)
     */
    private $direccionAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_area", type="string", nullable=true)
     */
    private $codigoArea;

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
     * @ORM\Column(name="cod_postal_admin", type="string", nullable=true)
     */
    private $codPostalAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="fax_admin", type="string", nullable=true)
     */
    private $faxAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_planta", type="string", nullable=true)
     */
    private $direccionPlanta;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_postal_planta", type="string", nullable=true)
     */
    private $codPostalPlanta;

    /**
     * @var string
     *
     * @ORM\Column(name="telf4", type="string", nullable=true)
     */
    private $telf4;

    /**
     * @var string
     *
     * @ORM\Column(name="telf5", type="string", nullable=true)
     */
    private $telf5;

    /**
     * @var string
     *
     * @ORM\Column(name="telf6", type="string", nullable=true)
     */
    private $telf6;

    /**
     * @var string
     *
     * @ORM\Column(name="fax_planta", type="string", nullable=true)
     */
    private $faxPlanta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="date", nullable=true)
     */
    private $fechaRegistro;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @var boolean
     *
     * @ORM\Column(name="comercializador", type="boolean", nullable=true)
     */
    private $comercializador;

    /**
     * @var boolean
     *
     * @ORM\Column(name="productor", type="boolean", nullable=true)
     */
    private $productor;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="empresa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \MIPP\CoexinBundle\Entity\Persona
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     * })
     */
    private $idPersona;

    /**
     * @var \MIPP\CoexinBundle\Entity\TipoEmpresa
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\TipoEmpresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_empresa", referencedColumnName="id")
     * })
     */
    private $idTipoEmpresa;



    /**
     * Set rif
     *
     * @param string $rif
     * @return Empresa
     */
    public function setRif($rif)
    {
        $this->rif = $rif;

        return $this;
    }

    /**
     * Get rif
     *
     * @return string 
     */
    public function getRif()
    {
        return $this->rif;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Empresa
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set direccionAdmin
     *
     * @param string $direccionAdmin
     * @return Empresa
     */
    public function setDireccionAdmin($direccionAdmin)
    {
        $this->direccionAdmin = $direccionAdmin;

        return $this;
    }

    /**
     * Get direccionAdmin
     *
     * @return string 
     */
    public function getDireccionAdmin()
    {
        return $this->direccionAdmin;
    }

    /**
     * Set codigoArea
     *
     * @param string $codigoArea
     * @return Empresa
     */
    public function setCodigoArea($codigoArea)
    {
        $this->codigoArea = $codigoArea;

        return $this;
    }

    /**
     * Get codigoArea
     *
     * @return string 
     */
    public function getCodigoArea()
    {
        return $this->codigoArea;
    }

    /**
     * Set telf1
     *
     * @param string $telf1
     * @return Empresa
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
     * @return Empresa
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
     * @return Empresa
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
     * Set codPostalAdmin
     *
     * @param string $codPostalAdmin
     * @return Empresa
     */
    public function setCodPostalAdmin($codPostalAdmin)
    {
        $this->codPostalAdmin = $codPostalAdmin;

        return $this;
    }

    /**
     * Get codPostalAdmin
     *
     * @return string 
     */
    public function getCodPostalAdmin()
    {
        return $this->codPostalAdmin;
    }

    /**
     * Set faxAdmin
     *
     * @param string $faxAdmin
     * @return Empresa
     */
    public function setFaxAdmin($faxAdmin)
    {
        $this->faxAdmin = $faxAdmin;

        return $this;
    }

    /**
     * Get faxAdmin
     *
     * @return string 
     */
    public function getFaxAdmin()
    {
        return $this->faxAdmin;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Empresa
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Empresa
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
     * Set direccionPlanta
     *
     * @param string $direccionPlanta
     * @return Empresa
     */
    public function setDireccionPlanta($direccionPlanta)
    {
        $this->direccionPlanta = $direccionPlanta;

        return $this;
    }

    /**
     * Get direccionPlanta
     *
     * @return string 
     */
    public function getDireccionPlanta()
    {
        return $this->direccionPlanta;
    }

    /**
     * Set codPostalPlanta
     *
     * @param string $codPostalPlanta
     * @return Empresa
     */
    public function setCodPostalPlanta($codPostalPlanta)
    {
        $this->codPostalPlanta = $codPostalPlanta;

        return $this;
    }

    /**
     * Get codPostalPlanta
     *
     * @return string 
     */
    public function getCodPostalPlanta()
    {
        return $this->codPostalPlanta;
    }

    /**
     * Set telf4
     *
     * @param string $telf4
     * @return Empresa
     */
    public function setTelf4($telf4)
    {
        $this->telf4 = $telf4;

        return $this;
    }

    /**
     * Get telf4
     *
     * @return string 
     */
    public function getTelf4()
    {
        return $this->telf4;
    }

    /**
     * Set telf5
     *
     * @param string $telf5
     * @return Empresa
     */
    public function setTelf5($telf5)
    {
        $this->telf5 = $telf5;

        return $this;
    }

    /**
     * Get telf5
     *
     * @return string 
     */
    public function getTelf5()
    {
        return $this->telf5;
    }

    /**
     * Set telf6
     *
     * @param string $telf6
     * @return Empresa
     */
    public function setTelf6($telf6)
    {
        $this->telf6 = $telf6;

        return $this;
    }

    /**
     * Get telf6
     *
     * @return string 
     */
    public function getTelf6()
    {
        return $this->telf6;
    }

    /**
     * Set faxPlanta
     *
     * @param string $faxPlanta
     * @return Empresa
     */
    public function setFaxPlanta($faxPlanta)
    {
        $this->faxPlanta = $faxPlanta;

        return $this;
    }

    /**
     * Get faxPlanta
     *
     * @return string 
     */
    public function getFaxPlanta()
    {
        return $this->faxPlanta;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return Empresa
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Empresa
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
     * Set comercializador
     *
     * @param boolean $comercializador
     * @return Empresa
     */
    public function setComercializador($comercializador)
    {
        $this->comercializador = $comercializador;

        return $this;
    }

    /**
     * Get comercializador
     *
     * @return boolean 
     */
    public function getComercializador()
    {
        return $this->comercializador;
    }

    /**
     * Set productor
     *
     * @param boolean $productor
     * @return Empresa
     */
    public function setProductor($productor)
    {
        $this->productor = $productor;

        return $this;
    }

    /**
     * Get productor
     *
     * @return boolean 
     */
    public function getProductor()
    {
        return $this->productor;
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

    /**
     * Set idPersona
     *
     * @param \MIPP\CoexinBundle\Entity\Persona $idPersona
     * @return Empresa
     */
    public function setIdPersona(\MIPP\CoexinBundle\Entity\Persona $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \MIPP\CoexinBundle\Entity\Persona 
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set idTipoEmpresa
     *
     * @param \MIPP\CoexinBundle\Entity\TipoEmpresa $idTipoEmpresa
     * @return Empresa
     */
    public function setIdTipoEmpresa(\MIPP\CoexinBundle\Entity\TipoEmpresa $idTipoEmpresa = null)
    {
        $this->idTipoEmpresa = $idTipoEmpresa;

        return $this;
    }

    /**
     * Get idTipoEmpresa
     *
     * @return \MIPP\CoexinBundle\Entity\TipoEmpresa 
     */
    public function getIdTipoEmpresa()
    {
        return $this->idTipoEmpresa;
    }
}
