<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Integration;

use MarcusJaschen\Collmex\Client\Curl;
use MarcusJaschen\Collmex\Request;
use PHPUnit\Framework\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    protected Request $request;

    protected function setUp(): void
    {
        parent::setUp();

        $user = $this->getRequiredEnvironmentValue('COLLMEX_USER');
        $password = $this->getRequiredEnvironmentValue('COLLMEX_PASSWORD');
        $customer = $this->getRequiredEnvironmentValue('COLLMEX_CUSTOMER');

        $this->request = new Request(new Curl($user, $password, $customer));
    }

    protected function getEnvironmentValue(string $name): ?string
    {
        $value = $_ENV[$name] ?? $_SERVER[$name] ?? getenv($name);

        return is_string($value) && $value !== '' ? $value : null;
    }

    private function getRequiredEnvironmentValue(string $name): string
    {
        $value = $this->getEnvironmentValue($name);

        if ($value === null) {
            $this->markTestSkipped(sprintf('Required integration environment variable "%s" is not available', $name));
        }

        return $value;
    }
}
