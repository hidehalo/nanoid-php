<?php
require __DIR__.'/../vendor/autoload.php';

use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

class DummyGenerator implements GeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function random($size)
    {
        $ret = [];
        while ($size--) {
            $ret[] = mt_rand(0, 255);
        }

        return $ret;
    }
}

$nano = new Client();
$alphabet = '0123456789';
$nanoId = $nano->formatedId($alphabet, 10);
$dummyId = $nano->formatedId($alphabet, 10, new DummyGenerator);

printf("Default nano ID: %s\n", $nanoId);
printf("Formated nano ID: %s\n", $dummyId);
