<?php

use App\Models\User;
use App\Actions\UserSettings\LoadUserSetting;

it(
    "can load an arbitrary setting",
    function ()
    {
        // Arrange
        $user = User::factory()->create([
            'settings' => [
                'test_setting' => 'test_value',
            ],
        ]);

        // Act
        $test_setting = LoadUserSetting::execute('test_setting', $user);

        // Assert
        $this->assertIsString($test_setting);
        $this->assertEquals('test_value', $test_setting);
    }
);
