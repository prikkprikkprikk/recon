<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSettingsController
{
    public function save(User $user = null, string $setting, string $value)
    {
        if($setting == '') {
            return response()->json([
                'message' => 'Setting cannot be empty',
            ], 400);
        }

        $user = $user ?? auth()->user();

        $settings = $user->settings ?? [];

        $settings[$setting] = $value;

        $user->update([
            'settings' => $settings,
        ]);

        return response()->json([
            'status' => 'success',
        ], 200);
    }

    public function load(User $user = null, string $setting) : ?string
    {
        if($setting == '') {
            return response()->json([
                'message' => 'Setting cannot be empty',
            ], 400);
        }

        $user = $user ?? auth()->user();

        return $user->settings[$setting] ?? null;
    }
}
