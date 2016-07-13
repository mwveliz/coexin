<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoEmpresa
 *
 * @ORM\Table(name="tipo_empresa")
 * @ORM\Entity
 */
class TipoEmpresa
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
     * @ORM\SequenceGenerator(sequenceName="tipo_empresa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return TipoEmpresa
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
}
