<?php
namespace Hidehalo\Nanoid;

/**
 * @see https://github.com/ai/nanoid/blob/master/random.js
 */
interface GeneratorInterface
{
   /**
    * Return random bytes array
    *
    * @see https://github.com/ai/nanoid/blob/master/random.js
    * @param integer $size
    * @return array
    */
    public function random($size);
}
