<?php

namespace App\Entity;

use App\Entity\Codecomptable;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 * @Vich\Uploadable
 */
class Compte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fichier;

    /**
     * @Vich\UploadableField(mapping="archives", fileNameProperty="fichier")
     * @var File
     */
    private $imageFile;


    /**
     * @ORM\ManyToOne(targetEntity=Codecomptable::class, inversedBy="comptes")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\NotNull
     * 
     */
    private $codecompta;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="comptes")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\NotNull
     * 
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="comptes")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\NotNull
     * 
     */
    private $comptable;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cheque;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $payement;

    public function __construct()
    {
        //$this->codecompta = new ArrayCollection();
        //$this->client = new ArrayCollection();
        //$this->comptable = new ArrayCollection();
        $this->date = new \DateTime();
        $this->updated_at = new \DateTime();
                
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(?string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
    }


    public function getCodecompta(): ?Codecomptable
    {
       
        return $this->codecompta;
    }

    public function setCodecompta(?Codecomptable $codecompta): self
    {
        $this->codecompta = $codecompta;

        return $this;
    }

    public function getClient(): ?client
    {
        
        return $this->client;
    }

    public function setClient(?client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getComptable(): ?users
    {
      
        return $this->comptable;
    }

    public function setComptable(?users $comptable): self
    {
        $this->comptable = $comptable;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile(File $image = null): self
    {
        $this->imageFile = $image;
        
        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($this->imageFile instanceof UploadedFile) {
             //if 'updatedAt' is not defined in your entity, use another property
            $this->updated_at = new \DateTime();
        }
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCheque(): ?string
    {
        return $this->cheque;
    }

    public function setCheque(?string $cheque): self
    {
        $this->cheque = $cheque;

        return $this;
    }

    public function getPayement(): ?bool
    {
        return $this->payement;
    }

    public function setPayement(?bool $payement): self
    {
        $this->payement = $payement;

        return $this;
    }

}
