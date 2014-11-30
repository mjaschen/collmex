<?php

namespace MarcusJaschen\Collmex;

use \Mockery as m;
use \MarcusJaschen\Collmex\Response\CsvResponse;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testIsError()
    {
        $responseBody = 'MESSAGE;E;11111;Error Message;1';

        $parser = m::mock('\MarcusJaschen\Collmex\Csv\ParserInterface');
        $parser
            ->shouldReceive('parse')
            ->once()
            ->andReturn(
                array(
                    array(
                        'MESSAGE',
                        'E',
                        "11111",
                        'Error Message',
                        1,
                    )
                )
            );

        $response = new CsvResponse($parser, $responseBody);

        $this->assertTrue($response->isError());
        $this->assertEquals("Error Message", $response->getErrorMessage());
        $this->assertEquals("11111", $response->getErrorCode());
        $this->assertEquals(1, $response->getErrorLine());

        // check again (but don't parse again)
        $this->assertTrue($response->isError());
    }
}
