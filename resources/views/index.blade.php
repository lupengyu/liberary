
<!DOCTYPE html>
<html>

<!-- Head -->
<head>

    <title>登录</title>

    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Meta-Tags -->

    <!-- Style --> <link rel="stylesheet" href="/static/css/style.css" type="text/css" media="all">



</head>
<!-- //Head -->

<!-- Body -->
<body>

<h1>B2图书馆管理系统</h1>

<div class="container w3layouts agileits">

    <div class="login w3layouts agileits">
        <h2>登 录</h2>
        <form role="form" method="post" enctype="multipart/form-data" action="{{url('/login')}}">
            <input type="text" Name="Userame" placeholder="用户名" required="" value="{{@$_COOKIE['name']}}">
            <input type="password" Name="Password" placeholder="密码" required="" value="{{@$_COOKIE['password']}}">
            <ul class="tick w3layouts agileits">
                <li>
                    <input type="checkbox" id="brand1" value="1" name="judge[]" checked="checked" >
                    <label for="brand1"><span></span>记住我</label>
                </li>
            </ul>
            <div class="send-button w3layouts agileits">
                <form>
                    <input type="submit" value="登 录"  onsubmit="location.href='zhuye.html'">
                </form>
            </div>
        </form>
        <a href="#">忘记密码?</a>

    </div>

    @if($warning != null)
        <?php
        echo "<script> alert('".$warning."') </script>";
        ?>
    @endif
    <div class="register w3layouts agileits">
        <h2>注 册</h2>
        <form role="form" method="post" enctype="multipart/form-data" action="{{url('/register')}}">
            <input type="text" Name="Name" placeholder="用户名" required="" maxlength="18">
            <input type="text" Name="Email" placeholder="邮箱" required="" maxlength="28">
            <input type="password" Name="Password" placeholder="密码" required=""  maxlength="18">
            <input type="text" Name="Phone_Number" placeholder="手机号码" required=""  maxlength="18">
            <div class="send-button w3layouts agileits">
                <form>
                    <input type="submit" value="立即注册">
                </form>
            </div>
        </form>
        <div class="clear"></div>
    </div>

    <div class="clear"></div>

</div>


</body>
<!-- //Body -->

</html>