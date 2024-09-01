<?php

namespace Admsys\FilamentBlog\Resources\SettingResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Admsys\FilamentBlog\Resources\SettingResource;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
