<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Converter;

use App\Service\Converter\StringConverter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class StringConverterTest extends TestCase
{
    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function convertProvider(): array
    {
        return [
            'lowercase letter'        => ['a', '1'],
            'uppercase letter'        => ['A', '1'],
            'last letter'             => ['z', '26'],
            'digit group'             => ['22', '22'],
            'large digit group'       => ['100', '100'],
            'mixed input'             => ['22aAcd', '22/1/1/3/4'],
            'empty string'            => ['', ''],
        ];
    }

    #[DataProvider('convertProvider')]
    public function testConvert(string $input, string $expected): void
    {
        $converter = new StringConverter();
        $this->assertSame($expected, $converter->convert($input));
    }
}
