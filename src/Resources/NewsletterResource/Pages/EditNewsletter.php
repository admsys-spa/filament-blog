<?php

namespace Admsys\FilamentBlog\Resources\NewsletterResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Admsys\FilamentBlog\Resources\NewsletterResource;

class EditNewsletter extends EditRecord
{
    protected static string $resource = NewsletterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
