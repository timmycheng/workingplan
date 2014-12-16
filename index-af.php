<!DOCTYPE HTML>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no"> -->
        <title>工作计划 V0.1</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Javascript -->
        <script src="js/jquery.min.js"></script>
	</head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h1>工作计划<small>V0.1</small></h1>
                </div>
                <div class="col-md-4">
                    <form action="source/login.php" method="post" id="login" class="form-inline">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="用户名" id="usrname" name="usrname">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="password" placeholder="密码" id="pasword" name="pasword">
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="登陆">
                        </div>                                                                         
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form class='form-horizontal' id='index_form' action='source/looks_up.php' method='post'>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input class='form-control' type='text' name='input_ip_addr' id='input_ip_addr' placeholder='请输入IP'/>
                            </div>
                            <div class="col-md-2">
                                <input class='btn btn-primary ' type='submit' value='搜索' />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
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

    </body>
</html>