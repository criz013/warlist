<?php

namespace App\Entity;

use App\Repository\KeyWordRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KeyWordRepository::class)]
class KeyWord
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'keyWord', targetEntity: DataSheet::class)]
    private Collection $datasheet;

    #[ORM\ManyToOne(inversedBy: 'keyWords')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Games $game = null;

    public function __construct()
    {
        $this->datasheet = new ArrayCollection();
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
            $datasheet->setKeyWord($this);
        }

        return $this;
    }

    public function removeDatasheet(DataSheet $datasheet): static
    {
        if ($this->datasheet->removeElement($datasheet)) {
            // set the owning side to null (unless already changed)
            if ($datasheet->getKeyWord() === $this) {
                $datasheet->setKeyWord(null);
            }
        }

        return $this;
    }

    public function getGame(): ?Games
    {
        return $this->game;
    }

    public function setGame(?Games $game): static
    {
        $this->game = $game;

        return $this;
    }
    
}
