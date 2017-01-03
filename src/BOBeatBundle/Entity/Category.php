<?php

namespace BOBeatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="BOBeatBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\Length(min=3)
     */
    private $name;


    /**
     *@ORM\OneToMany(targetEntity="BOBeatBundle\Entity\Beat", mappedBy="category")
    */
    private $beats;

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
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->beats = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add beats
     *
     * @param \BOBeatBundle\Entity\Beat $beats
     * @return Category
     */
    public function addBeat(\BOBeatBundle\Entity\Beat $beats)
    {
        $this->beats[] = $beats;

        return $this;
    }

    /**
     * Remove beats
     *
     * @param \BOBeatBundle\Entity\Beat $beats
     */
    public function removeBeat(\BOBeatBundle\Entity\Beat $beats)
    {
        $this->beats->removeElement($beats);
    }

    /**
     * Get beats
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBeats()
    {
        return $this->beats;
    }
}
