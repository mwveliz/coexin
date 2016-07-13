<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Costo
 *
 * @ORM\Table(name="costo", indexes={@ORM\Index(name="IDX_BB1C0BE7F760EA80", columns={"id_producto"})})
 * @ORM\Entity
 */
class Costo
{
    /**
     * @var string
     *
     * @ORM\Column(name="material_importado", type="string", nullable=true)
     */
    private $materialImportado;

    /**
     * @var string
     *
     * @ORM\Column(name="material_nacional", type="string", nullable=true)
     */
    private $materialNacional;

    /**
     * @var string
     *
     * @ORM\Column(name="mano_obra", type="string", nullable=true)
     */
    private $manoObra;

    /**
     * @var string
     *
     * @ORM\Column(name="depreciacion", type="string", nullable=true)
     */
    private $depreciacion;

    /**
     * @var string
     *
     * @ORM\Column(name="otro_costo_directo", type="string", nullable=true)
     */
    private $otroCostoDirecto;

    /**
     * @var string
     *
     * @ORM\Column(name="gasto_admim", type="string", nullable=true)
     */
    private $gastoAdmim;

    /**
     * @var string
     *
     * @ORM\Column(name="gasto_publicidad", type="string", nullable=true)
     */
    private $gastoPublicidad;

    /**
     * @var string
     *
     * @ORM\Column(name="gasto_venta", type="string", nullable=true)
     */
    private $gastoVenta;

    /**
     * @var string
     *
     * @ORM\Column(name="otro_gasto_indirecto", type="string", nullable=true)
     */
    private $otroGastoIndirecto;

    /**
     * @var string
     *
     * @ORM\Column(name="utilidad", type="string", nullable=true)
     */
    private $utilidad;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_puerta_fabrica", type="string", nullable=true)
     */
    private $precioPuertaFabrica;

    /**
     * @var string
     *
     * @ORM\Column(name="flete_interno", type="string", nullable=true)
     */
    private $fleteInterno;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_fob_exportacion", type="string", nullable=true)
     */
    private $precioFobExportacion;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_fca_exportacion", type="string", nullable=true)
     */
    private $precioFcaExportacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="costo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \MIPP\CoexinBundle\Entity\Producto
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_producto", referencedColumnName="id")
     * })
     */
    private $idProducto;



    /**
     * Set materialImportado
     *
     * @param string $materialImportado
     * @return Costo
     */
    public function setMaterialImportado($materialImportado)
    {
        $this->materialImportado = $materialImportado;

        return $this;
    }

    /**
     * Get materialImportado
     *
     * @return string 
     */
    public function getMaterialImportado()
    {
        return $this->materialImportado;
    }

    /**
     * Set materialNacional
     *
     * @param string $materialNacional
     * @return Costo
     */
    public function setMaterialNacional($materialNacional)
    {
        $this->materialNacional = $materialNacional;

        return $this;
    }

    /**
     * Get materialNacional
     *
     * @return string 
     */
    public function getMaterialNacional()
    {
        return $this->materialNacional;
    }

    /**
     * Set manoObra
     *
     * @param string $manoObra
     * @return Costo
     */
    public function setManoObra($manoObra)
    {
        $this->manoObra = $manoObra;

        return $this;
    }

    /**
     * Get manoObra
     *
     * @return string 
     */
    public function getManoObra()
    {
        return $this->manoObra;
    }

    /**
     * Set depreciacion
     *
     * @param string $depreciacion
     * @return Costo
     */
    public function setDepreciacion($depreciacion)
    {
        $this->depreciacion = $depreciacion;

        return $this;
    }

    /**
     * Get depreciacion
     *
     * @return string 
     */
    public function getDepreciacion()
    {
        return $this->depreciacion;
    }

    /**
     * Set otroCostoDirecto
     *
     * @param string $otroCostoDirecto
     * @return Costo
     */
    public function setOtroCostoDirecto($otroCostoDirecto)
    {
        $this->otroCostoDirecto = $otroCostoDirecto;

        return $this;
    }

    /**
     * Get otroCostoDirecto
     *
     * @return string 
     */
    public function getOtroCostoDirecto()
    {
        return $this->otroCostoDirecto;
    }

    /**
     * Set gastoAdmim
     *
     * @param string $gastoAdmim
     * @return Costo
     */
    public function setGastoAdmim($gastoAdmim)
    {
        $this->gastoAdmim = $gastoAdmim;

        return $this;
    }

    /**
     * Get gastoAdmim
     *
     * @return string 
     */
    public function getGastoAdmim()
    {
        return $this->gastoAdmim;
    }

    /**
     * Set gastoPublicidad
     *
     * @param string $gastoPublicidad
     * @return Costo
     */
    public function setGastoPublicidad($gastoPublicidad)
    {
        $this->gastoPublicidad = $gastoPublicidad;

        return $this;
    }

    /**
     * Get gastoPublicidad
     *
     * @return string 
     */
    public function getGastoPublicidad()
    {
        return $this->gastoPublicidad;
    }

    /**
     * Set gastoVenta
     *
     * @param string $gastoVenta
     * @return Costo
     */
    public function setGastoVenta($gastoVenta)
    {
        $this->gastoVenta = $gastoVenta;

        return $this;
    }

    /**
     * Get gastoVenta
     *
     * @return string 
     */
    public function getGastoVenta()
    {
        return $this->gastoVenta;
    }

    /**
     * Set otroGastoIndirecto
     *
     * @param string $otroGastoIndirecto
     * @return Costo
     */
    public function setOtroGastoIndirecto($otroGastoIndirecto)
    {
        $this->otroGastoIndirecto = $otroGastoIndirecto;

        return $this;
    }

    /**
     * Get otroGastoIndirecto
     *
     * @return string 
     */
    public function getOtroGastoIndirecto()
    {
        return $this->otroGastoIndirecto;
    }

    /**
     * Set utilidad
     *
     * @param string $utilidad
     * @return Costo
     */
    public function setUtilidad($utilidad)
    {
        $this->utilidad = $utilidad;

        return $this;
    }

    /**
     * Get utilidad
     *
     * @return string 
     */
    public function getUtilidad()
    {
        return $this->utilidad;
    }

    /**
     * Set precioPuertaFabrica
     *
     * @param string $precioPuertaFabrica
     * @return Costo
     */
    public function setPrecioPuertaFabrica($precioPuertaFabrica)
    {
        $this->precioPuertaFabrica = $precioPuertaFabrica;

        return $this;
    }

    /**
     * Get precioPuertaFabrica
     *
     * @return string 
     */
    public function getPrecioPuertaFabrica()
    {
        return $this->precioPuertaFabrica;
    }

    /**
     * Set fleteInterno
     *
     * @param string $fleteInterno
     * @return Costo
     */
    public function setFleteInterno($fleteInterno)
    {
        $this->fleteInterno = $fleteInterno;

        return $this;
    }

    /**
     * Get fleteInterno
     *
     * @return string 
     */
    public function getFleteInterno()
    {
        return $this->fleteInterno;
    }

    /**
     * Set precioFobExportacion
     *
     * @param string $precioFobExportacion
     * @return Costo
     */
    public function setPrecioFobExportacion($precioFobExportacion)
    {
        $this->precioFobExportacion = $precioFobExportacion;

        return $this;
    }

    /**
     * Get precioFobExportacion
     *
     * @return string 
     */
    public function getPrecioFobExportacion()
    {
        return $this->precioFobExportacion;
    }

    /**
     * Set precioFcaExportacion
     *
     * @param string $precioFcaExportacion
     * @return Costo
     */
    public function setPrecioFcaExportacion($precioFcaExportacion)
    {
        $this->precioFcaExportacion = $precioFcaExportacion;

        return $this;
    }

    /**
     * Get precioFcaExportacion
     *
     * @return string 
     */
    public function getPrecioFcaExportacion()
    {
        return $this->precioFcaExportacion;
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
     * Set idProducto
     *
     * @param \MIPP\CoexinBundle\Entity\Producto $idProducto
     * @return Costo
     */
    public function setIdProducto(\MIPP\CoexinBundle\Entity\Producto $idProducto = null)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return \MIPP\CoexinBundle\Entity\Producto 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }
}
