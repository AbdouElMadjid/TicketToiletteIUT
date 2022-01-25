<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
#[ApiResource(
    itemOperations: [
        "get" => [],
        "put" => [],
        "delete" => []
    ],

    collectionOperations: [
        "get",
    ]
)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $matricule;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    private $secondname;

    #[ORM\OneToOne(mappedBy: 'etudiant', targetEntity: TicketToilette::class, cascade: ['persist', 'remove'])]
    private $ticketToilette;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?int
    {
        return $this->matricule;
    }

    public function setMatricule(int $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getSecondname(): ?string
    {
        return $this->secondname;
    }

    public function setSecondname(string $secondname): self
    {
        $this->secondname = $secondname;

        return $this;
    }

    public function getTicketToilette(): ?TicketToilette
    {
        return $this->ticketToilette;
    }

    public function setTicketToilette(?TicketToilette $ticketToilette): self
    {
        $this->ticketToilette = $ticketToilette;

        return $this;
    }
}
