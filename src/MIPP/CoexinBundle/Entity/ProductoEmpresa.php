<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductoEmpresa
 *
 * @ORM\Table(name="producto_empresa", indexes={@ORM\Index(name="IDX_291E1168F760EA80", columns={"id_producto"}), @ORM\Index(name="IDX_291E116869A744CE", columns={"id_registro"})})
 * @ORM\Entity
 */
class ProductoEmpresa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="producto_empresa_id_seq", allocationSize=1, initialValue=1)
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
     * @var \MIPP\CoexinBundle\Entity\Registro
     *
     * @ORM\ManyToOne(targetEntity="MIPP\CoexinBundle\Entity\Registro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_registro", referencedColumnName="id")
     * })
     */
    private $idRegistro;



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
     * @return ProductoEmpresa
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
     * Set idRegistro
     *
     * @param \MIPP\CoexinBundle\Entity\Registro $idRegistro
     * @return ProductoEmpresa
     */
    public function setIdRegistro(\MIPP\CoexinBundle\Entity\Registro $idRegistro = null)
    {
        $this->idRegistro = $idRegistro;

        return $this;
    }

    /**
     * Get idRegistro
     *
     * @return \MIPP\CoexinBundle\Entity\Registro 
     */
    public function getIdRegistro()
    {
        return $this->idRegistro;
    }
}
