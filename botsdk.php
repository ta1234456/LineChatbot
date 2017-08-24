<?php
$access_token = 'HwQLf/ZYchE8dejoxTYwzJqcYywX68eahiHhW+DDzTa+sshlRKUSVQZHg854Mf1qGrBuxJgHtEl32jZ1UGXDDroVYSkdO0QL+uqI6ebKUEuI8DEluBLU+YErDDMJQHJoGq5tDF4P8zYa04qWksYMFQdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
echo $events ;
?>
