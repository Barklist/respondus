<?php

use Barklis\Respondus\Options;
use Tests\Fixtures\RespondusFixture;
use Tests\Fixtures\RespondusNestedFixture;

test('serializes to json', function () {
    $respondus = (new RespondusFixture)
        ->makeFromArray(['id' => 123, 'string' => 'john']);

    expect($respondus->jsonSerialize())->toBe(['id' => 123, 'string' => 'john', 'nested' => ['id' => 123, 'string' => 'john']]);
});

test('hides values', function () {
    $respondus = (new RespondusFixture())
        ->makeFromArray(['id' => 123, 'string' => 'john'])
        ->setHidden(RespondusFixture::class, 'string')
        ->setHidden(RespondusNestedFixture::class, 'id');

    expect($respondus->jsonSerialize())->toBe(['id' => 123, 'nested' => ['string' => 'john']]);
});
