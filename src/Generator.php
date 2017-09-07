<?php
namespace Hidehalo\Nanoid;

class Generator implements GeneratorInterface
{
    public function random($size)
    {
        return \random_bytes($size);
    }
}