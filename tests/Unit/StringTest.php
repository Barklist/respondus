<?php

use Elsuterino\Respondus\Options;
use Tests\Fixtures\RespondusFixture;
use Tests\Fixtures\RespondusNestedFixture;

test('serializes to json', function () {
    $respondus = RespondusFixture::make(['id' => 123, 'string' => 'john']);

    expect($respondus->jsonSerialize())->toBe(['id' => 123, 'string' => 'john', 'nested' => ['id' => 123, 'string' => 'john']]);
});

test('hides values', function () {
    $respondus = RespondusFixture::make(['id' => 123, 'string' => 'john'], Options::new()->setHidden(RespondusFixture::class, 'string')->setHidden(RespondusNestedFixture::class, 'id'));

    expect($respondus->jsonSerialize())->toBe(['id' => 123, 'nested' => ['string' => 'john']]);
});
