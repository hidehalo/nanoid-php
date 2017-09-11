<?php
namespace Hidehalo\Nanoid;

class Core implements CoreInterface
{
    public function random(GeneratorInterface $generator, $size, $alphabet = CoreInterface::SAFE_SYMBOLS)
    {
        $filter = function ($e) use ($alphabet) {
            return $e >= strlen($alphabet) - 1;
        };
        $masks = array_filter(CoreInterface::MASKS, $filter)?:[0];
        $mask = array_shift($masks);
        $step = (int) ceil(1.6 * $mask * $size / strlen($alphabet));
        $id = '';
        while (true) {
            $bytes = $generator->random($step);
            for ($i = 1; $i <= $step; $i++) {
                $byte = $bytes[$i] & $mask;
                if (isset($alphabet[$byte])) {
                    $id .= $alphabet[$byte];
                    if (strlen($id) === $size) {
                        
                        return $id;
                    }
                }
            }
        }
    }
}