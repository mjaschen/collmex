<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Client;

use MarcusJaschen\Collmex\Client\Curl;
use PHPUnit\Framework\TestCase;

class CurlTest extends TestCase
{
    /**
     * @test
     */
    public function loginLineWithoutUtf8HasThreeFields(): void
    {
        $client = new Curl('user', 'pass', '1');

        $method = new \ReflectionMethod($client, 'getLoginLine');

        $result = $method->invoke($client);

        self::assertSame("LOGIN;user;pass\n", $result);
    }

    /**
     * @test
     */
    public function loginLineWithUtf8HasFourthFieldSetToOne(): void
    {
        $client = new Curl('user', 'pass', '1', useUtf8: true);

        $method = new \ReflectionMethod($client, 'getLoginLine');

        $result = $method->invoke($client);

        self::assertSame("LOGIN;user;pass;1\n", $result);
    }

    /**
     * @test
     */
    public function convertEncodingDefaultConvertsToWindows1252(): void
    {
        $client = new Curl('user', 'pass', '1');

        $method = new \ReflectionMethod($client, 'convertEncodingForCollmex');

        $input = 'Ä';
        $result = $method->invoke($client, $input);

        self::assertSame(
            mb_convert_encoding('Ä', 'Windows-1252', 'UTF-8'),
            $result
        );
    }

    /**
     * @test
     */
    public function convertEncodingWithUtf8ReturnsInputUnchanged(): void
    {
        $client = new Curl('user', 'pass', '1', useUtf8: true);

        $method = new \ReflectionMethod($client, 'convertEncodingForCollmex');

        $input = 'Kristiāna Ä';
        $result = $method->invoke($client, $input);

        self::assertSame($input, $result);
    }

    /**
     * @test
     */
    public function useUtf8DefaultsToFalse(): void
    {
        $client = new Curl('user', 'pass', '1');

        $method = new \ReflectionMethod($client, 'getLoginLine');

        $result = $method->invoke($client);

        self::assertStringNotContainsString(';1', substr($result, strpos($result, 'pass') + 4));
    }
}
