<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\Models\User;

interface UserSettingsInterface
{
    public function save(User $user = null, string $setting, string $value) : void;
}
