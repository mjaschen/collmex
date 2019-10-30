<?php

declare(strict_types=1);

namespace MarcusJaschen\Collmex;

use MarcusJaschen\Collmex\Exception\InvalidTypeIdentifierException;
use MarcusJaschen\Collmex\Type\AccountBalance;
use MarcusJaschen\Collmex\Type\AccountDocument;
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

/**
 * Type Factory for Collmex Response Data.
 *
 * @author   Marcus Jaschen <mail@marcusjaschen.de>
 */
class TypeFactory
{
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
        switch ($data[0]) {
            case 'LOGIN':
                return new Login($data);
            case 'MESSAGE':
                return new Message($data);
            case 'NEW_OBJECT_ID':
                return new NewObject($data);
            case 'ACC_BAL':
                return new AccountBalance($data);
            case 'ACCDOC':
                return new AccountDocument($data);
            case 'CMXABO':
                return new Subscription($data);
            case 'CMXBOM':
                return new BillOfMaterial($data);
            case 'CMXINV':
                return new Invoice($data);
            case 'CMXMGD':
                return new Member($data);
            case 'CMXKND':
                return new Customer($data);
            case 'CMXORD-2':
                return new CustomerOrder($data);
            case 'CMXUMS':
                return new Revenue($data);
            case 'CMXPRD':
                return new Product($data);
            case 'CMXPRI':
                return new ProductPrice($data);
            case 'PROJECT_STAFF':
                return new ProjectStaff($data);
            case 'STOCK_AVAILABLE':
                return new StockAvailable($data);
            case 'CMXSTK':
                return new Stock($data);
            case 'CMXDLV':
                return new Delivery($data);
            case 'TRACKING_NUMBER':
                return new TrackingNumber($data);
            case 'CMXPOD':
                return new PurchaseOrder($data);
            case 'OPEN_ITEM':
                return new OpenItem($data);
            case 'PRICE_GROUP':
                return new PriceGroup($data);
            case 'STOCK_CHANGE':
                return new StockChange($data);
            case 'PRODUCTION_ORDER':
                return new ProductionOrder($data);
        }

        throw new InvalidTypeIdentifierException('Invalid Type Identifier: ' . $data[0]);
    }
}
