<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mail.mail_driver', config('mail.default'));
        $this->migrator->add('mail.mail_from_name', config('mail.from.name'));
        $this->migrator->add('mail.mail_from_address', config('mail.from.address'));
        $this->migrator->add('mail.mail_host', config('mail.mailers.smtp.host'));
        $this->migrator->add('mail.mail_port', config('mail.mailers.smtp.port'));
        $this->migrator->add('mail.mail_encryption', config('mail.mailers.smtp.encryption'));
        $this->migrator->add('mail.mail_username', config('mail.mailers.smtp.username'));
        $this->migrator->add('mail.mail_password', config('mail.mailers.smtp.password'));
    }
};
