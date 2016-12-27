<?php

function timediff($begin_time,$end_time)
{
     if($begin_time < $end_time){
        $starttime = $begin_time;
        $endtime = $end_time;
     }
     else{
        $starttime = $end_time;
        $endtime = $begin_time;
     }
     $timediff = $endtime-$starttime;
     $days = intval($timediff/86400);
     $remain = $timediff%86400;
     $hours = intval($remain/3600);
     $remain = $remain%3600;
     $mins = intval($remain/60);
     $secs = $remain%60;
     $res = array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs);
     return $res;
}

function selectnum()
{
     //连接数据库的参数  
    $host = "localhost";  
    $user = "root";  
    $pass = "zq19890319";  
    $db = "phpdev";  
    //创建一个mysql连接  
    $connection = mysql_connect($host, $user, $pass) or die("Unable to connect!");  
    //选择一个数据库  
    mysql_select_db($db) or die("Unable to select database!");  
    //开始查询  
    $query = "SELECT * FROM symbols";  
    //执行SQL语句  
    $result = mysql_query($query) or die("Error in query: $query. ".mysql_error());  
    //显示返回的记录集行数  
    if(mysql_num_rows($result)>0){  
        //如果返回的数据集行数大于0，则开始以表格的形式显示  
        echo "<table cellpadding=10 border=1>";  
        while($row=mysql_fetch_row($result)){  
            echo "<tr>";  
            echo "<td>".$row[0]."</td>";  
            echo "<td>".$row[1]."</td>";  
            echo "<td>".$row[2]."</td>";  
            echo "</tr>";  
        }  
        echo "</table>";  
    }  
    else{  
        echo "记录未找到！";  
    }  
    //释放记录集所占用的内存  
    mysql_free_result($result);  
    //关闭该数据库连接  
    mysql_close($connection);  
}
$file_path = 'zhongzi.txt'; //文件路径
$a=1481860409;
$b=time();
$timeff = timediff($a,$b);
echo "<p>采集时间：".$timeff['day']."天".$timeff['hour']."时".$timeff['min']."分".$timeff['sec']."秒"."</p>";
$line = 0 ; //初始化行数

//打开文件
$fp = fopen($file_path , 'r') or die("open file failure!");
if($fp){

 //获取文件的一行内容，注意：需要php5才支持该函数；
 while(stream_get_line($fp,8192,"\n")){
  $line++;
 }
 fclose($fp);//关闭文件
}
//输出行数；
echo "<p>当前获得连接数:".$line ."</p>";
echo "<p><a href='./zhongzi.txt'>Download</a></p>";



?>
