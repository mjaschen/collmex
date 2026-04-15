<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Tests\Integration;

use Faker\Factory;
use MarcusJaschen\Collmex\Type\Customer;
use MarcusJaschen\Collmex\Type\CustomerGet;
use MarcusJaschen\Collmex\Type\NewObject;

class CustomerTest extends IntegrationTestCase
{
    public function testCreateAndReadCustomer(): void
    {
        $faker = Factory::create('de_DE');

        $firstName = $faker->firstName();
        $lastName = $faker->lastName();
        $street = $faker->streetAddress();
        $zipCode = $faker->postcode();
        $city = $faker->city();
        $email = $faker->email();

        $customer = new Customer([
            'client_id' => 1,
            'firstname' => $firstName,
            'lastname' => $lastName,
            'street' => $street,
            'zipcode' => $zipCode,
            'city' => $city,
            'country' => 'de',
            'email' => $email,
        ]);

        $response = $this->request->send($customer->getCsv());

        $this->assertInstanceOf(\MarcusJaschen\Collmex\Response\CsvResponse::class, $response);
        $this->assertFalse($response->isError(), 'API request failed: ' . $response->getErrorMessage());

        $newObject = $response->getFirstRecord();
        $this->assertInstanceOf(NewObject::class, $newObject);
        /** @var NewObject $newObject */
        $this->assertEquals('NEW_OBJECT_ID', $newObject->type_identifier);

        $customerId = $newObject->new_id;
        $this->assertNotEmpty($customerId);

        $customerGet = new CustomerGet([
            'client_id' => 1,
            'customer_id' => $customerId,
        ]);

        $getResponse = $this->request->send($customerGet->getCsv());
        $this->assertInstanceOf(\MarcusJaschen\Collmex\Response\CsvResponse::class, $getResponse);
        $this->assertFalse($getResponse->isError(), 'API get request failed: ' . $getResponse->getErrorMessage());

        /** @var Customer $retrievedCustomer */
        $retrievedCustomer = $getResponse->getFirstRecord();
        $this->assertInstanceOf(Customer::class, $retrievedCustomer);

        $this->assertEquals($customerId, $retrievedCustomer->customer_id);
        $this->assertEquals($lastName, $retrievedCustomer->lastname);
        $this->assertEquals($firstName, $retrievedCustomer->firstname);
    }
}
