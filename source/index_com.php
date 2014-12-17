<?php
function logio($usrname){
	if(!isset($usrname)){
            echo "<form action='source/login.php' method='post' id='login_form'>";
            echo "    <input type='text' name='usrname' id='usrname'>";
            echo "    <input type='password' name='pasword' id='pasword'>";
            echo "    <input type='submit' value='登陆'>";
            echo "</form>";
        }else{
            echo "<form action='source/login.php' method='post' id='logout_form'>";
            echo "    <label>用户名：</label><p> ".$usrname." </p>";
            echo "    <input type='submit' value='注销'>";
            echo "</form>";

            echo "<form action='source/add_entry.php' method='post' id='add_form'>";
            echo "    <input type='text' name='ename' id='ename'>";
            echo "    <textarea name='econtent' id='econtent' cols='30' rows='10'></textarea>";
            echo "    <input type='timepicker' name='ebdate' id='ebdate'>";
            echo "    <input type='submit' value='保存'>";
            echo "</form>";
        }
}

?>