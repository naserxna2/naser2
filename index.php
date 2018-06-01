<?php

function makecurl($api,$data=array())
{


// use key 'http' even if you send the request to https://...
$options = array(
);
$ds1=array();
$ds1['header']="Content-type: application/x-www-form-urlencoded\r\n";
$ds1['method']="POST";
$ds1['content']=http_build_query($data);
$options['http']=$ds1;
    
$context  = stream_context_create($options);
$result = file_get_contents($api, false, $context);
if ($result === FALSE) { /* Handle error */ }
return $result;
}
$last_updated_id=0;
function getupdates()
{

 $last1=$GLOBALS['last_updated_id'];
 $last1=$last1+1;
 $d1=array();
 $d1['offset']=$last1;
 
 $url="
https://api.telegram.org/bot";
$s1="385642393:AAFDS7I1sl7v3TxDwfvlSfY407tL1ST3tHU";

 $d3=makecurl($url.$s1."/getUpdates",$d1);

$d2=count($d3);
if ($d2 > 0)
{

foreach($d3 as $update)
{
$GLOBALS['last_updated_id']=$update->update_id;
$chat_id=$update->message->chat->id;

$text="Hello World!";
$d4=array();
$d4['chat_id']=$chat_id;
$d4['text']=$text;
make_curl($url.$s1."/sendMessage",$d4);
}
}
sleep(5);
getupdates();
}
function t1($api,$data)
{


$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $api);
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data); 

$response = curl_exec( $ch );
curl_close($ch);
return $response;
}


function sph($api,$data,$size)
{
    
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
"Content-Type:multipart/form-data"));
    curl_setopt($ch,CURLOPT_URL, $api);
  
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER,TRUE);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_INFILESIZE, $size);
    $response = curl_exec( $ch );
    curl_close($ch);
    return $response;
 }
 
 function sph1($api,$data)
 {
 
 $ch = curl_init(); 
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
 "Content-Type:multipart/form-data"));
 curl_setopt($ch,CURLOPT_URL, $api);
 
 curl_setopt( $ch, CURLOPT_RETURNTRANSFER,TRUE);
 curl_setopt($ch,CURLOPT_POSTFIELDS, $data);

 $response = curl_exec( $ch );
 curl_close($ch);
 return $response;
 }

function getme($d3)
{

 
 
 $url="https://api.telegram.org/bot";
$s1="435065500:AAEdTjraLapO185IrgKDi9KFKI4tTJnDZrs";
$s2=$url.$s1."/getUpdates";
  $last1=$GLOBALS['last_updated_id'];
 $last1+=1;
 $d1='offset'.'='.$last1;
 

$update=array();
$update=json_decode($d3,true);


$GLOBALS['last_updated_id']=$update['update_id'];
$chat_id1=$update['message'];
$chat_id2=$chat_id1['chat'];
$chat_text=$chat_id1['text'];
var_dump( $chat_text);
$chat_id=$chat_id2['id'];
echo $chat_id;
$text="hello world";
$d6='chat_id'.'='.$chat_id.'&'.'text'.'='.$text;
$s3=$url.$s1."/sendMessage";
$f1=t1($s3,$d6);
file_put_contents('f1.txt',$f1);

$p="image/10.jpg";
$p2="https://naserxna2.herokuapp.com/";
$p1=$p2.$p;
$s=filesize($p);
$d8=array();
$d8['chat_id']=$chat_id;
$d8['photo']=$p1;
$d8['caption']="10 ";
$s4=$url.$s1."/sendPhoto";
$d10=sph($s4,$d8,$s);
var_dump(json_decode($d10,true));
file_put_contents('f3.txt',$d10);

}


function t2($u2){

$c = curl_init($u2);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
//curl_setopt(... other options you want...)

$html = curl_exec($c);


curl_close($c);
return $html;
}

function s2(){


 $url="https://api.telegram.org/bot";
$s3="435065500:AAEdTjraLapO185IrgKDi9KFKI4tTJnDZrs";


$p2="https://naserxna2.herokuapp.com/";
$p1=$p2.$p;
$p3= "index.php";
$p4=$p2.$p3;

$d8=array();
$d8['url']=$p4;

$s4=$url.$s3."/setWebhook";
$d10=sph1($s4,$d8);
var_dump(json_decode($d10,true));
file_put_contents('f3.txt',$d10);


}


echo "hello world";
$d1=file_get_contents('php://input');
file_put_contents('list.txt',$d1);
//getme($d1);
s2();


?>