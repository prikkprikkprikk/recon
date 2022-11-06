<?php

declare(strict_types=1);

namespace App\Actions\UserSettings;

use App\Http\Controllers\UserSettingsController;
use App\Models\User;
use App\Interfaces\UserSettingsInterface;

class SaveUserSetting
{
    public static $userSettings;

    public function __construct()
    {
        if (self::$userSettings === null)
        {
            self::$userSettings = app(UserSettingsController::class);
        }
    }

    public static function execute(string $setting, string $value, User $user = null) : void
    {
        app(UserSettingsInterface::class)->save($user, $setting, $value);
    }
}