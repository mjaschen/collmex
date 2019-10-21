<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Response;

use MarcusJaschen\Collmex\Csv\ParserInterface;
use MarcusJaschen\Collmex\Response\CsvResponse;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class CsvResponseTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }

    /**
     * @test
     */
    public function isErrorWhenErrorWorksAsExpected(): void
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

        self::assertTrue($response->isError());
        self::assertSame('Error Message', $response->getErrorMessage());
        self::assertSame('11111', $response->getErrorCode());
        self::assertSame(1, $response->getErrorLine());

        // check again (but don't parse again)
        self::assertTrue($response->isError());
    }

    /**
     * @test
     */
    public function isErrorWhenNoErrorWorksAsExpected(): void
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

        self::assertFalse($response->isError());
        self::assertNull($response->getErrorMessage());
        self::assertNull($response->getErrorCode());
    }
}
