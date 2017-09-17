<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Book Store Template, Free CSS Template, CSS Website Layout</title>
    <meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
    <meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
    <link href="/static/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body background="/static/back/0.jpg">
<!--  网站模板 from www.cssmoban.com -->
<div id="templatemo_container">
    <div id="templatemo_menu">
        <ul>
            <li><a href="#" class="current">主页</a></li>
            <li>
                <div class="search">
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/searchbook')}}">
                        <input class="textbox" id="searchstr" type="text" size="30" name="searchstr" />　
                        <input class="sbttn" id="search_btn" type="submit" value="查找" />
                    </form>
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
            <a href="" style="margin-left: 50px;">Read more...</a>
        </div>


        <div id="templatemo_new_books">
            <ul>
                <li>Suspen disse</li>
                <li>Maece nas metus</li>
                <li>In sed risus ac feli</li>
            </ul>
            <a href="" style="margin-left: 50px;">Read more...</a>
        </div>
    </div> <!-- end of header -->

    <div id="templatemo_content">



    </div> <!-- end of content left -->
    <?php
        $cnt = 0;
    ?>
    <div id="templatemo_content_right">
        @foreach($lists as $list)
            <?php
                if($cnt == 0) {
                    $cnt++;
                } else {
                    if($cnt == 2) {
                        $cnt = 0;
                    } else {
                        echo "<div class=\"cleaner_with_width\">&nbsp;</div>";
                    }
                }
            ?>
            <div class="templatemo_product_box">
                <h1>{{$list->bName}}  <span>(by {{$list->author}})</span></h1>
                <img src="/static/images/templatemo_image_01.jpg" alt="image" />
                <div class="product_info">
                    <p>ISBN {{$list->ISBN}}</br> 总数 {{$list->cnt}}</p>
                    <div class="buy_now_button"><a href="#">借阅</a></div>
                    <div class="detail_button"><a href="#">详细</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
            </div>
        @endforeach
    </div> <!-- end of content right -->

    {{$lists->links()}}
    <div class="cleaner_with_height">&nbsp;</div>
</div> <!-- end of content -->

</div> <!-- end of container -->
</body>
</html>