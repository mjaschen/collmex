<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException;
use MarcusJaschen\Collmex\Type\AccountBalance;
use MarcusJaschen\Collmex\Type\AccountDocument;
use MarcusJaschen\Collmex\Type\Address;
use MarcusJaschen\Collmex\Type\BillOfMaterial;
use MarcusJaschen\Collmex\Type\Customer;
use MarcusJaschen\Collmex\Type\CustomerOrder;
use MarcusJaschen\Collmex\Type\Delivery;
use MarcusJaschen\Collmex\Type\Invoice;
use MarcusJaschen\Collmex\Type\Login;
use MarcusJaschen\Collmex\Type\Member;
use MarcusJaschen\Collmex\Type\Message;
use MarcusJaschen\Collmex\Type\NewObject;
use MarcusJaschen\Collmex\Type\OpenItem;
use MarcusJaschen\Collmex\Type\PriceGroup;
use MarcusJaschen\Collmex\Type\Product;
use MarcusJaschen\Collmex\Type\ProductGroup;
use MarcusJaschen\Collmex\Type\ProductionOrder;
use MarcusJaschen\Collmex\Type\ProductPrice;
use MarcusJaschen\Collmex\Type\ProjectStaff;
use MarcusJaschen\Collmex\Type\PurchaseOrder;
use MarcusJaschen\Collmex\Type\Revenue;
use MarcusJaschen\Collmex\Type\Stock;
use MarcusJaschen\Collmex\Type\StockAvailable;
use MarcusJaschen\Collmex\Type\StockChange;
use MarcusJaschen\Collmex\Type\Subscription;
use MarcusJaschen\Collmex\Type\TrackingNumber;
use MarcusJaschen\Collmex\Type\Voucher;

/**
 * Type Factory for Collmex Response Data.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class TypeFactory
{
    private const RECORD_TYPE_CLASS_MAP = [
        'LOGIN' => Login::class,
        'MESSAGE' => Message::class,
        'NEW_OBJECT_ID' => NewObject::class,
        'ACC_BAL' => AccountBalance::class,
        'ACCDOC' => AccountDocument::class,
        'CMXABO' => Subscription::class,
        'CMXBOM' => BillOfMaterial::class,
        'CMXINV' => Invoice::class,
        'CMXMGD' => Member::class,
        'CMXADR' => Address::class,
        'CMXKND' => Customer::class,
        'CMXORD-2' => CustomerOrder::class,
        'CMXUMS' => Revenue::class,
        'CMXPRD' => Product::class,
        'CMXPRI' => ProductPrice::class,
        'PRDGRP' => ProductGroup::class,
        'PROJECT_STAFF' => ProjectStaff::class,
        'STOCK_AVAILABLE' => StockAvailable::class,
        'CMXSTK' => Stock::class,
        'CMXDLV' => Delivery::class,
        'TRACKING_NUMBER' => TrackingNumber::class,
        'CMXPOD' => PurchaseOrder::class,
        'OPEN_ITEM' => OpenItem::class,
        'PRICE_GROUP' => PriceGroup::class,
        'STOCK_CHANGE' => StockChange::class,
        'PRODUCTION_ORDER' => ProductionOrder::class,
        'VOUCHER' => Voucher::class,
    ];

    /**
     * Builds the type object for the given data.
     *
     * @param array $data
     *
     * @return Type\AbstractType
     *
     * @throws InvalidTypeIdentifierException
     */
    public function getType(array $data): Type\AbstractType
    {
        $recordTypeIdentifier = $data[0] ?? null;

        if (!isset(self::RECORD_TYPE_CLASS_MAP[$recordTypeIdentifier])) {
            throw new InvalidTypeIdentifierException(
                'Invalid/Unsupported Record Type Identifier: ' . $recordTypeIdentifier,
                8186126281
            );
        }

        $class = self::RECORD_TYPE_CLASS_MAP[$recordTypeIdentifier];

        if (class_exists($class)) {
            return new $class($data);
        }

        throw new InvalidTypeIdentifierException('Undefined Class: ' . $class, 4512716533);
    }
}
