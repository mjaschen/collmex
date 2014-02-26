<?php

namespace MarcusJaschen\Collmex;

class TypeFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \MarcusJaschen\Collmex\TypeFactory
     */
    protected $typeFactory;

    public function setUp()
    {
        $this->typeFactory = new TypeFactory();
    }

    public function tearDown()
    {
        unset($this->typeFactory);
    }

    public function testCreateCustomerTypeSuccessful()
    {
        $data = array(
            'CMXKND',
            "12345",
            "1",
            "Herr",
            "Marcus",
            "Jaschen",
        );

        $type = $this->typeFactory->getType($data);

        $this->assertInstanceOf("\\MarcusJaschen\\Collmex\\Type\\Customer", $type);
    }


    public function testCreateSubscriptionTypeSuccessful()
    {
        $data = array(
            'CMXABO',
            "12345",
            "1",
            "20131001",
            "20141031",
            "PRODUCT_1",
            "Product Description",
            null,
            7,
            "20131101",
        );

        $type = $this->typeFactory->getType($data);

        $this->assertInstanceOf("\\MarcusJaschen\\Collmex\\Type\\Subscription", $type);
    }

    /**
     * @expectedException \MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException
     */
    public function testInvalidType()
    {
        $data = array(
            'INVALID_TYPE',
            'data',
            'foo',
            'bar',
        );

        $this->typeFactory->getType($data);
    }
}