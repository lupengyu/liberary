<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;/>
<title>Book Store Template, Free CSS Template, CSS Website Layout</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
    <meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
    <link href="/static/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body background="back/0.jpg">
<!--  网站模板 from www.cssmoban.com -->
<div id="templatemo_container">
    <div id="templatemo_menu">
        <ul>
            <li><a href="#"  class="current">书库</a></li>
            <li>   <div class="search"> <input class="textbox" id="searchstr" type="text" size="30" name="searchstr" />　
                    <input class="sbttn" id="search_btn" type="button" value="查找" />
                    </div>
            </li>
        </ul>
    </div> <!-- end of menu -->

    <div id="templatemo_header">
        <div id="templatemo_special_offers">
            <p>
                <span>25%</span> discounts for
                purchase over $80
            </p>
            <a href="#" style="margin-left: 50px;">Read more...</a>
        </div>


        <div id="templatemo_new_books">
            <ul>
                <li>Suspen disse</li>
                <li>Maece nas metus</li>
                <li>In sed risus ac feli</li>
            </ul>
            <a href="#" style="margin-left: 50px;">Read more...</a>
        </div>
    </div> <!-- end of header -->

    <div id="templatemo_content">



    </div> <!-- end of content left -->

    <h2>添加书籍</h2>
    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/backstage/addbookinformation')}}">
        <input type="text" Name="bookname" placeholder="书籍名" required="" maxlength="50">
        <input type="text" Name="anthor" placeholder="作者" required="32">
        <input type="text" Name="isdn" placeholder="ISDN" required="20">
        <input type="text" Name="data" placeholder="出版日期" required="" id="start_time1">
        <input type="text" Name="cnt" placeholder="数量" required="" value="">
        <script type="text/javascript" src="/static/time/laydate.dev.js"></script>
        <script type="text/javascript">
            laydate({
                elem: '#start_time1'
            });
        </script>
        <div class="newbutton">

            <input type="submit" value="添加"  onsubmit="location.href='zhuye.html'">
        </div>
    </form>


</div> <!-- end of content -->

</div> <!-- end of container -->
</body>
</html>


