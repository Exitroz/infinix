<?php

namespace App\Traits;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

trait ManageCoins {

   public function coinUSD($coin_name) {
      $geckoClient = new CoinGeckoClient();

      $current_usd_coin_price = $geckoClient->simple()->getPrice($coin_name, 'usd');
      $coinValue = $current_usd_coin_price[$coin_name];

      $result = $coinValue['usd'];

      return $result;
   }
}