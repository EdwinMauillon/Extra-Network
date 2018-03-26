<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    protected $nom;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User")
     */
    protected $amis = array();


    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=255, nullable=true)
     */
    protected $famille;
    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255, nullable=true)
     */
    protected $race;
    /**
     * @var string
     *
     * @ORM\Column(name="nourritureFav", type="string", length=255, nullable=true)
     */
    protected $nourritureFav;
    /**
     * @var string
     *
     * @ORM\Column(name="planete", type="string", length=255, nullable=true)
     */
    protected $planete;
    /**
     * @var string
     *
     * @ORM\Column(name="galaxie", type="string", length=255, nullable=true)
     */
    protected $galaxie;



    public function addNourriture($nourriture)
    {
        return $this->nourriture[] = $nourriture;
    }

    public function getNourriture()
    {
        return $this->nourriture;
    }

    public function setNourriture($nourriture)
    {
        $this->addNourriture($nourriture);

        return $this;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * Add ami
     *
     * @param \AppBundle\Entity\User $ami
     *
     * @return User
     */
    public function addAmi(\AppBundle\Entity\User $ami)
    {
        $this->amis[] = $ami;

        return $this;
    }

    /**
     * Remove ami
     *
     * @param \AppBundle\Entity\User $ami
     */
    public function removeAmi(\AppBundle\Entity\User $ami)
    {
        $this->amis->removeElement($ami);
    }

    /**
     * Get amis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmis()
    {
        return $this->amis;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return User
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return User
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set nourritureFav
     *
     * @param string $nourritureFav
     *
     * @return User
     */
    public function setNourritureFav($nourritureFav)
    {
        $this->nourritureFav = $nourritureFav;

        return $this;
    }

    /**
     * Get nourritureFav
     *
     * @return string
     */
    public function getNourritureFav()
    {
        return $this->nourritureFav;
    }

    /**
     * Set planete
     *
     * @param string $planete
     *
     * @return User
     */
    public function setPlanete($planete)
    {
        $this->planete = $planete;

        return $this;
    }

    /**
     * Get planete
     *
     * @return string
     */
    public function getPlanete()
    {
        return $this->planete;
    }

    /**
     * Set galaxie
     *
     * @param string $galaxie
     *
     * @return User
     */
    public function setGalaxie($galaxie)
    {
        $this->galaxie = $galaxie;

        return $this;
    }

    /**
     * Get galaxie
     *
     * @return string
     */
    public function getGalaxie()
    {
        return $this->galaxie;
    }
}
