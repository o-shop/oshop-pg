<?php
namespace Oshop\OshopPg;

class Config
{
  public static $accessToken;
  public static $isProduction;

  const SANDBOX_BASE_URL = 'https://opg.dev.local/api';
  const PRODUCTION_BASE_URL = 'https://opg.local/api';

  public static function getBaseUrl()
  {
    return Config::$isProduction ?
        Config::PRODUCTION_BASE_URL : Config::SANDBOX_BASE_URL;
  }
}
