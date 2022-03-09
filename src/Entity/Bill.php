<?php

namespace App\Entity;

use App\Entity\Customer;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BillRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: BillRepository::class)]
class Bill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    private $cusname;

    #[ORM\ManyToMany(targetEntity: product::class)]
    private $proname;

    #[ORM\ManyToOne(targetEntity: Staff::class)]
    private $staname;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\ManyToMany(targetEntity: Product::class)]
    private $Prodname;

    public function __construct()
    {
        $this->proname = new ArrayCollection();
        $this->Prodname = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?Customer
    {
        return $this->cusname;
    }

    public function setName(?Customer $cusname): self
    {
        $this->cusname = $cusname;

        return $this;
    }

    /**
     * @return Collection<int, product>
     */
    public function getProname(): Collection
    {
        return $this->proname;
    }

    public function addProname(product $proname): self
    {
        if (!$this->proname->contains($proname)) {
            $this->proname[] = $proname;
        }

        return $this;
    }

    public function removeProname(product $proname): self
    {
        $this->proname->removeElement($proname);

        return $this;
    }

    public function getStaname(): ?Staff
    {
        return $this->staname;
    }

    public function setStaname(?Staff $staname): self
    {
        $this->staname = $staname;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProdname(): Collection
    {
        return $this->Prodname;
    }

    public function addProdname(Product $prodname): self
    {
        if (!$this->Prodname->contains($prodname)) {
            $this->Prodname[] = $prodname;
        }

        return $this;
    }

    public function removeProdname(Product $prodname): self
    {
        $this->Prodname->removeElement($prodname);

        return $this;
    }
}
