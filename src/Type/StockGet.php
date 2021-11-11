<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex\Type;

/**
 * Collmex StockGet Type.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @author   René Galle <renegalle.webdevelopment@gmail.com>
 *
 * @property $type_identifier
 * @property $client_id
 * @property $product_id
 * @property $product_group
 * @property string $text
 * @property int $type
 * @property int $only_changed
 * @property string $system_name
 * @property string $date_effective
 */
class StockGet extends AbstractType implements TypeInterface
{
    public const TYPE_FREI = 0;
    public const TYPE_GESPERRT = 1;
    public const TYPE_FBA_BESTAND = 2;

    /**
     * @var array
     */
    protected $template = [
        'type_identifier' => 'STOCK_GET',
        'client_id' => null,
        'product_id' => null,
        'product_group' => null,
        'text' => null,
        'type' => null,
        'only_changed' => null,
        'system_name' => null,
        'date_effective' => null,
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
