<?php

namespace BOUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="BOUserBundle\Repository\UserRepository")
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
    * @ORM\OneToMany(targetEntity="BOShopBundle\Entity\Commande", mappedBy="user")
    */
    private $commandes;


    public function _construct()
    {
        parent::__construct();
        $this->roles= array( 'ROLE_USER' );
    }


    /**
     * Add commande
     *
     * @param \BOShopBundle\Entity\Commande $commande
     *
     * @return User
     */
    public function addCommande(\BOShopBundle\Entity\Commande $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \BOShopBundle\Entity\Commande $commande
     */
    public function removeCommande(\BOShopBundle\Entity\Commande $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }
}
