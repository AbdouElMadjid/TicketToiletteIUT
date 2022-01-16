<?php

namespace App\Entity;

use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TicketToiletteRepository;
use DateInterval;
use Symfony\Component\Validator\Constraints\Date;

#[ORM\Entity(repositoryClass: TicketToiletteRepository::class)]
class TicketToilette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $expiratedAt;



    #[ORM\OneToOne(mappedBy: 'ticketToilette', targetEntity: Etudiant::class, cascade: ['persist', 'remove'])]
    private $etudiant;

    #[ORM\Column(type: 'string', length: 50)]
    private $type;

    public function __construct(String $type)
    {
        $date = new DateTime();
        $this->type = $type;

        if ($this->type === "A") {
            $this->expiratedAt = $date->add(new DateInterval('P1Y'));
        } else if ($this->type === "M") {
            $this->expiratedAt = $date->add(new DateInterval('P1M'));
        } else if ($this->type === "D") {
            $this->expiratedAt = $date->add(new DateInterval('P1D'));
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getExpiratedAt(): ?\DateTime
    {
        return $this->expiratedAt;
    }

    public function setExpiratedAt(\DateTime $expiratedAt): self
    {
        $this->expiratedAt = $expiratedAt;

        return $this;
    }

    public function getCategoy(): ?array
    {
        return $this->categoy;
    }

    public function setCategoy(array $categoy): self
    {
        $this->categoy = $categoy;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        // unset the owning side of the relation if necessary
        if ($etudiant === null && $this->etudiant !== null) {
            $this->etudiant->setTicketToilette(null);
        }

        // set the owning side of the relation if necessary
        if ($etudiant !== null && $etudiant->getTicketToilette() !== $this) {
            $etudiant->setTicketToilette($this);
        }

        $this->etudiant = $etudiant;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
