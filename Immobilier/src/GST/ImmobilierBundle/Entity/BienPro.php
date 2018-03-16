<?php

namespace GST\ImmobilierBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BienPro
 *
 * @ORM\Table(name="bien_pro")
 * @ORM\Entity(repositoryClass="GST\ImmobilierBundle\Repository\BienProRepository")
 */
class BienPro
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="montantvoulu", type="integer")
     */
    private $montantvoulu;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="idparent", type="integer")
     */
    private $idparent;
/**

   * @ORM\ManyToOne(targetEntity="GST\ImmobilierBundle\Entity\Localite")

   * @ORM\JoinColumn(name = "localite_id", referencedColumnName = "id")

   */

  private $localite;
  /**

   * @ORM\ManyToOne(targetEntity="GST\ImmobilierBundle\Entity\Typebien")

   * @ORM\JoinColumn(name = "typebien_id", referencedColumnName = "id")

   */

  private $typebien;
   /**

   * @ORM\OneToMany(targetEntity = "GST\ImmobilierBundle\Entity\Imagepro", mappedBy = "bienpro")
   */

  private $imagepros;
   /**

   * @ORM\OneToMany(targetEntity = "GST\ImmobilierBundle\Entity\Reserve_pro", mappedBy = "bienpro")
   */

  private $reserve_pros;
   /**

   * @ORM\OneToMany(targetEntity = "GST\ImmobilierBundle\Entity\Contrat_pro", mappedBy = "bienpro")
   */

  private $contrat_pros;
 /**

   * @ORM\ManyToOne(targetEntity = "GST\ImmobilierBundle\Entity\Proprietaire",  inversedBy="bienpros")
   *  * @ORM\JoinColumn(nullable=false)

   */

  private $proprietaire;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return BienPro
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return BienPro
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set montantvoulu
     *
     * @param integer $montantvoulu
     *
     * @return BienPro
     */
    public function setMontantvoulu($montantvoulu)
    {
        $this->montantvoulu = $montantvoulu;

        return $this;
    }

    /**
     * Get montantvoulu
     *
     * @return int
     */
    public function getMontantvoulu()
    {
        return $this->montantvoulu;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return BienPro
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set idparent
     *
     * @param integer $idparent
     *
     * @return BienPro
     */
    public function setIdparent($idparent)
    {
        $this->idparent = $idparent;

        return $this;
    }

    /**
     * Get idparent
     *
     * @return int
     */
    public function getIdparent()
    {
        return $this->idparent;
    }

    /**
     * Set localite
     *
     * @param \GST\ImmobilierBundle\Entity\Localite $localite
     *
     * @return BienPro
     */
    public function setLocalite(\GST\ImmobilierBundle\Entity\Localite $localite = null)
    {
        $this->localite = $localite;

        return $this;
    }

    /**
     * Get localite
     *
     * @return \GST\ImmobilierBundle\Entity\Localite
     */
    public function getLocalite()
    {
        return $this->localite;
    }

    /**
     * Set typebien
     *
     * @param \GST\ImmobilierBundle\Entity\Typebien $typebien
     *
     * @return BienPro
     */
    public function setTypebien(\GST\ImmobilierBundle\Entity\Typebien $typebien = null)
    {
        $this->typebien = $typebien;

        return $this;
    }

    /**
     * Get typebien
     *
     * @return \GST\ImmobilierBundle\Entity\Typebien
     */
    public function getTypebien()
    {
        return $this->typebien;
    }
   

   

    /**
     * Add reservePro
     *
     * @param \GST\ImmobilierBundle\Entity\Reserve_pro $reservePro
     *
     * @return BienPro
     */
    public function addReservePro(\GST\ImmobilierBundle\Entity\Reserve_pro $reservePro)
    {
        $this->reserve_pros[] = $reservePro;

        return $this;
    }

    /**
     * Remove reservePro
     *
     * @param \GST\ImmobilierBundle\Entity\Reserve_pro $reservePro
     */
    public function removeReservePro(\GST\ImmobilierBundle\Entity\Reserve_pro $reservePro)
    {
        $this->reserve_pros->removeElement($reservePro);
    }

    /**
     * Get reservePros
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservePros()
    {
        return $this->reserve_pros;
    }

    /**
     * Add contratPro
     *
     * @param \GST\ImmobilierBundle\Entity\Contrat_pro $contratPro
     *
     * @return BienPro
     */
    public function addContratPro(\GST\ImmobilierBundle\Entity\Contrat_pro $contratPro)
    {
        $this->contrat_pros[] = $contratPro;

        return $this;
    }

    /**
     * Remove contratPro
     *
     * @param \GST\ImmobilierBundle\Entity\Contrat_pro $contratPro
     */
    public function removeContratPro(\GST\ImmobilierBundle\Entity\Contrat_pro $contratPro)
    {
        $this->contrat_pros->removeElement($contratPro);
    }

    /**
     * Get contratPros
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContratPros()
    {
        return $this->contrat_pros;
    }

    

    /**
     * Set proprietaire
     *
     * @param \GST\ImmobilierBundle\Entity\Proprietaire $proprietaire
     *
     * @return BienPro
     */
    public function setProprietaire(\GST\ImmobilierBundle\Entity\Proprietaire $proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return \GST\ImmobilierBundle\Entity\Proprietaire
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagepros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reserve_pros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contrat_pros = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add imagepro
     *
     * @param \GST\ImmobilierBundle\Entity\Imagepro $imagepro
     *
     * @return BienPro
     */
    public function addImagepro(\GST\ImmobilierBundle\Entity\Imagepro $imagepro)
    {
        $this->imagepros[] = $imagepro;

        return $this;
    }

    /**
     * Remove imagepro
     *
     * @param \GST\ImmobilierBundle\Entity\Imagepro $imagepro
     */
    public function removeImagepro(\GST\ImmobilierBundle\Entity\Imagepro $imagepro)
    {
        $this->imagepros->removeElement($imagepro);
    }

    /**
     * Get imagepros
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagepros()
    {
        return $this->imagepros;
    }
}
