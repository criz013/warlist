<?php

namespace App\Entity;

use App\Repository\ArmyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmyRepository::class)]
class Army
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'army', targetEntity: DataSheet::class)]
    private Collection $datasheet;

    #[ORM\ManyToMany(targetEntity: Games::class, inversedBy: 'armies')]
    private Collection $game;

    public function __construct()
    {
        $this->datasheet = new ArrayCollection();
        $this->game = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, DataSheet>
     */
    public function getDatasheet(): Collection
    {
        return $this->datasheet;
    }

    public function addDatasheet(DataSheet $datasheet): static
    {
        if (!$this->datasheet->contains($datasheet)) {
            $this->datasheet->add($datasheet);
            $datasheet->setArmy($this);
        }

        return $this;
    }

    public function removeDatasheet(DataSheet $datasheet): static
    {
        if ($this->datasheet->removeElement($datasheet)) {
            // set the owning side to null (unless already changed)
            if ($datasheet->getArmy() === $this) {
                $datasheet->setArmy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Games>
     */
    public function getGame(): Collection
    {
        return $this->game;
    }

    public function addGame(Games $game): static
    {
        if (!$this->game->contains($game)) {
            $this->game->add($game);
        }

        return $this;
    }

    public function removeGame(Games $game): static
    {
        $this->game->removeElement($game);

        return $this;
    }
}
