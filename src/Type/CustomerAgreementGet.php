<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex Customer Agreement Get Type.
 *
 * @see https://www.collmex.de/c.cmx?1005,1,help,api_Kundenvereinbarungen
 *
 * @property string $type_identifier
 * @property numeric $client_id
 * @property numeric $customer_id
 * @property string $product_id
 * @property string|int $validity_date
 * @property numeric $inactive
 * @property numeric $changed_only
 * @property string $system_name
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
