<?php

namespace Admsys\FilamentBlog\Resources\CommentResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Admsys\FilamentBlog\Resources\CommentResource;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}
