<?php
$progress = [0,53,89];
$total = 170;

$res_progress = array_map(function($val) use($total){
  return round(($val / $total) * 100);
},$progress);

echo json_encode($res_progress);
?>