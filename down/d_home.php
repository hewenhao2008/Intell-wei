<?php
session_start(); //starts the session
if($_SESSION['duser']){ // checks if the user is logged in
}
else{
    header("location: index.php"); // redirects if user is not logged in
}
$duser = $_SESSION['duser']; //assigns user value
?>
<table class="pure-table pure-table-bordered">
    <thead>
    <tr>
        <th>记录号</th>
        <th>管理账号</th>
        <th>车牌号</th>
        <th>类型</th>
        <th>净重</th>
        <th>时间</th>
        <th>备注</th>
    </tr>
    </thead>
    <tbody>
    <?php
    header("content-type:application/msexcel");
    header("content-disposition:filename=driver_ifo.xls");
    include "../connect.inc.php";//连接到数据库
    $querycarnum = mysql_query("Select * from driver Where driver_id='$duser'");
    $row_carnum = mysql_fetch_array($querycarnum);
    $carnum = $row_carnum['carnum'];
    $queryitem = mysql_query("Select * from manage Where carnum='$carnum' order by manage_id desc");
    while($row = mysql_fetch_array($queryitem))
    {
        echo "<tr>";
        echo '<td align="center">'. $row['manage_id'] . "</td>";
        echo '<td align="center">'. $row['user_id'] . "</td>";
        echo '<td align="center">'. $row['carnum'] . "</td>";
        echo '<td align="center">'. $row['kind'] . "</td>";
        echo '<td align="center">'. $row['weight'] . "</td>";
        echo '<td align="center">'. $row['time'] . "</td>";
        echo '<td align="center">'. $row['remarks'] . "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
