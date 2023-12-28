<?php

namespace Tests\Fixtures;

use Barklis\Respondus\Respondus;

class RespondusFixture extends Respondus
{
    public int $id;
    public string $string;
    public RespondusNestedFixture $nested;

    public function makeFromArray(mixed $data): self
    {
        $this->id = $data['id'];
        $this->string = $data['string'];
        $this->nested = (new RespondusNestedFixture($this->options))->makeFromArray($data);

        return $this;
    }
}
