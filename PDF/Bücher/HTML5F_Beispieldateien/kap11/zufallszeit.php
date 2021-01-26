<?php
  $zufall = rand(1, 10);
  sleep($zufall);
  
  $lines = implode('', file('text.txt'));
  echo $lines;
?>
