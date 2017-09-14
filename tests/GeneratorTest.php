<?php
namespace Hidehalo\Nanoid\Test;

use PHPUnit\Framework\TestCase;
use Hidehalo\Nanoid\Generator;
use Hidehalo\Nanoid\GeneratorInterface;

class GeneratorTest extends TestCase
{

    /**
     * @group passed
     * @dataProvider generatorProvider
     * @param CoreInterface $core
     */
    public function testRandom(GeneratorInterface $generator)
    {
        $size = 5;
        $ret = $generator->random($size);
        $this->assertEquals($size, count($ret));
    }

    /**
     * Generator Provider
     *
     * @return mixed
     */
    public function generatorProvider()
    {
        return [
            [new Generator()]
        ];
    }
}
