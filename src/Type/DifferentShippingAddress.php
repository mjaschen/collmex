<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Different Shipping Address Type.
 *
 * @author  Marcus Jaschen <mjaschen@gmail.com>
 * @author  René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $customer_id
 * @property $client_id
 * @property $document_type
 * @property $output_medium
 * @property $salutation
 * @property $title
 * @property $firstname
 * @property $lastname
 * @property $firm
 * @property $department
 * @property $street
 * @property $zipcode
 * @property $city
 * @property $country
 * @property $phone
 * @property $phone2
 * @property $fax
 * @property $skype_voip
 * @property $email
 * @property $annotation
 * @property $url
 * @property $no_mailings
 * @property $address_group
 */
class DifferentShippingAddress extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CMXEPF',
        'customer_id' => null,
        'client_id' => null,
        'document_type' => null,
        'output_medium' => null,
        'salutation' => null,
        'title' => null,
        'firstname' => null,
        'lastname' => null,
        'firm' => null,
        'department' => null,
        'street' => null,
        'zipcode' => null,
        'city' => null,
        'country' => null,
        'phone' => null,
        'phone2' => null,
        'fax' => null,
        'skype_voip' => null,
        'email' => null,
        'annotation' => null,
        'url' => null,
        'no_mailings' => null,
        'address_group' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    public function validate(): bool
    {
        return true;
    }
}
