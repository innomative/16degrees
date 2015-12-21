<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>16度</title>
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="css/swiper.min.css">
  	<link rel="stylesheet" href="css/animate.css">
  	<link href="css/style.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/swiper.jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/responsive-nav.min.js"></script>
  	<script src="js/dsProgram.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 </head>

<body>
<div class="" id="nav">

	<ul class="list-unstyled">
	    <li class="nav_menu"><a href="#">关于我们</a></li>
	    <li class="nav_menu"><a href="#">新闻资讯</a></li>
	    <li class="nav_menu"><a href="#">产品目录</a></li>
	    <li class="nav_menu"><a href="#">客户服务</a></li>
	    <li class="nav_menu"><a href="#">品牌形象</a></li>
	    <li class="nav_menu"><a href="#">联系我们</a></li>
    </ul>
	<div class="op_layer"></div>
</div>
<script>
	var navigation = responsiveNav("#nav", { // Selector: The ID of the wrapper
	  animate: true, // Boolean: 是否启动CSS过渡效果（transitions）， true 或 false
	  transition: 400, // Integer: 过渡效果的执行速度，以毫秒（millisecond）为单位
	  //label: "Menu", // String: Label for the navigation toggle
	  insert: "toggle", // String: Insert the toggle before or after the navigation
	  customToggle: "", // Selector: Specify the ID of a custom toggle
	  openPos: "fixed", // String: Position of the opened nav, relative or static
	  jsClass: "de", // String: 'JS enabled' class which is added to <html> el
	  debug: true, // Boolean: Log debug messages to console, true 或 false
	  init: function(){

	  }, // Function: Init callback
	  open: function(){}, // Function: Open callback
	  close: function(){} // Function: Close callback
	});
</script>