<?php
$link = mysql_connect('localhost','it58160628','it58160628');
mysql_query("SET NAMES UTF8");
mysql_select_db('it58160628',$link);
if($_POST['id'] != NULL){
	$sql = "SELECT *
        FROM todo
        WHERE id =".$_POST['id'];
    $result=mysql_query($sql);
    $obj = mysql_fetch_object($result);  
	if($obj->status != 0){
	$sql="UPDATE todo SET status =0,
          finish = NULL 
          WHERE id =".$_POST['id'];
        mysql_query($sql);
}else{
		$finish = date('Y-m-d H:i:s');
        $sql="UPDATE todo SET status =1,
          finish ='".$finish. "' 
          WHERE id =".$_POST['id'];
         mysql_query($sql);
	}
}
$sql = "SELECT *FROM todo ORDER BY status,id desc";
$result = mysql_query($sql,$link);
$html = "<ol>";
while($obj = mysql_fetch_object($result)){
	if($obj->status == 1){
		$html.="<input type='checkbox' class='checkbox' value='".$obj->id."'><s>".$obj->topic."</input> ";
		$html.="<font color='#009900' size='1'>[".$obj->start."]</font></s> <br>";
	}else{
			$html.="<input type='checkbox' class='checkbox' value='".$obj->id."'>".$obj->topic."</input> ";
	        $html.="<font color='#009900' size='1'>[".$obj->start."]</font> <br>";
	}
}
$html.="</ol>";
echo $html;