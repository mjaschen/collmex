<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\CustomerGet;

class CustomerGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @see https://github.com/mjaschen/collmex/issues/10
     *
     * @expectedException \MarcusJaschen\Collmex\Type\Exception\InvalidFieldNameException
     */
    public function invalidFieldNamesThrowException()
    {
        new CustomerGet(
            [
                'customer_id' => '12345',
                'foo' => 'bar',
            ]
        );
    }
}
