<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registro
 *
 * @ORM\Table(name="registro", indexes={@ORM\Index(name="IDX_397CA85B664AF320", columns={"id_empresa"})})
 * @ORM\Entity
 */
class Registro
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_registro", type="string", nullable=true)
     */
    private $codigoRegistro;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="registro_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \MIPP\CoexinBundle\Entity\Empresa
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\Empresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empresa", referencedColumnName="id")
     * })
     */
    private $idEmpresa;



    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Registro
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set codigoRegistro
     *
     * @param string $codigoRegistro
     * @return Registro
     */
    public function setCodigoRegistro($codigoRegistro)
    {
        $this->codigoRegistro = $codigoRegistro;

        return $this;
    }

    /**
     * Get codigoRegistro
     *
     * @return string 
     */
    public function getCodigoRegistro()
    {
        return $this->codigoRegistro;
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
     * Set idEmpresa
     *
     * @param \MIPP\CoexinBundle\Entity\Empresa $idEmpresa
     * @return Registro
     */
    public function setIdEmpresa(\MIPP\CoexinBundle\Entity\Empresa $idEmpresa = null)
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }

    /**
     * Get idEmpresa
     *
     * @return \MIPP\CoexinBundle\Entity\Empresa 
     */
    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }
}
