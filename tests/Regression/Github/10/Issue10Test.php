<?php

use MarcusJaschen\Collmex\Csv\SimpleGenerator;

class Issue10Test extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }

    public function tearDown()
    {
    }

    /**
     * Tests if specifying an invalid field name throws an `InvalidFieldNameException`.
     *
     * @see https://github.com/mjaschen/collmex/issues/10
     *
     * @expectedException \MarcusJaschen\Collmex\Type\Exception\InvalidFieldNameException
     */
    public function testIfInvalidFieldNamesThrowException()
    {
        $customerGet = new \MarcusJaschen\Collmex\Type\CustomerGet(
            array(
                'customer_id' => '12345',
                'foo'         => 'bar',
            )
        );
    }
}
