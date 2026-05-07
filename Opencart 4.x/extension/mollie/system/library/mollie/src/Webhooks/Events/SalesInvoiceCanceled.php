<?php

namespace Mollie\Api\Webhooks\Events;

use Mollie\Api\Webhooks\WebhookEventType;
class SalesInvoiceCanceled extends \Mollie\Api\Webhooks\Events\BaseEvent
{
    public static function type() : string
    {
        return WebhookEventType::SALES_INVOICE_CANCELED;
    }
}
