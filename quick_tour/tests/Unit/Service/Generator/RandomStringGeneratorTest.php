<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Generator;

use App\Service\Generator\RandomStringGenerator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RandomStringGeneratorTest extends TestCase
{
    /**
     * @return array<string, array{0: int}>
     */
    public static function lengthProvider(): array
    {
        return [
            'length 1'  => [1],
            'length 6'  => [6],
            'length 12' => [12],
        ];
    }

    #[DataProvider('lengthProvider')]
    public function testGeneratesCorrectLength(int $length): void
    {
        $generator = new RandomStringGenerator($length);

        $this->assertSame($length, strlen($generator->generate()));
    }

    public function testGeneratesOnlyValidCharacters(): void
    {
        $generator = new RandomStringGenerator(100);

        $this->assertMatchesRegularExpression('/^[a-zA-Z0-9]+$/', $generator->generate());
    }
}
