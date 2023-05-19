@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')


<div class="row">
   <div class="col-12">
      <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container">
         <div class="tradingview-widget-container__widget"></div>
         <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener"
               target="_blank"></a></div>
         <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
            async>
         {
            "symbols": [{
                  "proName": "BITSTAMP:BTCUSD",
                  "title": "Bitcoin"
               },
               {
                  "proName": "BITSTAMP:ETHUSD",
                  "title": "Ethereum"
               },
               {
                  "description": "",
                  "proName": "OANDA:XAUUSD"
               },
               {
                  "description": "",
                  "proName": "FX:AUDJPY"
               },
               {
                  "description": "",
                  "proName": "BINANCE:SOLUSDT"
               },
               {
                  "description": "",
                  "proName": "BINANCE:ADAUSDT"
               },
               {
                  "description": "",
                  "proName": "BINANCE:MATICUSDT"
               }
            ],
            "showSymbolLogo": true,
            "colorTheme": "light",
            "isTransparent": false,
            "displayMode": "adaptive",
            "locale": "en"
         }
         </script>
      </div>
      <!-- TradingView Widget END -->
   </div>
</div>
<dashboard></dashboard>
<div class="row my-5">
   <div class="col-12 col-sm-12">
      <h1 class="page-title mx-3 mb-4">Personal Trading Chart</h1>
      <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container">
         <div id="tradingview_f85c7"></div>
         <div class="tradingview-widget-copyright"><a
               href="https://www.tradingview.com/symbols/BTCUSDT/?exchange=BINANCE" rel="noopener" target="_blank"><span
                  class="blue-text"></span></a></div>
         <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
         <script type="text/javascript">
         new TradingView.widget({
            "width": 980,
            "height": 610,
            "symbol": "BINANCE:BTCUSDT",
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": "light",
            "style": "1",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "hide_side_toolbar": false,
            "allow_symbol_change": true,
            "container_id": "tradingview_f85c7"
         });
         </script>
      </div>
      <!-- TradingView Widget END -->
   </div><!-- COL END -->
</div>
@endsection