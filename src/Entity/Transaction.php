<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionRepository::class)]
class Transaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PaymentMethod $Transaction = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?Category $no = null;

    #[ORM\ManyToOne(inversedBy: 'transactions')]
    private ?User $User = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTransaction(): ?PaymentMethod
    {
        return $this->Transaction;
    }

    public function setTransaction(?PaymentMethod $Transaction): static
    {
        $this->Transaction = $Transaction;

        return $this;
    }

    public function getNo(): ?Category
    {
        return $this->no;
    }

    public function setNo(?Category $no): static
    {
        $this->no = $no;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }
}
