<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="material", indexes={@ORM\Index(name="IDX_7CBE7595E5B499E9", columns={"id_codigo_arancelario"})})
 * @ORM\Entity
 */
class Material
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", nullable=true)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="material_nacional", type="boolean", nullable=true)
     */
    private $materialNacional;

    /**
     * @var string
     *
     * @ORM\Column(name="incidencia_sobre_costo", type="string", nullable=true)
     */
    private $incidenciaSobreCosto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_productor", type="string", nullable=true)
     */
    private $nombreProductor;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_proveedor", type="string", nullable=true)
     */
    private $nombreProveedor;

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
     * @ORM\SequenceGenerator(sequenceName="material_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \MIPP\CoexinBundle\Entity\CodigoArancelario
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\CodigoArancelario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_codigo_arancelario", referencedColumnName="id")
     * })
     */
    private $idCodigoArancelario;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Material
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
     * Set materialNacional
     *
     * @param boolean $materialNacional
     * @return Material
     */
    public function setMaterialNacional($materialNacional)
    {
        $this->materialNacional = $materialNacional;

        return $this;
    }

    /**
     * Get materialNacional
     *
     * @return boolean 
     */
    public function getMaterialNacional()
    {
        return $this->materialNacional;
    }

    /**
     * Set incidenciaSobreCosto
     *
     * @param string $incidenciaSobreCosto
     * @return Material
     */
    public function setIncidenciaSobreCosto($incidenciaSobreCosto)
    {
        $this->incidenciaSobreCosto = $incidenciaSobreCosto;

        return $this;
    }

    /**
     * Get incidenciaSobreCosto
     *
     * @return string 
     */
    public function getIncidenciaSobreCosto()
    {
        return $this->incidenciaSobreCosto;
    }

    /**
     * Set nombreProductor
     *
     * @param string $nombreProductor
     * @return Material
     */
    public function setNombreProductor($nombreProductor)
    {
        $this->nombreProductor = $nombreProductor;

        return $this;
    }

    /**
     * Get nombreProductor
     *
     * @return string 
     */
    public function getNombreProductor()
    {
        return $this->nombreProductor;
    }

    /**
     * Set nombreProveedor
     *
     * @param string $nombreProveedor
     * @return Material
     */
    public function setNombreProveedor($nombreProveedor)
    {
        $this->nombreProveedor = $nombreProveedor;

        return $this;
    }

    /**
     * Get nombreProveedor
     *
     * @return string 
     */
    public function getNombreProveedor()
    {
        return $this->nombreProveedor;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Material
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

    /**
     * Set idCodigoArancelario
     *
     * @param \MIPP\CoexinBundle\Entity\CodigoArancelario $idCodigoArancelario
     * @return Material
     */
    public function setIdCodigoArancelario(\MIPP\CoexinBundle\Entity\CodigoArancelario $idCodigoArancelario = null)
    {
        $this->idCodigoArancelario = $idCodigoArancelario;

        return $this;
    }

    /**
     * Get idCodigoArancelario
     *
     * @return \MIPP\CoexinBundle\Entity\CodigoArancelario 
     */
    public function getIdCodigoArancelario()
    {
        return $this->idCodigoArancelario;
    }
}
