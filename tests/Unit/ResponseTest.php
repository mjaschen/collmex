<?php

namespace MarcusJaschen\Collmex\Tests\Unit;

use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Response\CsvResponse;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    protected function tearDown()
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
                        '11111',
                        'Error Message',
                        1,
                    ],
                ]
            );

        $response = new CsvResponse($parser, $responseBody);

        $this->assertTrue($response->isError());
        $this->assertSame('Error Message', $response->getErrorMessage());
        $this->assertSame('11111', $response->getErrorCode());
        $this->assertSame(1, $response->getErrorLine());

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
