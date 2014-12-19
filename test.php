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

      <!-- 点击弹出modal框 -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          Launch demo modal
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        <!-- </div> -->
        <!-- 点击弹出modal框-结束 -->

        
        <table class='table'>
          <thead>
            <tr>
              <th>aaaaaaa</th>
              <th>bbbbbbb</th>
              <th>ccccccc</th>
              <th>ddddddd</th>
              <th>eeeeeee</th>
            </tr>
          </thead>
          <tr>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>d</td>
            <td><a href="#one" data-toggle='collapse' data-target='#content'>e</a></td>
          </tr>
              <div class="collapse" id="content">
          <tr>
            <td colspan="5">
                asdfjalkdfj;alkdjfalk;jf;lkajd;alkf
            </td>
          </tr>
              </div>
          <tr>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>d</td>
            <td><a href="#one" data-toggle='collapse' data-target='#content'>e</a></td>
          </tr>
          <tr>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>d</td>
            <td><a href="#one" data-toggle='collapse' data-target='#content'>e</a></td>
          </tr>
        </table>

        


    </body>
</html>