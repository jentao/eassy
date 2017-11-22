<?php
/*
 * Created by PhpStorm.
 * User: jennifer
 * Date: 10/29/2017
 * Time: 9:53 PM
 */

include('../config/setup.php');
$id = $_REQUEST["id"];
$q = "SELECT * FROM essay WHERE user_id='$id'";

$essay = array();
$result = mysqli_query($dbc,$q);
while($row = mysqli_fetch_array($result))
{
    $essay[] = array('id'=>$row['id'], 'user_id'=>$row['user_id'], 'intro_type'=>$row['intro_type'], 'intro'=>$row['intro'], 'body'=>$row['body'],
        'conclusion_type'=>$row['conclusion_type'], 'conclusion'=>$row['conclusion'], 'citation'=>$row['citation']);
}

$arr = $essay['0'];

$intro = "";
$introObj = json_decode($arr['intro']);
if($arr['intro_type']==1){
    $intro = $introObj->ip1.$introObj->ip2.$introObj->ip3;
}
else{
    $intro = $introObj->ip4.$introObj->ip5.$introObj->ip6;
}

$body = "";
$bodyObj = json_decode($arr['body']);
foreach($bodyObj as $x => $x_value) {
    $body .= "\n".$x_value;
}

$conclusion = "";
$conObj = json_decode($arr['conclusion']);
if($arr['conclusion_type']==1){
    $conclusion = "\n".$conObj->c1.$conObj->c2.$conObj->c3;
}
else{
    $conclusion = "\n".$conObj->c4.$conObj->c5.$conObj->c6;
}

$citObj = json_decode($arr['citation']);
$cit = $citObj->cit;
$cit = preg_replace( '/<br>/', "
", $cit);
$citation = "\n".$cit;

echo $intro.$body.$conclusion.$citation;



