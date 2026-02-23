<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $User = null;

    #[ORM\Column]
    private ?int $PaymentMethod = null;

    #[ORM\Column]
    private ?int $Category = null;

    #[ORM\Column(length: 255)]
    private ?string $Transcation = null;

    /**
     * @var Collection<int, Transaction>
     */
    #[ORM\OneToMany(targetEntity: Transaction::class, mappedBy: 'User')]
    private Collection $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->User;
    }

    public function setUser(string $User): static
    {
        $this->User = $User;

        return $this;
    }

    public function getPaymentMethod(): ?int
    {
        return $this->PaymentMethod;
    }

    public function setPaymentMethod(int $PaymentMethod): static
    {
        $this->PaymentMethod = $PaymentMethod;

        return $this;
    }

    public function getCategory(): ?int
    {
        return $this->Category;
    }

    public function setCategory(int $Category): static
    {
        $this->Category = $Category;

        return $this;
    }

    public function getTranscation(): ?string
    {
        return $this->Transcation;
    }

    public function setTranscation(string $Transcation): static
    {
        $this->Transcation = $Transcation;

        return $this;
    }

    /**
     * @return Collection<int, Transaction>
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): static
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions->add($transaction);
            $transaction->setUser($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): static
    {
        if ($this->transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getUser() === $this) {
                $transaction->setUser(null);
            }
        }

        return $this;
    }
}
