<?php

namespace MarcusJaschen\Collmex\Tests;

use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Response\CsvResponse;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testIsErrorWhenErrorWorksAsExpected()
    {
        $responseBody = 'MESSAGE;E;11111;Error Message;1';

        $parser = m::mock(ParserInterface::class);
        $parser
            ->shouldReceive('parse')
            ->once()
            ->andReturn(
                [
                    [
                        'MESSAGE',
                        'E',
                        "11111",
                        'Error Message',
                        1,
                    ],
                ]
            );

        $response = new CsvResponse($parser, $responseBody);

        $this->assertTrue($response->isError());
        $this->assertEquals("Error Message", $response->getErrorMessage());
        $this->assertEquals("11111", $response->getErrorCode());
        $this->assertEquals(1, $response->getErrorLine());

        // check again (but don't parse again)
        $this->assertTrue($response->isError());
    }

    public function testIsErrorWhenNoErrorWorksAsExpected()
    {
        $responseBody = 'MESSAGE;S;204020;Datenübertragung erfolgreich. Es wurden 1 Datensätze verarbeitet.';

        $parser = m::mock(ParserInterface::class);
        $parser
            ->shouldReceive('parse')
            ->once()
            ->andReturn(
                [
                    [
                        'MESSAGE',
                        'S',
                        '204020',
                        'Datenübertragung erfolgreich. Es wurden 1 Datensätze verarbeitet.',
                    ],
                ]
            );

        $response = new CsvResponse($parser, $responseBody);

        $this->assertFalse($response->isError());
        $this->assertNull($response->getErrorMessage());
        $this->assertNull($response->getErrorCode());
    }
}
