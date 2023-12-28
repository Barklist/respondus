<?php

namespace Barklis\Respondus;

use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

/**
 * @implements Arrayable<int|string, mixed>
 */
abstract class Respondus implements JsonSerializable, Arrayable
{
    public function __construct(protected Options $options = new Options())
    {
    }

    /**
     * @param  class-string<Respondus>  $respondus
     */
    public function setHidden(string $respondus, string $field): static
    {
        $this->options->setHidden($respondus, $field);

        return $this;
    }

    /**
     * @return array<string|int, mixed>
     */
    public function jsonSerialize(): array
    {
        $array = get_object_vars(...)->__invoke($this);

        foreach ($this->options->getHidden($this::class) as $field) {
            unset($array[$field]);
        }

        return json_decode(json_encode($array) ?: '{}', true);
    }

    /**
     * @return array<int|string, mixed>
     */
    public function toArray(): array
    {
        return $this->jsonSerialize();
    }
}
