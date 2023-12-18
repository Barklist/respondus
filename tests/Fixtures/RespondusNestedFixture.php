<?php

namespace Tests\Fixtures;

use Elsuterino\Respondus\Options;
use Elsuterino\Respondus\Respondus;

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
