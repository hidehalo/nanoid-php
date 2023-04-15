<?php declare(strict_types=1);
namespace Hidehalo\Nanoid;

class Generator implements GeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function random(int $size): array
    {
        return unpack('C*', \random_bytes($size));
    }
}
