<html lang="zh">
<?php
/**
 * Created by PhpStorm.
 * User: shenya
 * Date: 16-4-7
 * Time: 下午8:18
 */
include "head.php";
?>
<?php
session_start(); //启用session
if($_SESSION['user']){ // 检查用户是否登陆
}
else{
    header("location: index.php"); // 如果用户未登录则调用主页
}
$user = $_SESSION['user']; //读取用户
?>
<body>
<div class="container">
    <header>
        <div class="logo" >贵阳学院汽车衡智能称重系统</div>
        <nav class="float-right">
            <div class="pure-menu pure-menu-open pure-menu-horizontal">
                <ul>
                    <li><a href="logout.php">退出登录</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="pure-menu pure-menu-open pure-menu-horizontal">
        <ul>
            <h2>     <li><a href="admin.php">称重列表</a></li>
                <li><a href="users.php">用户</a></li>
                <li><a href="driver.php">司机</a></li>
                <li class="pure-menu-selected"><a href="cars.php">车辆</a></li>
            </h2>
        </ul>
    </div>
    <h2 align="center">车辆管理</h2>
    <form class="pure-form pure-form-aligned" action="edit_cars.php" method="GET">
        <label for="carnum">输入车牌号:</label><br><input type="text" id="id_text" name="id">
        <button type="submit" class="pure-button pure-button-primary">编辑</button>
    </form>
    <nav class="float-right">
        <div class="pure-menu pure-menu-open pure-menu-horizontal">
            <ul>
                <li><a href="down/d_cars.php">导出文件</a></li>
                <li><a href="add_cars.php">添加车辆</a></li>
            </ul>
        </div>
    </nav>
    <div class="pure-skin-shenya">
    <table class="pure-table pure-table-bordered pure-table-striped">
        <thead>
        <tr>
            <th>车牌号</th>
            <th>车型</th>
            <th>自重</th>
            <th>出厂时间</th>
            <th>备注</th>
            <th>编辑</th>
            <th>删除</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include "connect.inc.php";
        $queryitem = mysql_query("Select * from car");
        while($row = mysql_fetch_array($queryitem))
        {
            echo "<tr>";
            echo '<td align="center">'. $row['carnum'] . "</td>";
            echo '<td align="center">'. $row['model'] . "</td>";
            echo '<td align="center">'. $row['fload'] . "</td>";
            echo '<td align="center">'. $row['pdtime'] . "</td>";
            echo '<td align="center">'. $row['remarks'] . "</td>";
            echo '<td align="center"> <a href="edit_cars.php?id=' . $row['carnum'] .'"> 编辑 </a> </td>';
            echo '<td align="center"> <a href="delete_cars.php?id=' . $row['carnum'] .'"> 删除 </a></td>';
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
        </div>
    <?php
    include "footer.php";
    ?>
</div>
</body>
</html>