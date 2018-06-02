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
function t2($api)
{


$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $api);
curl_setopt( $ch, CURLOPT_HTTPGET, 1);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER,TRUE);


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
 "Content-Type: application/x-www-form-urlencoded"));
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
if($update['callback_query']==null)
{
$chat_id1=$update['message'];
$chat_id2=$chat_id1['chat'];
$chat_text=$chat_id1['text'];
var_dump( $chat_text);
$ch1="https://youtu.be/4FDnGxkfThU";
$ch2="http://www.youtube.com/watch?v=nJ539VsNq2s";
$st1=explode(".",$chat_text);
$st3=2;
foreach($st1 as $st2)
{
if($st2 =="youtube")
$st3=1;
}
if($st3==1)
{
$st4=$st1[2];
$st5=explode("=",$st4);
$id1=$st5[1];
}
elseif($st3==2)
{
$st4=$st1[1];
$st5=explode("/",$st4);
$id1=$st5[1];
}
var_dump($id1);
$ur1="https://baixaryoutube.net/@api/json/videos/";
$ur2=$ur1.$id1;
$r1=t2($ur2);

$up1=array();
$up1=json_decode($r1,true);
$tr1=$up1['vidTitle'];
$tr2=$up1['vidInfo'];
var_dump($tr1);
$kb1=array();
$kb2=array();
$i=0;
$j=0;
foreach($tr2 as $tr3)
{
if($tr3['ftype']=="mp4")
if($i==2)
{
$i=0;
$kb1[$j]=$kb2;
$kb2=array();
$kb3=array();
$j++;
$kb3['text']=$tr3['quality']."mp4=".$tr3['rSize'];
$chat_id=$chat_id2['id'];
$kb3['callback_data']=$id1."-".$chat_id."-".$tr3['quality'];
$kb2[$i]=$kb3;
$i++;
var_dump($tr3['quality']);
}
else
{
$kb3=array();

$kb3['text']=$tr3['quality']."mp4=".$tr3['rSize'];
$chat_id=$chat_id2['id'];
$kb3['callback_data']=$id1."-".$chat_id."-".$tr3['quality'];
$kb2[$i]=$kb3;
$i++;
var_dump($tr3['quality']);
}

}
$kb1[$j]=$kb2;
$kb4=array();
$kb4['inline_keyboard']=$kb1;
$kb5=json_encode($kb4);
$chat_id=$chat_id2['id'];
echo $chat_id;
$text="hello world";
$d7='chat_id='.$chat_id.'&text='.$chat_id;
$d6='chat_id'.'='.$chat_id.'&'.'text'.'='.$tr1.'&'.'reply_markup='.$kb5;
$s3=$url.$s1."/sendMessage";
$f1=t1($s3,$d6);
file_put_contents('f1.txt',$f1);
}
else
{
$up1=$update['callback_query'];
$up2=$up1['data'];
$st1=explode("-",$up2);
$ur1="https://baixaryoutube.net/@api/json/videos/";
$ur2=$ur1.$st1[0];
$r1=t2($ur2);

$up11=array();
$up11=json_decode($r1,true);
$tr1=$up11['vidTitle'];
$tr2=$up11['vidInfo'];

foreach($tr2 as $tr3)
{
if($tr3['ftype']=="mp4")
{
if($tr3['quality']==$st1[2])
{
$ur3=$tr3['dloadUrl'];
}

}
}
$ur5=str_replace("\/","/",$ur3);
$ur6=str_replace("@","%40",$ur5);
$ur7=str_replace("//","",$ur6);
$ur4=$ur7;



$d8=array();
$d8['chat_id']=$st1[1];
$d8['video']=$ur4;
$d8['caption']=$tr1;
$s4=$url.$s1."/sendVideo";
$d10=sph1($s4,$d8);
var_dump(json_decode($d10,true));
file_put_contents('f3.txt',$d10);
}
}


function t21($u2){

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
getme($d1);
//s2();


?>