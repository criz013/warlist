<?php

namespace App\Entity;

use App\Repository\GamesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamesRepository::class)]
class Games
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 10)]
    private ?string $version = null;

    #[ORM\OneToMany(mappedBy: 'game', targetEntity: KeyWord::class)]
    private Collection $dataSheet;

    #[ORM\ManyToMany(targetEntity: Army::class, mappedBy: 'game')]
    private Collection $armies;

    #[ORM\OneToMany(mappedBy: 'game', targetEntity: KeyWord::class)]
    private Collection $keyWords;

    public function __construct()
    {
        $this->dataSheet = new ArrayCollection();
        $this->armies = new ArrayCollection();
        $this->keyWords = new ArrayCollection();
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

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return Collection<int, KeyWord>
     */
    public function getDataSheet(): Collection
    {
        return $this->dataSheet;
    }

    public function addDataSheet(KeyWord $dataSheet): static
    {
        if (!$this->dataSheet->contains($dataSheet)) {
            $this->dataSheet->add($dataSheet);
            $dataSheet->setGame($this);
        }

        return $this;
    }

    public function removeDataSheet(KeyWord $dataSheet): static
    {
        if ($this->dataSheet->removeElement($dataSheet)) {
            // set the owning side to null (unless already changed)
            if ($dataSheet->getGame() === $this) {
                $dataSheet->setGame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Army>
     */
    public function getArmies(): Collection
    {
        return $this->armies;
    }

    public function addArmy(Army $army): static
    {
        if (!$this->armies->contains($army)) {
            $this->armies->add($army);
            $army->addGame($this);
        }

        return $this;
    }

    public function removeArmy(Army $army): static
    {
        if ($this->armies->removeElement($army)) {
            $army->removeGame($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, KeyWord>
     */
    public function getKeyWords(): Collection
    {
        return $this->keyWords;
    }

    public function addKeyWord(KeyWord $keyWord): static
    {
        if (!$this->keyWords->contains($keyWord)) {
            $this->keyWords->add($keyWord);
            $keyWord->setGame($this);
        }

        return $this;
    }

    public function removeKeyWord(KeyWord $keyWord): static
    {
        if ($this->keyWords->removeElement($keyWord)) {
            // set the owning side to null (unless already changed)
            if ($keyWord->getGame() === $this) {
                $keyWord->setGame(null);
            }
        }

        return $this;
    }
}
