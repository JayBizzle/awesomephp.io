<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Awesome PHP - A curated list of amazingly awesome PHP libraries, resources and shiny things.</title>

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/simple-sidebar.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <div id="header-content-right">
                    <a href="/">Home</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    <a href="https://github.com/ziadoz/awesome-php" target="_blank">Contribute <i class="fa fa-github"></i></a>
                </div>
                <div id="header-content">Awesome PHP</div>
            </div>
            <div id="content">
                <div id="main">
                    {!! markdown($content) !!}
                </div>
                <div id="sidebar">
                    <ul class="sidebar-nav">
                        @foreach($menu as $item)
                            <li><a href="{{ preg_replace("/[^A-Za-z0-9]/", '-', $item) }}" @if($section == preg_replace("/[^A-Za-z0-9]/", '-', $item)) class="active" @endif>{{ $item }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="push"></div>
        </div>
        <div id="footer">
            <div id="footer-content">
                built with <i class="fa fa-heart"></i> by <a href="https://github.com/JayBizzle" target="_blank">JayBizzle</a>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
