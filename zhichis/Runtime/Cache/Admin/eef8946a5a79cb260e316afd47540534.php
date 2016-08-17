<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <title>后台首页</title>
    <script src="http://localhost/lvnong/lvnong_item/lvnong/public/js/jquery-3.0.0.js"></script>
<script>
/*alert("1");
$(function(){
	alert("2");
	$("#an").click(function(){
		$("p").css("background-color","red");
	})
	
});
var traget =document.getElementById("user");
alert(traget);
if (traget.style.display == "none") {
	traget.style.display == "";
}else{
	traget.style.display == "none"
}*/
</script>
</head>
<frameset cols="*,1366,*" frameborder="no" border="0" framespacing="0">
<frame src="about:blank"></frame>
<frameset rows="130,*,60" border="0">
<frame src="header.html"  scrolling=no>
<FRAMESET cols="200,*">
  <FRAME name="frame_left" src="left.html" scrolling=no>
  <FRAME name="center" src="reght.html" scrolling=yes>
</FRAMESET>
<frame src="header.html"  scrolling=no>
</frameset>
<frame src="about:blank"></frame> 
</frameset>
<body>
	<p>无法支持FRAMESET模版，请更换浏览器！</p>
</body>
</html>