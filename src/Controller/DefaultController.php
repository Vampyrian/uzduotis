<?php

declare(strict_types=1);

namespace App\Controller;

use App\Collection\Collection;
use App\Service\Converter\Rot13Converter;
use App\Service\Converter\StringConverter;
use App\Service\Generator\RandomStringArrayGenerator;
use App\Service\Generator\RandomStringGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController
{
    public function __construct()
    {
    }

    #[Route('/', name: 'index')]
    public function index(
        RandomStringArrayGenerator $randomStringArrayGenerator,
        RandomStringGenerator $randomStringGenerator,
        StringConverter $stringConverter,
        Rot13Converter $rot13Converter
    ): Response {
        $randomGeneratorCollection = new Collection();
        $randomGeneratorCollection->add($randomStringGenerator);
        $randomGeneratorCollection->add($randomStringArrayGenerator);

        $randomConverterCollection = new Collection();
        $randomConverterCollection->add($rot13Converter);
        $randomConverterCollection->add($stringConverter);


        $lines = [];
        $lines[] = 'Start';
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

        return new Response(
            '<pre>' . implode("\n", $lines) . '</pre>'
        );
    }
}
