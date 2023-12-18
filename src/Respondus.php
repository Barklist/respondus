<?php

namespace Elsuterino\Respondus;

use JsonSerializable;

abstract class Respondus implements JsonSerializable
{
    public function __construct(private readonly Options $options)
    {
    }

    abstract static function make(mixed $data, Options $options = new Options()): self;

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $options  = $this->options ?? new Options();

        $array = get_object_vars(...)->__invoke($this);

        foreach ($options->getHidden($this::class) as $field) {
            unset($array[$field]);
        }

        return json_decode(json_encode($array) ?: '{}', true);
    }
}
