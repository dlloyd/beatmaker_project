<?php

namespace BOShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="BOShopBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @var \DateTime
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     * @ORM\Column(name="state", type="string", length=255, unique=false)
     */
    private $state;

    
    /**
     * @ORM\ManyToOne(targetEntity="BOUserBundle\Entity\User", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
    */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="BOBeatBundle\Entity\Beat")
     * @ORM\JoinColumn(nullable=false)
    */
    private $beat;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Commande
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set user
     *
     * @param \BOUserBundle\Entity\User $user
     *
     * @return Commande
     */
    public function setUser(\BOUserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BOUserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set beat
     *
     * @param \BOBeatBundle\Entity\Beat $beat
     *
     * @return Commande
     */
    public function setBeat(\BOBeatBundle\Entity\Beat $beat)
    {
        $this->beat = $beat;

        return $this;
    }

    /**
     * Get beat
     *
     * @return \BOBeatBundle\Entity\Beat
     */
    public function getBeat()
    {
        return $this->beat;
    }
}
