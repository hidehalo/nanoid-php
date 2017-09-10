<?php
namespace Hidehalo\Nanoid;

class Generator implements GeneratorInterface
{
    public function random($size)
    {
        return unpack('C*', \random_bytes($size));
    }
}