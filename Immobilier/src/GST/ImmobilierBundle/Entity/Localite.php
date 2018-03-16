<?php

namespace GST\ImmobilierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localite
 *
 * @ORM\Table(name="localite")
 * @ORM\Entity(repositoryClass="GST\ImmobilierBundle\Repository\LocaliteRepository")
 */
class Localite
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleloca", type="string", length=50)
     */
    private $libelleloca;
 /**

   * @ORM\OneToMany(targetEntity = "GST\ImmobilierBundle\Entity\Bien", mappedBy = "localite")
   */

  private $biens;
  /**

   * @ORM\OneToMany(targetEntity = "GST\ImmobilierBundle\Entity\BienPro", mappedBy = "localite")
   */

  private $bienpros;
  

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelleloca
     *
     * @param string $libelleloca
     *
     * @return Localite
     */
    public function setLibelleloca($libelleloca)
    {
        $this->libelleloca = $libelleloca;

        return $this;
    }

    /**
     * Get libelleloca
     *
     * @return string
     */
    public function getLibelleloca()
    {
        return $this->libelleloca;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->biens = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add bien
     *
     * @param \GST\ImmobilierBundle\Entity\Bien $bien
     *
     * @return Localite
     */
    public function addBien(\GST\ImmobilierBundle\Entity\Bien $bien)
    {
        $this->biens[] = $bien;

        return $this;
    }

    /**
     * Remove bien
     *
     * @param \GST\ImmobilierBundle\Entity\Bien $bien
     */
    public function removeBien(\GST\ImmobilierBundle\Entity\Bien $bien)
    {
        $this->biens->removeElement($bien);
    }

    /**
     * Get biens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBiens()
    {
        return $this->biens;
    }

    public function __toString(){
        return $this->libelleloca;
    }

    /**
     * Add bienpro
     *
     * @param \GST\ImmobilierBundle\Entity\BienPro $bienpro
     *
     * @return Localite
     */
    public function addBienpro(\GST\ImmobilierBundle\Entity\BienPro $bienpro)
    {
        $this->bienpros[] = $bienpro;

        return $this;
    }

    /**
     * Remove bienpro
     *
     * @param \GST\ImmobilierBundle\Entity\BienPro $bienpro
     */
    public function removeBienpro(\GST\ImmobilierBundle\Entity\BienPro $bienpro)
    {
        $this->bienpros->removeElement($bienpro);
    }

    /**
     * Get bienpros
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBienpros()
    {
        return $this->bienpros;
    }
}
