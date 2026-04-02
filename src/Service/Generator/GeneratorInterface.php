<?php

declare(strict_types=1);

namespace App\Service\Generator;

interface GeneratorInterface
{
    /**
     * @return string|list<string>
     */
    public function generate(): string|array;
}
