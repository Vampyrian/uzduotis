<?php

declare(strict_types=1);

namespace App;

use App\Collection\Collection;
use App\Service\Converter\Rot13Converter;
use App\Service\Converter\StringConverter;
use App\Service\Generator\RandomStringArrayGenerator;
use App\Service\Generator\RandomStringGenerator;

class Application
{
    public function __construct(
        private readonly RandomStringGenerator $stringGenerator,
        private readonly RandomStringArrayGenerator $arrayGenerator,
        private readonly StringConverter $stringConverter,
        private readonly Rot13Converter $rot13Converter
    ) {
    }

    public function run(): void
    {
        $randomGeneratorCollection = new Collection();
        $randomGeneratorCollection->add($this->stringGenerator);
        $randomGeneratorCollection->add($this->arrayGenerator);

        $randomConverterCollection = new Collection();
        $randomConverterCollection->add($this->rot13Converter);
        $randomConverterCollection->add($this->stringConverter);

        $lines = [];

        $lines[] = '-------------';
        $lines[] = 'Start exercise:';
        $lines[] = '-------------';
        $lines[] = '';

        foreach ($randomGeneratorCollection->all() as $index => $generator) {
            $lines[] = ($index + 1) . ') Case';
            $lines[] = '-------------';

            $lines[] = 'Used generator: ' . get_class($generator);
            $item = $generator->generate();

            $randomConverter = $randomConverterCollection->random();
            $lines[] = 'Used converter: ' . get_class($randomConverter);
            $lines[] = '';

            if (is_array($item)) {
                foreach ($item as $value) {
                    $lines[] = $value . ' => ' . $randomConverter->convert($value);
                }
            } else {
                $lines[] = $item . ' => ' . $randomConverter->convert($item);
            }

            $lines[] = '-------------';
            $lines[] = '';
        }

        $lines[] = '---FINISH---';

        echo implode("\n", $lines);
    }
}
