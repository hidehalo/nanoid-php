<?php
namespace Hidehalo\Nanoid;

class Client
{

    const MODE_NORMAL = 1;
    const MODE_DYNAMIC = 2;

    protected $alphbet = '_~0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected $size = 22;

    /**
     * @var CoreInterface $core
     */
    protected $core;
    /**
     * @var GeneratorInterface $generator
     */
    protected $generator;

    public function __construct()
    {
        $this->core = new Core();
        $this->generator = new Generator();
    }

    public function generate($size, $mode = self::MODE_NORMAL)
    {
        $size = $size?: $this->size;
        switch ($mode) {
            case self::MODE_DYNAMIC:
                return $this->core->random($this->generator, $size);
            default:
                return $this->normalRandom($size);
        }
    }

    public function format(GeneratorInterface $generator, $size, $alphabet = CoreInterface::SAFE_SYMBOLS)
    {
        return $this->core->random($generator, $size, $alphabet);
    }

    protected function normalRandom($size)
    {
        $id = '';
        $bytes = $this->generator->random($size);
        for ($i = 1; $i <= $size; $i++) {
            $bitmask = $bytes[$i] & 63;
            $id .= $this->alphbet[$bitmask];
        }

        return $id;
    }
}