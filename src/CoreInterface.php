<?php
namespace Hidehalo\Nanoid;

interface CoreInterface 
{
    const SAFE_SYMBOLS = '_~0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const MASKS = [15, 31, 63, 127, 255];

    /**
     * Secure random string generator with custom alphabet.
     *
     * @param GeneratorInterface $generator
     * @param string $alphabet
     * @param integer $size
     */
    public function random(GeneratorInterface $generator, $size, $alphabet);
}