<?php
namespace Hidehalo\Nanoid;

class Core implements CoreInterface
{
    public function random(GeneratorInterface $generator, $alphbet, $size)
    {
        $filter = function ($e) use ($alphabet) {
            return $e >= strlen($alphabet) - 1;
        };
        list ($mask) = array_filter(CoreInterface::MASKS, $filter) ?: 0;
        $step = ceil(1.6 * $mask * $size / strlen($alphabet));
        $id = '';
        while (true) {
            $bytes = $generator->random($step);
            for ($i = 0; $i < $step; $i++) {
                $byte = $bytes[i] & $mask;
                if ($alphabet[$byte]) {
                    $id += $alphabet[$byte];
                    if (strlen($id) === $size) {
                        return $id;
                    }
                }
            }
        }
    }
}