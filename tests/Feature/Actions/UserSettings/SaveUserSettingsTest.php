<?php

use App\Models\User;
use App\Actions\UserSettings\SaveUserSetting;

it(
    "can save an arbitrary setting",
    function ()
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        SaveUserSetting::execute('test_setting', 'test_value', $user);

        // Assert
        $this->assertIsArray($user->settings);
        $this->assertEquals('test_value', $user->settings['test_setting']);
    }
);
