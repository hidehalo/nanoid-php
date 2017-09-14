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
     * @group passed
     * @dataProvider clientProvider
     * @param Client $client
     */
    public function testCoreRandomAPI(Client $client)
    {
        $size = 10;
        $alphabet = '0123456789abcdefghi';
        $id = $client->format($alphabet, $size);
        $this->assertEquals($size, strlen($id));
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
