<?php

namespace Admsys\FilamentBlog\Resources\CommentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Admsys\FilamentBlog\Resources\CommentResource;

class ListComments extends ListRecords
{
    protected static string $resource = CommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
