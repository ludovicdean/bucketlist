<?php

namespace App\Entity;

use App\Repository\IdeaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=IdeaRepository::class)
 */
class Idea
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Please provide a name for the idea !")
     * @Assert\Length(max=255, maxMessage="Max 255 characters !")
     * @ORM\Column(type="string",length=250)
     */
    private $title;

    /**
     * @Assert\NotBlank(message="Please provide a description for the idea !")
     * @Assert\Length(max=500, maxMessage="Max 500 characters !")
     * @ORM\Column(type="string",length=500, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string",length=50)
     * @Assert\NotBlank(message="Please provide your name for the idea !")
     * @Assert\Length(max=50, maxMessage="Max 50 characters !")
     */
    private $author;

    /**
     * @ORM\Column(type="boolean")
     */

    private $isPublished;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param mixed $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * @ORM\Column(type="datetime")
     */

    private $dateCreated;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

}
