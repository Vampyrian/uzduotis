<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Converter;

use App\Service\Converter\Rot13Converter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class Rot13ConverterTest extends TestCase
{
    /**
     * @return array<string, array{0: string, 1: string}>
     */
    public static function convertProvider(): array
    {
        return [
            'lowercase letters' => ['hello', 'uryyb'],
            'uppercase letters' => ['HELLO', 'URYYB'],
            'mixed case'        => ['Hello', 'Uryyb'],
            'digits unchanged'  => ['abc123', 'nop123'],
            'empty string'      => ['', ''],
        ];
    }

    #[DataProvider('convertProvider')]
    public function testConvert(string $input, string $expected): void
    {
        $converter = new Rot13Converter();
        $this->assertSame($expected, $converter->convert($input));
    }
}
