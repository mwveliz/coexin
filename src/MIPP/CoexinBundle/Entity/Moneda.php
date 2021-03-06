<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moneda
 *
 * @ORM\Table(name="moneda", indexes={@ORM\Index(name="IDX_B00B2B2DF57D32FD", columns={"id_pais"})})
 * @ORM\Entity
 */
class Moneda
{
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="moneda_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Moneda
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPais
     *
     * @param \MIPP\CoexinBundle\Entity\Pais $idPais
     * @return Moneda
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
    
    public function __toString()
    {
        return (string)$this->descripcion;
    }
}
