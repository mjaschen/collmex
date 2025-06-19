<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 *
 * @property string $type_identifier
 * @property string $client_id
 * @property string $batch_number
 * @property string $product_id
 * @property string $free_text
 * @property string $changed_only
 * @property string $system_name
 */
class BatchGet extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'BATCH_GET',
        'client_id' => null,
        'batch_number' => null,
        'product_id' => null,
        // 5
        'search_description' => null,
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
