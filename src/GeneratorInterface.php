<?php declare(strict_types=1);
namespace Hidehalo\Nanoid;

interface GeneratorInterface
{
    /**
     * Return random bytes array
     */
    public function random(int $size): array;
}
