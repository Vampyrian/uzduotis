<?php

declare(strict_types=1);

namespace App\Service\Converter;

class StringConverter implements ConverterInterface
{
    public function convert(string $input): string
    {
        preg_match_all('/\d+|[a-zA-Z]/', $input, $matches);

        $tokens = array_map(function (string $token): string {
            if (ctype_alpha($token)) {
                return (string) (ord(strtolower($token)) - ord('a') + 1);
            }

            return $token;
        }, $matches[0]);

        return implode('/', $tokens);
    }
}
