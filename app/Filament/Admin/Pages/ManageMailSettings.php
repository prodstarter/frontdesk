<?php

namespace App\Filament\Admin\Pages;

use Filament\Forms;
use App\Models\User;
use App\Settings\MailSettings;
use Filament\Forms\Components\Card;
use Filament\Pages\Actions\Action;
use Filament\Pages\SettingsPage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Support\Htmlable;

class ManageMailSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static string $settings = MailSettings::class;

    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'settings/mail';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'Mail Settings';

    protected ?string $heading = 'Manage mail settings';

    protected static ?string $title = 'Mail Settings';

    protected function getFormSchema(): array
    {

        return [
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Select::make('mail_driver')
                        ->label(__('Mail Driver'))
                        ->required()
                        ->options([
                            'smtp' => 'SMTP'
                        ])
                        ->default('smtp'),
                    Forms\Components\TextInput::make('mail_from_name')
                        ->label(__('Mail From Name'))
                        ->placeholder(__('Name to use in the email from field'))
                        ->required(),
                    Forms\Components\TextInput::make('mail_from_address')
                        ->label(__('Mail From Address'))
                        ->placeholder(__('The email address to send email from'))
                        ->required(),
                    Forms\Components\TextInput::make('mail_host')
                        ->label(__('Mail Host'))
                        ->default(fn() => config('mail.mailers.smtp.host'))
                        ->required(),
                    Forms\Components\TextInput::make('mail_port')
                        ->label(__('Mail Port'))
                        ->default(fn() => config('mail.mailers.smtp.port'))
                        ->required(),
                    Forms\Components\Select::make('mail_encryption')
                        ->label(__('Mail Encryption'))
                        ->options([
                            'tls' => 'TLS',
                            'ssl' => 'SSL'
                        ]),
                    Forms\Components\TextInput::make('mail_username')
                        ->label(__('Mail Username')),
                    Forms\Components\TextInput::make('mail_password')
                        ->label(__('Mail Password')),
                ])->columns(2),
        ];
    }

    protected function afterSave(): void
    {
        $data = $this->form->getState();

        $this->putPermanentEnv('MAIL_MAILER', $data['mail_driver']);
        $this->putPermanentEnv('MAIL_HOST', $data['mail_host']);
        $this->putPermanentEnv('MAIL_PORT', $data['mail_port']);
        $this->putPermanentEnv('MAIL_USERNAME', $data['mail_username'] ?? null);
        $this->putPermanentEnv('MAIL_PASSWORD', $data['mail_password'] ?? null);
        $this->putPermanentEnv('MAIL_ENCRYPTION', $data['mail_encryption'] ?? null);
        $this->putPermanentEnv('MAIL_FROM_ADDRESS', $data['mail_from_address']);
        $this->putPermanentEnv('MAIL_FROM_NAME', $data['mail_from_name']);

        Artisan::call('config:clear');

    }

    public function putPermanentEnv($key, $value): void
    {
        $path = app()->environmentFilePath();

        $oldValue = env($key);
        $oldValue = preg_match('/\s/', $oldValue) ? "\"{$oldValue}\""
            : $oldValue;
        $escaped = preg_quote('='.$oldValue, '/');
        $value = preg_match('/\s/', $value) ? "\"{$value}\"" : $value;

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}
