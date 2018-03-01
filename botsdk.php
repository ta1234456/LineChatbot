<?php
$access_token = 'HwQLf/ZYchE8dejoxTYwzJqcYywX68eahiHhW+DDzTa+sshlRKUSVQZHg854Mf1qGrBuxJgHtEl32jZ1UGXDDroVYSkdO0QL+uqI6ebKUEuI8DEluBLU+YErDDMJQHJoGq5tDF4P8zYa04qWksYMFQdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
if (!is_null($events['events'])) {
		foreach ($events['events'] as $event) {
			if ($event['type']=='message'&& $event['message']['type']=='text')
			{
			    $text = $event['message']['text'];
			    $replyToken=$event['replyToken'];

			    $contentOnlinePlayer = file_get_contents('https://api.bf4stats.com/api/onlinePlayers');
			    $map="ร้านอาหาร"
			    $amountplayer="จำนวนคนออนไล";
			    $onlineDecode=json_decode($contentOnlinePlayer,true);
			    if (!is_null($onlineDecode)){
			    	switch ($text) {
			    		case 'pc':
			    			$amountplayer.=$onlineDecode['pc']['count'];
			    			break;
			    		case 'ps3':
			    			$amountplayer.=$onlineDecode['ps3']['count'];
			    			break;
			    		case 'ps4':
			    			$amountplayer.=$onlineDecode['ps4']['count'];
			    			break;
			    		case 'xbox':
			    			$amountplayer.=$onlineDecode['xbox']['count'];
			    			break;
					case 'map':
			    			$map
			    		default:
			    			$amountplayer="อุ้ยตายแล้วโปรดพิม WANT pc xbox ps4 ps3 map";
			    			break;
			    	}
			    $messages=[
			    	'type'=>'text',
			    	'text'=>$amountplayer
			    	],
				    ['type'=>'location'
				     'location'=>$map,
				     'title'=> 'my location',
   				     'address'=> '〒150-0002 東京都渋谷区渋谷２丁目２１−１',
    			             'atitude'=> 35.65910807942215,
                                     'longitude'=>139.70372892916203];

			    $url = 'https://api.line.me/v2/bot/message/reply';
			    $data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
				];
				$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
			}

			}
			# code...
		}
	}
echo "OK" ;
?>
