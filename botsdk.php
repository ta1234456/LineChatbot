<?php
$composer require linecorp/line-bot-sdk;
$channelsecret = 'b22885a71763e7bd72dd1d58ddc267d8';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('HwQLf/ZYchE8dejoxTYwzJqcYywX68eahiHhW+DDzTa+sshlRKUSVQZHg854Mf1qGrBuxJgHtEl32jZ1UGXDDroVYSkdO0QL+uqI6ebKUEuI8DEluBLU+YErDDMJQHJoGq5tDF4P8zYa04qWksYMFQdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelsecret' =>$channelsecret]);
$response = $bot->replyText('<reply token>', 'hello!');
?>