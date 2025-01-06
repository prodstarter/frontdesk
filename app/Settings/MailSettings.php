<?php

namespace app\Settings;

use Spatie\LaravelSettings\Settings;

class MailSettings extends Settings
{
    public string $mail_driver;
    public string $mail_from_name;
    public string $mail_from_address;
    public string $mail_host;
    public string $mail_port;
    public string|null $mail_encryption;
    public string|null $mail_username;
    public string|null $mail_password;

    public static function group(): string
    {
        return 'mail';
    }
}