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
        <title>工作计划 V0.1</title>
        <!-- [if lt IE 9]
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.js"></script>
        ![end if] -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
        <!-- Javascript -->
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>        
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <script src="js/bootstrap-datetimepicker.zh-CN.js"></script>
        <script src="js/modal.js"></script>
        <script src="js/ajax.js"></script>

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h1>工作计划<small>V0.1</small></h1>
                </div>
                <div class="col-md-4">
                    <div id="logio">      
                        <?php
                            if(!isset($_SESSION['usrname'])){
                        ?>
                        <div id="login">
                            <form action='source/login.php' method='post' id='login_form' class='form-inline'>
                                <div class="input-group">
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
                                    <input type='submit' class='btn btn-primary btn-xs' value='注销'>
                                </div>
                            </form>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div id="add_div">
                    <?php
                    if (isset($_SESSION['usrname'])) {
                    ?>
                    <div class="col-md-4" id='add_f'>
                            <form action='source/add_entry.php' method='post' id='add_form' class='form-horizontal'>
                                <div class="form-group">
                                    <label for="ename" class='col-sm-3 control-label'>标题：</label>
                                    <div class="col-sm-9">
                                        <input type='text' name='ename' id='ename' class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ebdate" class='col-sm-3 control-label'>完成标识：</label>
                                    <div class="col-sm-9">
                                        <input type='text' name='ebdate' id='ebdate' class='form-control'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="econtent" class='col-sm-3 control-label'>内容：</label>
                                    <div class="col-sm-9">
                                        <textarea name='econtent' id='econtent' rows='5' class='form-control'></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-10 col-sm-2">
                                        <input type='submit' class='btn btn-primary btn-sm' value='保存'>
                                    </div>
                                </div>
                            </form>
                    </div>
                    
                    <?php
                    }else{
                    ?>
                    <div class="col-md-2" id="add_f"></div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-8">
                    <div id="entry_list"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr style="display:none;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="result" id="result"></div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>



    <!-- 弹出窗口 -->
    <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="display:none;" id="showdetailbtn">
      Launch modal
    </button> -->

    <!-- <div id="entry_item" style="display:none;"> -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4">完成状态：</div>
                    <div class="col-md-8" id="status">未完成</div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">内容：</div>
                    <div class="col-md-8" id="content">xxxxxxxxxxxxxxxxxxxx</div>
                  </div>
              </div>
              <div class="modal-footer">
                <div class="info" style='display:none;'></div>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="confirm">计划完成</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <!-- </div> -->
    </body>
</html>