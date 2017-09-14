<?php
namespace Hidehalo\Nanoid;

class Client
{
    /**
     * Random mode flags
     *
     * @const MODE_NORMAL 1
     * @const MODEL_DYNAMIC 2
     */
    const MODE_NORMAL = 1;
    const MODE_DYNAMIC = 2;
    /**
     * @param string $alphabet Symbols to be used in ID.
     * @param integer $size number of symbols in ID.
     */
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

    /**
     * Constructor of Client
     *
     * @param GeneratorInterface $generator
     * @param integer $size
     */
    public function __construct(GeneratorInterface $generator = null, $size = 22)
    {
        $this->core = new Core();
        $this->generator = $generator?:new Generator();
        $this->size = $size > 0 ? $size : 22;
    }

    /**
     * Generate nanoid via optional modes
     *
     * @param integer $size
     * @param integer $mode Client::MODE_NORMAL|Client::MODE_DYNAMIC
     * @return string
     */
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

    /**
     * The original API of nanoid. Use it be careful, Please make sure
     * you have been implements your custom GeneratorInterface as correctly.
     * Otherwise use the build-in default random bytes generator
     *
     * @see https://github.com/ai/nanoid/blob/master/format.js
     * @see https://github.com/ai/nanoid/blob/master/generate.js
     * @param GeneratorInterface $generator
     * @param integer $size
     * @param string $alphabet default CoreInterface::SAFE_SYMBOLS
     */
    public function format($alphabet, $size, GeneratorInterface $generator = null)
    {
        $generator = $generator?:$this->generator;
        $alphabet = $alphabet?:CoreInterface::SAFE_SYMBOLS;

        return $this->core->random($generator, $size, $alphabet);
    }

    /**
     * Generate secure URL-friendly unique ID.
     * By default, ID will have 22 symbols to have same collisions probability
     * as UUID v4.
     *
     * @see https://github.com/ai/nanoid/blob/master/index.js
     */
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
