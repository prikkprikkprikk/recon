<?php

declare(strict_types=1);

namespace App\Actions\UserSettings;

use App\Models\User;
use App\Interfaces\UserSettingsInterface;

class LoadUserSetting
{
    public static function execute(User $user = null, string $setting) : ?string
    {
        $user = $user ?? auth()->user();
        $usc = app(UserSettingsInterface::class);
        return $usc->load($user, $setting);
    }
}