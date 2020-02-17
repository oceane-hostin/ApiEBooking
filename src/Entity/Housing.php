<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HousingRepository")
 */
class Housing
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="float")
     */
    private $pricePerDay;

    /**
     * @ORM\Column(type="integer")
     */
    private $surfaceArea;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfTravellers;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfBedrooms;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfBed;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfBathrooms;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="relation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $person;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPricePerDay(): ?float
    {
        return $this->pricePerDay;
    }

    public function setPricePerDay(float $pricePerDay): self
    {
        $this->pricePerDay = $pricePerDay;

        return $this;
    }

    public function getSurfaceArea(): ?int
    {
        return $this->surfaceArea;
    }

    public function setSurfaceArea(int $surfaceArea): self
    {
        $this->surfaceArea = $surfaceArea;

        return $this;
    }

    public function getNumberOfTravellers(): ?int
    {
        return $this->numberOfTravellers;
    }

    public function setNumberOfTravellers(int $numberOfTravellers): self
    {
        $this->numberOfTravellers = $numberOfTravellers;

        return $this;
    }

    public function getNumberOfBedrooms(): ?int
    {
        return $this->numberOfBedrooms;
    }

    public function setNumberOfBedrooms(int $numberOfBedrooms): self
    {
        $this->numberOfBedrooms = $numberOfBedrooms;

        return $this;
    }

    public function getNumberOfBed(): ?int
    {
        return $this->numberOfBed;
    }

    public function setNumberOfBed(int $numberOfBed): self
    {
        $this->numberOfBed = $numberOfBed;

        return $this;
    }

    public function getNumberOfBathrooms(): ?int
    {
        return $this->numberOfBathrooms;
    }

    public function setNumberOfBathrooms(int $numberOfBathrooms): self
    {
        $this->numberOfBathrooms = $numberOfBathrooms;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
