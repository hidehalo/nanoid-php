<?php
namespace Hidehalo\Nanoid\Test\Support;

use Hidehalo\Nanoid\GeneratorInterface;

class DummyGenerator implements GeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function random($size)
    {
        $ret = [];
        while ($size--) {
            $ret[] = mt_rand(0, 255);
        }

        return $ret;
    }
}
