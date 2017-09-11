<?php
namespace Hidehalo\Nanoid\Test;

use Hidehalo\Nanoid\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @group passed
     * @dataProvider clientProvider
     * @param Client $client
     */
    public function testDynamicAndNormalGenerate(Client $client)
    {
        $size = 7;
        $normalRandom = $client->generate($size);
        $dynamicRandom = $client->generate($size, Client::MODE_DYNAMIC);
        $this->assertEquals($size, strlen($normalRandom));
        $this->assertEquals($size, strlen($dynamicRandom));
        $this->assertNotEquals($normalRandom, $dynamicRandom);
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