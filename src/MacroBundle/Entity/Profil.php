<?php

namespace MacroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorie
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity(repositoryClass="MacroBundle\Repository\profilRepository")
 */
class Profil
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
     * @ORM\Column(name="sexe", type="string")
     */
    private $sexe;

    /**
     * @ORM\Column(name="age", type="string")
     */
    private $age;
    
    /**
     * @ORM\Column(name="mensuration", type="string")
     */
    private $mensuration;
    
    /**
     * @ORM\Column(name="poid", type="string")
     */
    private $poid;

    /**
     * @ORM\Column(name="activite", type="string")
     */
    private $activite;
    

    
    /**
     * Get the value of poid
     */ 
    public function getPoid()
    {
        return $this->poid;
    }

    /**
     * Set the value of poid
     *
     * @return  self
     */ 
    public function setPoid($poid)
    {
        $this->poid = $poid;

        return $this;
    }

    /**
     * Get the value of mensuration
     */ 
    public function getMensuration()
    {
        return $this->mensuration;
    }

    /**
     * Set the value of mensuration
     *
     * @return  self
     */ 
    public function setMensuration($mensuration)
    {
        $this->mensuration = $mensuration;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of sexe
     */ 
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */ 
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of activite
     */ 
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set the value of activite
     *
     * @return  self
     */ 
    public function setActivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }
}

