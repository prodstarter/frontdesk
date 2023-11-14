<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string|null $site_logo;

    public static function group(): string
    {
        return 'general';
    }

}
