<?php

namespace MIPP\CoexinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroPais
 *
 * @ORM\Table(name="registro_pais", indexes={@ORM\Index(name="IDX_B70B8D5AF57D32FD", columns={"id_pais"}), @ORM\Index(name="IDX_B70B8D5A69A744CE", columns={"id_registro"})})
 * @ORM\Entity
 */
class RegistroPais
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="registro_pais_id_seq", allocationSize=1, initialValue=1)
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
     * Set idPais
     *
     * @param \MIPP\CoexinBundle\Entity\Pais $idPais
     * @return RegistroPais
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
     * Set idRegistro
     *
     * @param \MIPP\CoexinBundle\Entity\Registro $idRegistro
     * @return RegistroPais
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
