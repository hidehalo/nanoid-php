<?php declare(strict_types=1);
namespace Hidehalo\Nanoid\Test;

use Hidehalo\Nanoid\Core;
use Hidehalo\Nanoid\CoreInterface;
use Hidehalo\Nanoid\Generator;
use Hidehalo\Nanoid\GeneratorInterface;
use PHPUnit\Framework\TestCase;

class CoreTest extends TestCase
{
    /**
     * @group passed
     * @dataProvider coreProvider
     */
    public function testRandom(CoreInterface $core, GeneratorInterface $generator): void
    {
        $alph = 'abcdefghijk0123456789';
        $size = 5;
        $ret = $core->random($generator, $size, $alph);
        $this->assertEquals($size, strlen($ret));
    }

    /**
     * Core Provider
     */
    public static function coreProvider(): array
    {
        return [
            [new Core(), new Generator()]
        ];
    }
}
