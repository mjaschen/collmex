<?php
/**
 * Type Factory for Collmex Response Data
 *
 * @author    Marcus Jaschen <mail@marcusjaschen.de>
 * @license   http://www.opensource.org/licenses/mit-license MIT License
 * @link      https://github.com/mjaschen/collmex
 */

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException;

/**
 * Type Factory for Collmex Response Data
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 * @license  http://www.opensource.org/licenses/mit-license MIT License
 * @link     https://github.com/mjaschen/collmex
 */
class TypeFactory
{
    /**
     * Mapping of Collmex type identifiers to Type classes
     *
     * @var array
     */
    protected $typeMap = [
        'LOGIN'           => 'Login',
        'MESSAGE'         => 'Message',
        'NEW_OBJECT_ID'   => 'NewObject',
        'ACCBAL'          => 'AccountBalance',
        'CMXABO'          => 'Subscription',
        'CMXINV'          => 'Invoice',
        'CMXMGD'          => 'Member',
        'CMXKND'          => 'Customer',
        'CMXORD-2'        => 'CustomerOrder',
        'CMXUMS'          => 'Revenue',
        'CMXPRD'          => 'Product',
        'CMXPRI'          => 'ProductPrice',
        'STOCK_AVAILABLE' => 'StockAvailable',
        'CMXSTK'          => 'Stock',
        'CMXDLV'          => 'Delivery',
        'TRACKING_NUMBER' => 'TrackingNumber',
        'CMXPOD'          => 'PurchaseOrder',
    ];

    /**
     * Builds the type object for the given data.
     *
     * @param array $data
     *
     * @throws InvalidTypeIdentifierException
     *
     * @return Type\AbstractType
     */
    public function getType($data)
    {
        if (! array_key_exists($data[0], $this->typeMap)) {
            throw new InvalidTypeIdentifierException("Invalid Type Identifier: {$data[0]}");
        }

        $className = $this->typeMap[$data[0]];
        $class     = "\\MarcusJaschen\\Collmex\\Type\\{$className}";

        return new $class($data);
    }
}
