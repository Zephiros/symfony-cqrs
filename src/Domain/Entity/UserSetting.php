<?php

namespace App\Domain\Entity;

use App\Domain\Enum\Theme;
use App\Kernel\Domain\SimplyAuditableEntity;
use Doctrine\ORM\Mapping as ORM;

use App\Infra\Repository\UserSettingRepository;

#[ORM\Entity(repositoryClass: UserSettingRepository::class)]
#[ORM\Table(name: '`user_settings`')]
#[ORM\HasLifecycleCallbacks]
class UserSetting extends SimplyAuditableEntity
{
    #[ORM\Column(type: 'integer', enumType: Theme::class)]
    private Theme $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }
}
