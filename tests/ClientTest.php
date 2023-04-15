<?php declare(strict_types=1);
namespace Hidehalo\Nanoid\Test;

use Hidehalo\Nanoid\Client;
use PHPUnit\Framework\TestCase;
use Hidehalo\Nanoid\Test\Support\DummyGenerator;

class ClientTest extends TestCase
{
    /**
     * @group passed
     * @dataProvider clientProvider
     */
    public function testGenerateId(Client $client): void
    {
        $size = 7;
        $normalRandom = $client->generateId($size);
        $this->assertEquals($size, strlen($normalRandom));
        $this->assertNotEquals(str_repeat('_', $size), $normalRandom);
        $dynamicRandom = $client->generateId($size, Client::MODE_DYNAMIC);
        $this->assertEquals($size, strlen($dynamicRandom));
        $this->assertNotEquals($normalRandom, $dynamicRandom);
        $defaultRandom = $client->generateId();
        $this->assertEquals(21, strlen($defaultRandom));
        $this->assertNotEquals(str_repeat('_', 21), $defaultRandom);
    }

    /**
     * @group passed
     * @dataProvider clientProvider
     */
    public function testFormattedId(Client $client): void
    {
        $size = 10;
        $alphabet = '0123456789abcdefghi';
        $id = $client->formattedId($alphabet, $size);
        $this->assertEquals($size, strlen($id));
        $dummyId = $client->formattedId($alphabet, $size, new DummyGenerator);
        $this->assertEquals($size, strlen($dummyId));
        $this->assertNotEquals($id, $dummyId);
        $defaultSizeId = $client->formattedId($alphabet);
        $this->assertEquals(21, strlen($defaultSizeId));
    }

    /**
     * @group passed
     * @dataProvider clientProvider
     */
    public function testFormatedId(Client $client): void
    {
        $size = 10;
        $alphabet = '0123456789abcdefghi';
        $id = $client->formatedId($alphabet, $size);
        $this->assertEquals($size, strlen($id));
        $dummyId = $client->formatedId($alphabet, $size, new DummyGenerator);
        $this->assertEquals($size, strlen($dummyId));
        $this->assertNotEquals($id, $dummyId);
        $defaultSizeId = $client->formatedId($alphabet);
        $this->assertEquals(21, strlen($defaultSizeId));
    }

    /**
     * Client Provider
     */
    public static function clientProvider(): array
    {
        return [
            [new Client()]
        ];
    }
}
