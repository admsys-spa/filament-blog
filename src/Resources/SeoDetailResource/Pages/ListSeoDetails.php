<?php

namespace Admsys\FilamentBlog\Resources\SeoDetailResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Admsys\FilamentBlog\Resources\SeoDetailResource;

class ListSeoDetails extends ListRecords
{
    protected static string $resource = SeoDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
