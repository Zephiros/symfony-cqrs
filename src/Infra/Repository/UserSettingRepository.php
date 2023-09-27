<?php

namespace App\Infra\Repository;

use App\Domain\Entity\UserSetting;
use App\Domain\Repository\IUserSettingRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserSettingRepository extends GenericRepository implements IUserSettingRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSetting::class);
    }
}
