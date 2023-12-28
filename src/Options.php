<?php

namespace Barklis\Respondus;

class Options
{
    /**
     * @var array<string, string[]>
     */
    private array $hidden = [];

    /**
     * @param  class-string<Respondus>  $respondus
     */
    public function setHidden(string $respondus, string $field): static
    {
        $this->hidden[$respondus][] = $field;

        return $this;
    }

    /**
     * @param  class-string<Respondus>  $respondus
     */
    public function isHidden(string $respondus, string $field): bool
    {
        return in_array($field, $this->getHidden($respondus));
    }

    /**
     * @param  class-string<Respondus>  $respondus
     * @return string[]
     */
    public function getHidden(string $respondus): array
    {
        return $this->hidden[$respondus] ?? [];
    }

    public static function new(): self
    {
        return new self();
    }
}
