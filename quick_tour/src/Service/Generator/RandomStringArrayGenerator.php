<?php

declare(strict_types=1);

namespace App\Service\Generator;

class RandomStringArrayGenerator implements GeneratorInterface
{
    public function __construct(
        private RandomStringGenerator $stringGenerator,
        private int $arraySize,
    ) {
    }

    /**
     * @return list<string>
     */
    public function generate(): array
    {
        $result = [];

        for ($i = 0; $i < $this->arraySize; $i++) {
            $result[] = $this->stringGenerator->generate();
        }

        return $result;
    }
}
