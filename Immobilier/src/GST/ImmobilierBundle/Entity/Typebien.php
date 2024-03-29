<?php

namespace GST\ImmobilierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typebien
 *
 * @ORM\Table(name="typebien")
 * @ORM\Entity(repositoryClass="GST\ImmobilierBundle\Repository\TypebienRepository")
 */
class Typebien
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
     * @ORM\Column(name="libelletype", type="string", length=50)
     */
    private $libelletype;

 /**

   * @ORM\OneToMany(targetEntity = "GST\ImmobilierBundle\Entity\Bien", mappedBy = "typebien")
   */

  private $biens;
  
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
     * Set libelletype
     *
     * @param string $libelletype
     *
     * @return Typebien
     */
    public function setLibelletype($libelletype)
    {
        $this->libelletype = $libelletype;

        return $this;
    }

    /**
     * Get libelletype
     *
     * @return string
     */
    public function getLibelletype()
    {
        return $this->libelletype;
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
     * @return Typebien
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
        return $this->libelletype;
    }
}
