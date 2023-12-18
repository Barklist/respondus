<?php

namespace Tests\Fixtures;

use Elsuterino\Respondus\Options;
use Elsuterino\Respondus\Respondus;

class RespondusFixture extends Respondus
{
    public int $id;
    public string $string;
    public RespondusNestedFixture $nested;

    public static function make(mixed $data, Options $options = new Options()): static
    {
        $response = new self($options);

        $response->id = $data['id'];
        $response->string = $data['string'];
        $response->nested = RespondusNestedFixture::make($data, $options);

        return $response;
    }
}
