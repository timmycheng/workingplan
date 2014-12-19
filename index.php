<?php 
session_start();
// include 'source/index_com.php';
error_reporting(7);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no"> -->
        <title>IP 查找</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Javascript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/ajax.js"></script>
    </head>
    <body>
        <div id="logio">      
            <?php
                if(!isset($_SESSION['usrname'])){
            ?>
            <div id="login">
                <form action='source/login.php' method='post' id='login_form' class='form-inline'>
                    <div class="form-group">
                        <label for="usrname" class='sr-only'>用户名</label>
                        <input type='text' name='usrname' id='usrname' class='form-control input-sm' placeholder='用户名'>
                    </div>
                    <div class="form-group">
                        <label for="pasword" class="sr-only">密码</label>
                        <input type='password' name='pasword' id='pasword' class='form-control input-sm' placeholder='密码'>
                    </div>
                    <div class="form-group">
                        <input type='submit' value='登陆' class='btn btn-primary btn-sm'>
                    </div>
                </form>
            </div>
            <?php
                }else{
            ?>
            <div id="logout">
                <form action='source/login.php' method='post' id='logout_form' class='form-inline'>
                    <div class="form-group">
                        <label class='control-label'>用户名：</label>
                        <p class='form-control-static'> <?php echo $_SESSION['usrname']?> </p>
                    </div>
                    <div class="form-group">
                        <input type='submit' class='btn btn-primary' value='注销'>
                    </div>
                </form>
                <form action='source/add_entry.php' method='post' id='add_form' class='form-inline'>
                    <div class="form-group">
                        <input type='text' name='ename' id='ename' class='form-control'>
                        <input type='date' name='ebdate' id='ebdate' class='form-control'>
                    </div>
                    <div class="form-group">
                        <textarea name='econtent' id='econtent' rows='3' class='form-control'></textarea>
                    </div>
                    <div class="form-group">
                        <input type='submit' value='保存'>
                    </div>
                </form>
            </div>
            <?php
                }
            ?>
        </div>
        <div id="entry_list"></div>

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="display:none;" id="showdetailbtn">
          Launch modal
        </button>

        <!-- <div id="entry_item" style="display:none;"> -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    <p>One fine body&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary">保存</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <!-- </div> -->


    </body>
</html>