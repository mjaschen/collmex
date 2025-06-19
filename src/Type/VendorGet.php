<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * @property string $type_identifier
 * @property int $vendor_id
 * @property int $client_id
 * @property string $text
 * @property int $follow_up
 * @property string $zipcode
 * @property int $changed_only
 * @property string $system_name
 *
 * @see http://www.collmex.de/c.cmx?1005,1,help,441,query=1
 */
class VendorGet extends AbstractType implements TypeInterface
{
    /**
     * Type data template.
     *
     * @var array
     */
    protected $template = [
        'type_identifier' => 'VENDOR_GET',
        'vendor_id' => null,
        'client_id' => null,
        'text' => null,
        'follow_up' => null,
        'zipcode' => null,
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
