<?php session_start();?>
<html>
    <head>
         <script src="js/jquery.min.js"></script>
         <script src="js/ajax.js"></script>
    </head>
    <body>
         <?php 
         if(!isset($_SESSION['usrname'])){
            echo "<form action='source/login.php' method='post' id='login_form'>";
            echo "    <input type='text' name='usrname' id='usrname'>";
            echo "    <input type='password' name='pasword' id='pasword'>";
            echo "    <input type='submit' value='登陆'>";
            echo "</form>";
        }else{
            echo "<form action='source/login.php' method='post' id='logout_form'>";
            echo "    <label>用户名：</label><p> ".$_SESSION['usrname']." </p>";
            echo "    <input type='submit' value='注销'>";
            echo "</form>";

        }?>

        <form action='source/add_entry.php' method='post' id='add_form'>
            <input type="text" name='ename' id='ename'>
            <textarea name="econtent" id="econtent" cols="30" rows="10"></textarea>
            <input type="timepicker" name='ebdate' id='ebdate'>
            <input type="submit" value='保存'>
        </form>
        
    </body>
</html>