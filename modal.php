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
        <script src="js/ajax.js"></script>

    </head>
    <body>
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="display:block;" id="showdetailbtn">
      Launch modal
    </button>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">计划完成/确定</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </body>
</html>