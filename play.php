<?php

$dataOrder = array('2017-04-01', '2017-05-01', '2017-06-01', '2017-07-01');
$this_month = date('Y-07-d');
$transaction = array();

for ($i=0; $i < sizeof($dataOrder); $i++) { 

  if ($dataOrder[$i] <= $this_month) {
    
    array_push($transaction, $dataOrder[$i]);
    echo "Backup ke tabel transaction <br>";
    $data = array("data" => $transaction);
    $json = json_encode($data);
    $fp = fopen('transaction.json', 'w');
    fwrite($fp, $json);
    fclose($fp);

  }else{

    echo "Stand by....<br>";
  }

}

echo "<pre>";
print_r($transaction);

/*
$this_month = idate('m');
$next_month = ($this_month >= 12) ? 1 : $this_month+1;
$monList = array(
    '1' => 'Januari',
    '2' => 'Februari',
    '3' => 'Maret',
    '4' => 'April',
    '5' => 'Mei',
    '6' => 'Juni',
    '7' => 'Juli',
    '8' => 'Agustus',
    '9' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);

echo $monList[$next_month];
*/

?>