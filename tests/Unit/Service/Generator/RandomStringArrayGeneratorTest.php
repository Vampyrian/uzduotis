<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Generator;

use App\Service\Generator\RandomStringArrayGenerator;
use App\Service\Generator\RandomStringGenerator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RandomStringArrayGeneratorTest extends TestCase
{
    /**
     * @return array<string, array{0: int}>
     */
    public static function arraySizeProvider(): array
    {
        return [
            'size 1' => [1],
            'size 3' => [3],
            'size 5' => [5],
        ];
    }

    #[DataProvider('arraySizeProvider')]
    public function testGeneratesCorrectArraySize(int $size): void
    {
        $generator = new RandomStringArrayGenerator(new RandomStringGenerator(6), $size);

        $this->assertCount($size, $generator->generate());
    }

    public function testEachElementHasCorrectLength(): void
    {
        $length = 8;
        $generator = new RandomStringArrayGenerator(new RandomStringGenerator($length), 5);

        foreach ($generator->generate() as $string) {
            $this->assertSame($length, strlen($string));
        }
    }

    public function testEachElementContainsOnlyValidCharacters(): void
    {
        $generator = new RandomStringArrayGenerator(new RandomStringGenerator(10), 5);

        foreach ($generator->generate() as $string) {
            $this->assertMatchesRegularExpression('/^[a-zA-Z0-9]+$/', $string);
        }
    }
}
