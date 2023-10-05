<?php

namespace App\Domain\Entity;

use App\Kernel\Domain\Entity;
use Doctrine\ORM\Mapping as ORM;

use App\Infra\Repository\CountryRepository;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ORM\Table(name: '`countries`')]
#[ORM\HasLifecycleCallbacks]
final class Country extends Entity
{
    #[ORM\Column(type: 'string', length: 255)]
    private string $code;

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }
}
