<?php

namespace App\Entity;

use App\Repository\DataSheetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataSheetRepository::class)]
class DataSheet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'datasheet')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Army $army = null;

    #[ORM\ManyToOne(inversedBy: 'datasheet')]
    private ?KeyWord $keyWord = null;

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

    public function getArmy(): ?Army
    {
        return $this->army;
    }

    public function setArmy(?Army $army): static
    {
        $this->army = $army;

        return $this;
    }

    public function getKeyWord(): ?KeyWord
    {
        return $this->keyWord;
    }

    public function setKeyWord(?KeyWord $keyWord): static
    {
        $this->keyWord = $keyWord;

        return $this;
    }
}
