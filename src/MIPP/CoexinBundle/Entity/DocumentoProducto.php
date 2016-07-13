<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentoProducto
 *
 * @ORM\Table(name="documento_producto", indexes={@ORM\Index(name="IDX_F3B0E9ECF760EA80", columns={"id_producto"}), @ORM\Index(name="IDX_F3B0E9EC69B92C8F", columns={"id_tipo_documento"})})
 * @ORM\Entity
 */
class DocumentoProducto
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="ruta", type="string", nullable=true)
     */
    private $ruta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="documento_producto_id_seq", allocationSize=1, initialValue=1)
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
     * @var \MIPP\CoexinBundle\Entity\TipoDocumento
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\TipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_documento", referencedColumnName="id")
     * })
     */
    private $idTipoDocumento;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return DocumentoProducto
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
     * Set ruta
     *
     * @param string $ruta
     * @return DocumentoProducto
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return string 
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return DocumentoProducto
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
     * @return DocumentoProducto
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

    /**
     * Set idTipoDocumento
     *
     * @param \MIPP\CoexinBundle\Entity\TipoDocumento $idTipoDocumento
     * @return DocumentoProducto
     */
    public function setIdTipoDocumento(\MIPP\CoexinBundle\Entity\TipoDocumento $idTipoDocumento = null)
    {
        $this->idTipoDocumento = $idTipoDocumento;

        return $this;
    }

    /**
     * Get idTipoDocumento
     *
     * @return \MIPP\CoexinBundle\Entity\TipoDocumento 
     */
    public function getIdTipoDocumento()
    {
        return $this->idTipoDocumento;
    }
}
