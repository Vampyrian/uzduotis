<?php

declare(strict_types=1);

namespace App\Service\Converter;

interface ConverterInterface
{
    public function convert(string $input): string;
}
