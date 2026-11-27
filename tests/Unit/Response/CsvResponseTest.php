<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Response;

use MarcusJaschen\Collmex\Csv\Parser;
use MarcusJaschen\Collmex\Response\CsvResponse;
use PHPUnit\Framework\TestCase;

class CsvResponseTest extends TestCase
{
    /**
     * @test
     */
    public function isErrorWhenErrorWorksAsExpected(): void
    {
        $responseBody = 'MESSAGE;E;11111;Error Message;1';

        $parser = $this->createMock(Parser::class);
        $parser
            ->expects(self::once())
            ->method('parse')
            ->willReturn(
                [
                    [
                        'MESSAGE',
                        'E',
                        '11111',
                        'Error Message',
                        '1',
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

        $parser = $this->createMock(Parser::class);
        $parser
            ->expects(self::once())
            ->method('parse')
            ->willReturn(
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
