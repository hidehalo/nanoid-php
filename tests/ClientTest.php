<?php
namespace Hidehalo\Nanoid\Test;

use Hidehalo\Nanoid\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @group testing
     * @dataProvider clientProvider
     * @param Client $client
     */
    public function testGenerate(Client $client)
    {
        $size = 7;
        $ret = $client->generate($size);
        $this->assertEquals($size, strlen($ret));
    }

    /**
     * Client Provider
     *
     * @return mixed
     */
    public function clientProvider()
    {
        return [
            [new Client()]
        ];
    }
}