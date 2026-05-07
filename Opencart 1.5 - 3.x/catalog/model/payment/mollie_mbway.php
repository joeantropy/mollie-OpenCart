<?php
require_once(DIR_APPLICATION . "model/payment/mollie/base.php");

class ModelPaymentMollieMBWay extends ModelPaymentMollieBase
{
	const MODULE_NAME = MollieHelper::MODULE_NAME_MBWAY;

	public function recurringPayments() {
		
		return true;
	}
}
