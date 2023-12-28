<?php

namespace Tests\Fixtures;

use Barklis\Respondus\Options;
use Barklis\Respondus\Respondus;

class RespondusNestedFixture extends Respondus
{
    public int $id;
    public string $string;

    public function makeFromArray(mixed $data): self
    {
        $this->id = $data['id'];
        $this->string = $data['string'];

        return $this;
    }
}
