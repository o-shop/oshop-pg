<?php
namespace Oshop\OshopPg;

class ApiRequestor
{
  public static function get($url, $header, $data_hash)
  {
    return self::remoteCall($url, $header, $data_hash, false);
  }

  public static function post($url, $header, $data_hash)
  {
    return self::remoteCall($url, $header, $data_hash, true);
  }

  public static function remoteCall($url, $headers, $data_hash, $post = true)
  {
    $ch = curl_init();

    $header = array(
        'Content-Type: application/json',
        'Accept: application/json',
    );
    $header = array_merge($header, $headers);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    if ($post) {
      curl_setopt($ch, CURLOPT_POST, 1);

      if ($data_hash) {
        $body = json_encode($data_hash);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
      }
      else {
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
      }
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    return $result;
  }
}
