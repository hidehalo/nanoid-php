<?php declare(strict_types=1);
namespace Hidehalo\Nanoid\Test\Support;

use Hidehalo\Nanoid\GeneratorInterface;

class DummyGenerator implements GeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function random(int $size): array
    {
        $ret = [];
        while ($size--) {
            $ret[] = mt_rand(0, 255);
        }

        return $ret;
    }
}
