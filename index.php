<?php 
session_start();
include 'source/index_com.php';
error_reporting(7);
?>
<html>
    <head>
         <script src="js/jquery.min.js"></script>
         <script src="js/ajax.js"></script>
    </head>
    <body>
        <div id="logio">      
            <?php
                if(!isset($_SESSION['usrname'])){
            ?>
            <div id="login">
                <form action='source/login.php' method='post' id='login_form'>
                    <input type='text' name='usrname' id='usrname'>
                    <input type='password' name='pasword' id='pasword'>
                    <input type='submit' value='登陆'>
                </form>
            </div>
            <?php
                }else{
            ?>
            <div id="logout">
                <form action='source/login.php' method='post' id='logout_form'>
                    <label>用户名：</label><p> <?php echo $_SESSION['usrname']?> </p>
                    <input type='submit' value='注销'>
                </form>
                <form action='source/add_entry.php' method='post' id='add_form'>
                    <input type='text' name='ename' id='ename'>
                    <textarea name='econtent' id='econtent' cols='30' rows='10'></textarea>
                    <input type='timepicker' name='ebdate' id='ebdate'>
                    <input type='submit' value='保存'>
                </form>
            </div>
            <?php
                }
            ?>
        </div>
        <div id="entry_list"></div>


    </body>
</html>