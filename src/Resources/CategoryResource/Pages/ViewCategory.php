<?php

namespace Admsys\FilamentBlog\Resources\CategoryResource\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Admsys\FilamentBlog\Models\Category;
use Admsys\FilamentBlog\Resources\CategoryResource;

class ViewCategory extends ViewRecord
{
    protected static string $resource = CategoryResource::class;

    public function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->slideOver()
                ->form(Category::getForm()),
        ];
    }
}
