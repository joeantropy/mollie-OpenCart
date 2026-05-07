<?php

namespace Mollie\Api\Webhooks\Events;

use Mollie\Api\Webhooks\WebhookEventType;
class SalesInvoicePaid extends \Mollie\Api\Webhooks\Events\BaseEvent
{
    public static function type() : string
    {
        return WebhookEventType::SALES_INVOICE_PAID;
    }
}
