<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex StockAvailable Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $product_id
 * @property $client_id
 * @property $stock
 * @property $unit
 * @property $reorder_time
 */
class StockAvailable extends AbstractType implements TypeInterface
{
    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'STOCK_AVAILABLE',
        'product_id' => null,
        'client_id' => null,
        'stock' => null,
        'unit' => null,
        'reorder_time' => null,
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
