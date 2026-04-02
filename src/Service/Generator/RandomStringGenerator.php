<?php

declare(strict_types=1);

namespace App\Service\Generator;

class RandomStringGenerator implements GeneratorInterface
{
    /**
     * @var list<string>
     */
    private array $characters;

    public function __construct(private int $length)
    {
        $this->characters = array_merge(
            range('a', 'z'),
            range('A', 'Z'),
            array_map('strval', range(0, 9))
        );
    }

    public function generate(): string
    {
        $max = count($this->characters) - 1;
        $result = '';

        for ($i = 0; $i < $this->length; $i++) {
            $result .= $this->characters[random_int(0, $max)];
        }

        return $result;
    }
}
