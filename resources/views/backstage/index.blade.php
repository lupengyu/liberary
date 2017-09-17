<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html" ;/>
    <title>Book Store Template, Free CSS Template, CSS Website Layout</title>
    <meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
    <meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
    <link href="/static/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>

<body background="back/0.jpg">
<!--  ��վģ�� from www.cssmoban.com -->
<div id="templatemo_container">
    <div id="templatemo_menu">
        <ul>
            <li><a href="#">书库</a></li>
            <li>
                <form role="form" method="post" enctype="multipart/form-data" action="{{url('/backstage/searchbook')}}">
                    <div class="search"> <input class="textbox" id="searchstr" type="text" size="30" name="searchstr" />
                        <input class="sbttn" id="search_btn" type="submit" value="查找" />
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <!-- end of menu -->

    <div id="templatemo_header">
        <div id="templatemo_special_offers">
            <p>
                <span>25%</span> discounts for purchase over $80
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
    </div>
    <!-- end of header -->

    <div id="templatemo_content">



    </div>
    <!-- end of content left -->
    <div class="newbutton"><a href="{{url('backstage/addbook')}}">添加图书</a></div>

    <div id="templatemo_content_right">
        <table class="table">
            <thead>
            <tr>
                <th>图书名</th>
                <th>&nbsp;作者&nbsp;</th>
                <th>&nbsp;&nbsp;出版日期&nbsp;&nbsp;</th>
                <th>&nbsp;&nbsp;出版号&nbsp;&nbsp;</th>
                <th>&nbsp;数量&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lists as $list)
                <tr>
                    <td>{{$list->bName}}</td>
                    <td>{{$list->author}}</td>
                    <td>{{$list->data}}</td>
                    <td>{{$list->ISBN}}</td>
                    <td>{{$list->cnt}}</td>
                    <td>
                        <div class="newbutton"><a href="#">del</a></div>
                    </td>
                </tr>
            @endforeach
            <tr>

            </tr>

            </tbody>

        </table>

    </div>
    {{$lists->links()}}
    <!-- end of content -->

</div>
<!-- end of container -->
</body>

</html>