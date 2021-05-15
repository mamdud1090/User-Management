<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
	protected $table = 'payments';

	protected $fillable = ['id', 'currency', 'cus_email', 'cus_name', 'cus_phone', 'event_id', 'event_name', 'event_registration_id', 'ssl_sessionkey', 'total_amount', 'tran_id', 'ssl_amount', 'ssl_bank_tran_id', 'ssl_card_brand', 'ssl_card_issuer', 'ssl_card_issuer_country', 'ssl_card_issuer_country_code', 'ssl_card_no', 'ssl_card_type', 'ssl_currency', 'ssl_currency_amount', 'ssl_currency_type', 'ssl_risk_level', 'ssl_risk_title', 'ssl_status', 'ssl_store_amount', 'ssl_tran_date', 'ssl_val_id', 'ssl_verify_key', 'ssl_verify_sign',];

}
