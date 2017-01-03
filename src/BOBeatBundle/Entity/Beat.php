<?php

namespace BOBeatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Beat
 *
 * @ORM\Table(name="beat")
 * @ORM\Entity(repositoryClass="BOBeatBundle\Repository\BeatRepository")
 * @Vich\Uploadable
 */
class Beat
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
     * @ORM\Column(name="song_name", type="string", length=255, unique=true)
     * @Assert\Length(min=3)
     */
    private $songName;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\Length(min=3)
     */
    private $name;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    
    /**
     * @ORM\ManyToOne(targetEntity="BOBeatBundle\Entity\Category", inversedBy="beats")
     * @ORM\JoinColumn(nullable=false)
    */
    private $category;


    /**
     * @Vich\UploadableField(mapping="beat_song", fileNameProperty="songName")
     * @Assert\File(
     *      maxSize="8M",
     *      mimeTypes={"audio/mpeg"},
     *      mimeTypesMessage= "Please upload a valid mp3 file")
     *
     * @var File
    */
    private $songFile;


    public function _construct()
    {
        $this->date= new \DateTime();
    }


    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $song
     *
     * @return Beat
    */
    public function setSongFile(File $song = null)
    {
        $this->songFile = $song;

        if($song){
            $this->date = new\DateTimeImmutable();
        }
        return $this;
    }


    /**
     * @return File|null
    */
    public function getSongFile()
    {
        return $this->songFile;
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

    /**
     * Set songName
     *
     * @param string $songName
     * @return Beat
     */
    public function setSongName($songName)
    {
        $this->songName = $songName;

        return $this;
    }

    /**
     * Get songName
     *
     * @return string 
     */
    public function getsongName()
    {
        return $this->songName;
    }

    
    /**
     * Set name
     *
     * @param string $name
     * @return Beat
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
     * Set date
     *
     * @param \DateTime $date
     * @return Beat
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
     * Set category
     *
     * @param \BOBeatBundle\Entity\Category $category
     * @return Beat
     */
    public function setCategory(\BOBeatBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \BOBeatBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

}
