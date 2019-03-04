<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\ProjectStaffGet;
use MarcusJaschen\Collmex\Type\TypeInterface;

class ProjectStaffGetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new ProjectStaffGet([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new ProjectStaffGet([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
