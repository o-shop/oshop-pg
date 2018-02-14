<?php
namespace Oshop;

use Oshop\OshopPg\ApiRequestor;
use Oshop\OshopPg\Config;

class OshopPg
{
  public static function charge($params)
  {
    $payloads = array(
        'payment_type' => 'bank_transfer'
      );

    $payloads = array_replace_recursive($payloads, $params);

    $result = ApiRequestor::post(
        Config::getBaseUrl() . '/transactions',
        array(Config::$accessToken),
        $payloads);

    return $result;
  }
}
