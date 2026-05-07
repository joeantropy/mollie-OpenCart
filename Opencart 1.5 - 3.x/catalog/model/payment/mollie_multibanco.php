<?php
require_once(DIR_APPLICATION . "model/payment/mollie/base.php");

class ModelPaymentMollieMultibanco extends ModelPaymentMollieBase
{
	const MODULE_NAME = MollieHelper::MODULE_NAME_MULTIBANCO;
}
