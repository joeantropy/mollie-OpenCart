<?php
require_once(DIR_APPLICATION . "model/payment/mollie/base.php");

class ModelPaymentMollieBizum extends ModelPaymentMollieBase
{
	const MODULE_NAME = MollieHelper::MODULE_NAME_BIZUM;

	public function recurringPayments() {
		
		return true;
	}
}
