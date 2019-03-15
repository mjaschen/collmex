<?php

namespace MarcusJaschen\Collmex\Tests\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\ProjectStaff;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class ProjectStaffTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType()
    {
        $subject = new ProjectStaff([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface()
    {
        $subject = new ProjectStaff([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }
}
