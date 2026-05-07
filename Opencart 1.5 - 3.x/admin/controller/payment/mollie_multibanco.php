<?php
require_once(DIR_APPLICATION . "controller/payment/mollie/base.php");

class ControllerPaymentMollieMultibanco extends ControllerPaymentMollieBase
{
	const MODULE_NAME = MollieHelper::MODULE_NAME_MULTIBANCO;
}
