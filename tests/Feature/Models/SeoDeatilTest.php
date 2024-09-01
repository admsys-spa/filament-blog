<?php

use Admsys\FilamentBlog\Models\Post;
use Admsys\FilamentBlog\Models\SeoDetail;

it('belongs to post', function () {
    // Arrange
    $post = Post::factory()->has(SeoDetail::factory())->create();

    // Act & Assert
    expect($post->seoDetail)->toBeInstanceOf(SeoDetail::class);
});
