<?php

namespace Admsys\FilamentBlog\Resources\TagResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Admsys\FilamentBlog\Resources\TagResource;

class ListTags extends ListRecords
{
    protected static string $resource = TagResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
