<?php
namespace Hidehalo\Nanoid;

class Client
{
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

    public function generate($size)
    {
        $size = $size?: $this->size;
        $id = '';
        // $bytes = $this->core->random($this->generator, $this->alphbet, $size);
        $bytes = $this->generator->random($size);
        for ($i = 1; $i <= $size; $i++) {
            if (isset($bytes[$i]) && isset(CoreInterface::MASKS[$bytes[$i] & 63])) {
                $id .= CoreInterface::MASKS[$bytes[$i] & 63];
            }
        }

        return $id;
    }
}