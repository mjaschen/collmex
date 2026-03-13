<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Unit\Type;

use MarcusJaschen\Collmex\Type\AbstractType;
use MarcusJaschen\Collmex\Type\Login;
use MarcusJaschen\Collmex\Type\TypeInterface;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    /**
     * @test
     */
    public function isAbstractType(): void
    {
        $subject = new Login([]);

        self::assertInstanceOf(AbstractType::class, $subject);
    }

    /**
     * @test
     */
    public function implementsTypeInterface(): void
    {
        $subject = new Login([]);

        self::assertInstanceOf(TypeInterface::class, $subject);
    }

    /**
     * @test
     */
    public function getCsvWithoutUtf8OmitsTrailingField(): void
    {
        $subject = new Login([
            'user' => 'testuser',
            'password' => 'testpass',
        ]);

        self::assertSame("LOGIN;testuser;testpass\n", $subject->getCsv());
    }

    /**
     * @test
     */
    public function getCsvWithoutUtf8DoesNotTrimEmptyPassword(): void
    {
        $subject = new Login([
            'user' => 'testuser',
            'password' => '',
        ]);

        self::assertSame("LOGIN;testuser;\n", $subject->getCsv());
    }

    /**
     * @test
     */
    public function getCsvWithUtf8IncludesFourthField(): void
    {
        $subject = new Login([
            'user' => 'testuser',
            'password' => 'testpass',
            'utf8' => '1',
        ]);

        self::assertSame("LOGIN;testuser;testpass;1\n", $subject->getCsv());
    }
}
