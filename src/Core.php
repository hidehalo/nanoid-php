<?php
namespace Hidehalo\Nanoid;

class Core implements CoreInterface
{
    /**
     * @inheritDoc
     * @see https://github.com/ai/nanoid/blob/master/async/index.browser.js#L4
     */
    public function random(GeneratorInterface $generator, $size, $alphabet = CoreInterface::SAFE_SYMBOLS)
    {
        $len = strlen($alphabet);
        $mask = (2 << log($len - 1) / M_LN2) - 1;
        $step = (int) ceil(1.6 * $mask * $size / $len);
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
