<?php
$url = 'http://yii2.cntxb.com/pay/notify';
$post_data = $_POST;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_READFUNCTION,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);
$out = curl_exec($ch);
curl_close($ch);
echo $out;