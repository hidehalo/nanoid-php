<?php declare(strict_types=1);
namespace Hidehalo\Nanoid\Test;

use PHPUnit\Framework\TestCase;
use Hidehalo\Nanoid\Generator;
use Hidehalo\Nanoid\GeneratorInterface;

class GeneratorTest extends TestCase
{

    /**
     * @group passed
     * @dataProvider generatorProvider
     */
    public function testRandom(GeneratorInterface $generator): void
    {
        $size = 5;
        $ret = $generator->random($size);
        $this->assertEquals($size, count($ret));
    }

    /**
     * Generator Provider
     */
    public static function generatorProvider(): array
    {
        return [
            [new Generator()]
        ];
    }
}
