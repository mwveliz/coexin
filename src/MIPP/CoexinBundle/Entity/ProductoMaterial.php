<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductoMaterial
 *
 * @ORM\Table(name="producto_material", indexes={@ORM\Index(name="IDX_542D04402C659900", columns={"id_material"}), @ORM\Index(name="IDX_542D0440F57D32FD", columns={"id_pais"}), @ORM\Index(name="IDX_542D0440F760EA80", columns={"id_producto"})})
 * @ORM\Entity
 */
class ProductoMaterial
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="producto_material_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \MIPP\CoexinBundle\Entity\Material
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\Material")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_material", referencedColumnName="id")
     * })
     */
    private $idMaterial;

    /**
     * @var \MIPP\CoexinBundle\Entity\Pais
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pais", referencedColumnName="id")
     * })
     */
    private $idPais;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idMaterial
     *
     * @param \MIPP\CoexinBundle\Entity\Material $idMaterial
     * @return ProductoMaterial
     */
    public function setIdMaterial(\MIPP\CoexinBundle\Entity\Material $idMaterial = null)
    {
        $this->idMaterial = $idMaterial;

        return $this;
    }

    /**
     * Get idMaterial
     *
     * @return \MIPP\CoexinBundle\Entity\Material 
     */
    public function getIdMaterial()
    {
        return $this->idMaterial;
    }

    /**
     * Set idPais
     *
     * @param \MIPP\CoexinBundle\Entity\Pais $idPais
     * @return ProductoMaterial
     */
    public function setIdPais(\MIPP\CoexinBundle\Entity\Pais $idPais = null)
    {
        $this->idPais = $idPais;

        return $this;
    }

    /**
     * Get idPais
     *
     * @return \MIPP\CoexinBundle\Entity\Pais 
     */
    public function getIdPais()
    {
        return $this->idPais;
    }

    /**
     * Set idProducto
     *
     * @param \MIPP\CoexinBundle\Entity\Producto $idProducto
     * @return ProductoMaterial
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
