<?php
  $contentOnlinePlayer = file_get_contents('https://api.bf4stats.com/api/onlinePlayers');
  $amountplayer='จำนวนคนออนไล';
  $onlineDecode=json_decode($contentOnlinePlayer);
  echo $onlineDecode;
  ?>