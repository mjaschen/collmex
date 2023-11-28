<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException;
use MarcusJaschen\Collmex\Type\AccountBalance;
use MarcusJaschen\Collmex\Type\AccountDocument;
use MarcusJaschen\Collmex\Type\Address;
use MarcusJaschen\Collmex\Type\AddressGroups;
use MarcusJaschen\Collmex\Type\Batch;
use MarcusJaschen\Collmex\Type\BillOfMaterial;
use MarcusJaschen\Collmex\Type\Customer;
use MarcusJaschen\Collmex\Type\CustomerOrder;
use MarcusJaschen\Collmex\Type\Delivery;
use MarcusJaschen\Collmex\Type\DifferentShippingAddress;
use MarcusJaschen\Collmex\Type\Employee;
use MarcusJaschen\Collmex\Type\Invoice;
use MarcusJaschen\Collmex\Type\InvoiceOutput;
use MarcusJaschen\Collmex\Type\InvoicePayment;
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
use MarcusJaschen\Collmex\Type\Supplier;
use MarcusJaschen\Collmex\Type\SupplierCredit;
use MarcusJaschen\Collmex\Type\TermsOfPayment;
use MarcusJaschen\Collmex\Type\TrackingNumber;
use MarcusJaschen\Collmex\Type\Voucher;

/**
 * Type Factory for Collmex response data: Builds the type object for the given data.
 */
class TypeFactory
{
    private const RECORD_TYPE_CLASS_MAP = [
        // special types
        'LOGIN' => Login::class,
        'MESSAGE' => Message::class,
        'NEW_OBJECT_ID' => NewObject::class,
        // regular types
        'ACC_BAL' => AccountBalance::class,
        'ACCDOC' => AccountDocument::class,
        'ADRGRP' => AddressGroups::class,
        'CMXABO' => Subscription::class,
        'CMXADR' => Address::class,
        'CMXBOM' => BillOfMaterial::class,
        'CMXBTC' => Batch::class,
        'CMXDLV' => Delivery::class,
        'EMPLOYEE' => Employee::class,
        'CMXEPF' => DifferentShippingAddress::class,
        'CMXINV' => Invoice::class,
        'CMXKND' => Customer::class,
        'CMXLIF' => Supplier::class,
        'CMXMGD' => Member::class,
        'CMXORD-2' => CustomerOrder::class,
        'CMXPOD' => PurchaseOrder::class,
        'CMXPRD' => Product::class,
        'CMXPRI' => ProductPrice::class,
        'CMXSBI' => SupplierCredit::class,
        'CMXSTK' => Stock::class,
        'CMXTOP' => TermsOfPayment::class,
        'CMXUMS' => Revenue::class,
        'INVOICE_OUTPUT' => InvoiceOutput::class,
        'INVOICE_PAYMENT' => InvoicePayment::class,
        'OPEN_ITEM' => OpenItem::class,
        'PRDGRP' => ProductGroup::class,
        'PRICE_GROUP' => PriceGroup::class,
        'PRODUCTION_ORDER' => ProductionOrder::class,
        'PROJECT_STAFF' => ProjectStaff::class,
        'STOCK_AVAILABLE' => StockAvailable::class,
        'STOCK_CHANGE' => StockChange::class,
        'TRACKING_NUMBER' => TrackingNumber::class,
        'VOUCHER' => Voucher::class,
    ];

    /**
     * @param array<int, string> $data
     * @throws InvalidTypeIdentifierException
     */
    public function getType(array $data): Type\AbstractType
    {
        $recordTypeIdentifier = $data[0] ?? null;

        if (!isset(self::RECORD_TYPE_CLASS_MAP[$recordTypeIdentifier])) {
            throw new InvalidTypeIdentifierException(
                'Invalid/Unsupported Record Type Identifier: ' . $recordTypeIdentifier,
                8_186_126_281
            );
        }

        $class = self::RECORD_TYPE_CLASS_MAP[$recordTypeIdentifier];

        if (class_exists($class)) {
            return new $class($data);
        }

        throw new InvalidTypeIdentifierException('Undefined Class: ' . $class, 4_512_716_533);
    }
}
