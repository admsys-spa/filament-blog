<?php

use Admsys\FilamentBlog\Exceptions\CannotSendEmail;
use Admsys\FilamentBlog\Listeners\SendBlogPublishedNotification;
use Admsys\FilamentBlog\Mails\BlogPublished;
use Admsys\FilamentBlog\Models\NewsLetter;
use Admsys\FilamentBlog\Models\Post;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    $this->post = Post::factory()->published()->create();
});
it('check event listener is attached to the event', function () {
    // Arrange
    $post = Post::factory()->published()->create();

    // Assert
    Event::fake();
    event(new \Admsys\FilamentBlog\Events\BlogPublished($post));

    Event::assertDispatched(\Admsys\FilamentBlog\Events\BlogPublished::class);

    Event::assertListening(
        \Admsys\FilamentBlog\Events\BlogPublished::class,
        SendBlogPublishedNotification::class
    );

});
it('send new post published email to news letter subscriber', function () {

    //Arrange
    $post = Post::factory()->published()->create();
    NewsLetter::factory()->count(3)->create();
    $subscribers = NewsLetter::all();

    Mail::fake();

    //Assert
    foreach ($subscribers as $subscriber) {
        Mail::send(new BlogPublished($post, $subscriber->email));
        Mail::assertSent(BlogPublished::class);

    }
});

it('includes post details on email template', function () {

    // Arrange
    $post = Post::factory()->published()->create();
    $subscriber = NewsLetter::factory()->create();
    $mail = new BlogPublished($post, $subscriber->email);

    //  Assert
    $mail->assertSeeInHtml('Thank you for subscribing to our blog updates!');
    $mail->assertSeeInHtml($post->title);
    $mail->assertSeeInHtml($post->featurePhoto);
    $mail->assertSeeInHtml('Read More');
    $mail->assertSeeInHtml(route('filamentblog.post.show', $post->slug));

});
it('throws exception if post is not published', function () {
    // Arrange
    $post = Post::factory()->create();
    $subscriber = NewsLetter::factory()->create();
    $mail = new BlogPublished($post, $subscriber->email);

    // Assert
    expect(fn () => $mail->envelope())->toThrow(CannotSendEmail::class);
});
