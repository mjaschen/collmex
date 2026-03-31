<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Agreement Get Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property $type_identifier
 * @property $client_id
 * @property $customer_id
 * @property $product_id
 * @property $validity_date
 * @property $inactive
 * @property $changed_only
 * @property $system_name
 */
class CustomerAgreementGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'CUSTOMER_AGREEMENT_GET',
        'client_id' => null,
        'customer_id' => null,
        'product_id' => null,
        'validity_date' => null,
        'inactive' => null,
        'changed_only' => null,
        'system_name' => null,
    ];

    /**
     * Formally validates the type data in $data attribute.
     *
     * @return bool Validation success
     */
    #[\Override]
    public function validate(): bool
    {
        return true;
    }
}
