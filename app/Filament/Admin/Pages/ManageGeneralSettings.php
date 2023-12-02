<?php

namespace App\Filament\Admin\Pages;

use Filament\Forms;
use App\Models\User;
use Filament\Pages\SettingsPage;
use App\Settings\GeneralSettings;
use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Support\Htmlable;
use Tapp\FilamentTimezoneField\Forms\Components\TimezoneSelect;

class ManageGeneralSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $slug = 'settings/general';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'General';

    protected ?string $heading = 'Manage general settings';

    protected static ?string $title = 'General Settings';

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Grid::make(3)
                        ->schema([
                            Forms\Components\FileUpload::make('site_logo')
                                ->label(__('Site logo'))
                                ->helperText(__('This is the platform logo (e.g. Used in site favicon)'))
                                ->image()
                                ->columnSpan(1)
                                ->maxSize(config('system.max_file_size')),

                            Forms\Components\Grid::make(1)
                                ->columnSpan(2)
                                ->schema([
                                    Forms\Components\TextInput::make('site_name')
                                        ->label(__('Site name'))
                                        ->helperText(__('This is the platform name'))
                                        ->default(fn() => config('app.name'))
                                        ->required(),

                                    TimezoneSelect::make('timezone')
                                        ->label(__('Timezone'))
                                        ->searchable()
                                        ->required(),
                                ]),
                    ]),
            ]),
        ];
    }

    protected function afterSave(): void
    {
        $data = $this->form->getState();

        $this->putPermanentEnv('APP_NAME', $data['site_name']);

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
