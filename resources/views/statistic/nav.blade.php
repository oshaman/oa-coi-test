<li><a href="{{ route('stat', 'eth_usd') }}">ETH</a></li>
<li><a href="{{ route('stat', 'bch_usd') }}">BCH</a></li>
<li><a href="{{ route('stat', 'etc_usd') }}">ETC</a></li>
<li><a href="{{ route('stat', 'xrp_usd') }}">XRP</a></li>
<li>--------------------------------</li>

<li><a href="{{ route('stat', ['coin'=>'eth_usd', 'hours'=>2]) }}">ETH->H</a></li>
<li><a href="{{ route('stat', ['coin'=>'bch_usd', 'hours'=>2]) }}">BCH->H</a></li>
<li><a href="{{ route('stat', ['coin'=>'etc_usd', 'hours'=>2]) }}">ETC->H</a></li>
<li><a href="{{ route('stat', ['coin'=>'xrp_usd', 'hours'=>2]) }}">XRP->H</a></li>
<hr>