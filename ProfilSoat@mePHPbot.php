<?php

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
include 'madeline.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$MadelineProto->start();

$soat=date("H:i",strtotime("5 hour")); 
$sana = date('d-m-Y',strtotime('5 hour'));
$sana2 = date('d.m.y',strtotime('5 hour'));

$input = array("📆$sana ¦ ⌚$soat","📆$sana | ⌚$soat");
   $rand=array_rand($input);
  $bio="$input[$rand]";

$input2 = array("$soat ¦ #BeXRuZ","#BeXRuZ ¦ $soat");
  $rand2=array_rand($input2);
  $nik="$input2[$rand2]";
  
$MadelineProto->account->updateProfile(['first_name'=>"$nik",'about'=>"$bio"]);
$MadelineProto->account->updateStatus(['offline' => false, ]);

$kun1 = date('z',strtotime('5 hour'));
$a = 364;
$c2 = $a-$kun1;
$d = date('L',strtotime('5 hour'));
$b = $c2+$d;
$kun2 = date('H',strtotime('5 hour')); 
$a2 = 23;
$b2 = $a2-$kun2;
$kun3 = date('i',strtotime('5 hour')); 
$a3 = 59;
$b3 = $a3-$kun3;

$logopic="https://b3k1jan.zadc.ru/API/bexruz.php?type=5&size=151&height=484&width=161&text=$b&size2=131&height2=777&width2=191&text2=$b2&size3=101&height3=1015&width3=262&text3=$b3";
////https://b3k1jan.zadc.ru/API/bexruz.php?type=2&size=63&height=510&width=232&text=$soat ¦ $sana

header('Content-type: image/jpg');
file_put_contents("got.jpg",file_get_contents($logopic));
$info = $MadelineProto->get_full_info('me');
$inputPhoto = ['_' => 'inputPhoto', 'id' => $info['User']['photo']['photo_id'], 'access_hash' => $info['User']['access_hash'], 'file_reference' => 'bytes'];
$deletePhoto = $MadelineProto->photos->deletePhotos(['id'=>[$inputPhoto]]);

$MadelineProto->photos->updateProfilePhoto(['file' => "got.jpg" ]);
