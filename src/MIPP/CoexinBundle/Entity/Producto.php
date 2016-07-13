<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto", indexes={@ORM\Index(name="IDX_A7BB0615E5B499E9", columns={"id_codigo_arancelario"}), @ORM\Index(name="IDX_A7BB061517E2BDF1", columns={"id_codigo_ncm"}), @ORM\Index(name="IDX_A7BB0615963C9EC0", columns={"id_moneda"})})
 * @ORM\Entity
 */
class Producto
{
    /**
     * @var string
     *
     * @ORM\Column(name="denominacion_comercial", type="string", nullable=true)
     */
    private $denominacionComercial;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad_medida", type="string", nullable=true)
     */
    private $unidadMedida;

    /**
     * @var string
     *
     * @ORM\Column(name="proceso_productivo_literal", type="text", nullable=true)
     */
    private $procesoProductivoLiteral;

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
     * @ORM\SequenceGenerator(sequenceName="producto_id_seq", allocationSize=1, initialValue=1)
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
     * @var \MIPP\CoexinBundle\Entity\CodigoNcm
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\CodigoNcm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_codigo_ncm", referencedColumnName="id")
     * })
     */
    private $idCodigoNcm;

    /**
     * @var \MIPP\CoexinBundle\Entity\Moneda
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\Moneda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_moneda", referencedColumnName="id")
     * })
     */
    private $idMoneda;



    /**
     * Set denominacionComercial
     *
     * @param string $denominacionComercial
     * @return Producto
     */
    public function setDenominacionComercial($denominacionComercial)
    {
        $this->denominacionComercial = $denominacionComercial;

        return $this;
    }

    /**
     * Get denominacionComercial
     *
     * @return string 
     */
    public function getDenominacionComercial()
    {
        return $this->denominacionComercial;
    }

    /**
     * Set unidadMedida
     *
     * @param string $unidadMedida
     * @return Producto
     */
    public function setUnidadMedida($unidadMedida)
    {
        $this->unidadMedida = $unidadMedida;

        return $this;
    }

    /**
     * Get unidadMedida
     *
     * @return string 
     */
    public function getUnidadMedida()
    {
        return $this->unidadMedida;
    }

    /**
     * Set procesoProductivoLiteral
     *
     * @param string $procesoProductivoLiteral
     * @return Producto
     */
    public function setProcesoProductivoLiteral($procesoProductivoLiteral)
    {
        $this->procesoProductivoLiteral = $procesoProductivoLiteral;

        return $this;
    }

    /**
     * Get procesoProductivoLiteral
     *
     * @return string 
     */
    public function getProcesoProductivoLiteral()
    {
        return $this->procesoProductivoLiteral;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Producto
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
     * @return Producto
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

    /**
     * Set idCodigoNcm
     *
     * @param \MIPP\CoexinBundle\Entity\CodigoNcm $idCodigoNcm
     * @return Producto
     */
    public function setIdCodigoNcm(\MIPP\CoexinBundle\Entity\CodigoNcm $idCodigoNcm = null)
    {
        $this->idCodigoNcm = $idCodigoNcm;

        return $this;
    }

    /**
     * Get idCodigoNcm
     *
     * @return \MIPP\CoexinBundle\Entity\CodigoNcm 
     */
    public function getIdCodigoNcm()
    {
        return $this->idCodigoNcm;
    }

    /**
     * Set idMoneda
     *
     * @param \MIPP\CoexinBundle\Entity\Moneda $idMoneda
     * @return Producto
     */
    public function setIdMoneda(\MIPP\CoexinBundle\Entity\Moneda $idMoneda = null)
    {
        $this->idMoneda = $idMoneda;

        return $this;
    }

    /**
     * Get idMoneda
     *
     * @return \MIPP\CoexinBundle\Entity\Moneda 
     */
    public function getIdMoneda()
    {
        return $this->idMoneda;
    }
}
