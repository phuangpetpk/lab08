<?php
$link = mysql_connect('localhost','it58160628','it58160628');
mysql_query("SET NAMES UTF8");
mysql_select_db('it58160628',$link);
//insert new todo
$start = date('Y-m-d H:i:s');
$topic = addslashes($_POST['topic']);
$sql = "INSERT INTO todo (start, topic, status) VALUES ('$start', '$topic',0);";
mysql_query($sql);
//get data back
$sql ="SELECT *
        FROM todo
        ORDER BY status, id desc";
        $result = mysql_query($sql,$link);
        $html = "<ol>";
        while($obj = mysql_fetch_object($result)){
            $html.="<li>".$obj->topic." ";
            $html.="<font color='#009900' size='1'>[".$obj->start."]</font>";
        }
        $html.="</ol>";
        echo $html;


        