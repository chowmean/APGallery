<!--
========================================APGallery===================================================================


APGallery : Picture gallery with different appearance functionality.
Clone github: https://www.github.com/chowmean/APGallery.git 



author : chowmean
mail: gaurav.dev.iiitm@gmail.com
github: github.com/chowmean
linkedin: linkedin.com/in/chowmean
fb: facebook.com/chowmean
Date: 2/7/14

-->



<body>
<script type="text/javascript" src="jQueryRotate.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jQueryRotateCompressed.js"></script>
<script type="text/javascript" src="jquery.easing.min.js"></script>

<script>

var rotate=1;           //to allow rotate
var active=59;
var angle = 720;		//angle to rotate give multiple of 360 for straight images
var interval=8000;		//time interval after which pictures change
var showimage = function(a){


if(a=="next")
a=active+1;
if(a=="back")
a=active-1;
if(a!=active){

	if(rotate==1)
	{$("#"+active).rotate({ 
    animateTo:angle});}
       
	$('#'+active).animate({
    left:(parseInt(active%10)*10)+"%",
	top:+(parseInt(active/10)*10)+"%",
	height:'10%',
	width:'10%'
	},800);
	
	
	
	
    $('#'+a).animate({
    left:'0%',
	top:'0%',
	height:'60%',
	width:'100%'
	},800);
	
	active=a;
	}
}

var automatic= function(a)
{

setTimeout(automatic,interval);
var b=Math.random();
b=parseInt(60+b*40);
showimage(b);
}

automatic();                            //comment this line to stop changing automatically

</script>


<?php 






function readDirectory()
{
$dir="images";
$files = scandir($dir);
	$count=59;
	while($count<100){
	foreach($files as $file=>$name)
	{
	if($count<100){
	$t= explode(".",$name);
	if(isset($t[1]))
	{if($t[1]=='jpg' || $t[1]=='jpeg' || $t[1]=='png' || $t[1]=='gif'){
	
	if($count==59)
	{
	print "<div id='".$count."' style='position:absolute;top:0%;left:0%;height:60%;width:100%;'><img  src='".$dir."/".$name."' style='height:100%;width:100%;' ></img></div>\n";$count++;
	}
	
	else{
	print "<div id='".$count."' onclick='showimage(".$count.")' style='position:absolute;top:".((int)($count/10)*10)."%;left:".(($count%10)*10)."%;height:10%;width:10%;'><img  src='".$dir."/".$name."' style='height:100%;width:100%;' ></img></div>\n";$count++;
	
	
	
	
	
		}
		}
		
	}
	}
	}
	}
	
	
	
}



readDirectory();
?>
<div id="next" class="cla" style="width:10%;height:30%;position:absolute;top:10%;right:0%;background:url('next.png');background-size:100% 100%;" onclick='showimage("next")'>
</div>
<div id="back" class="cla" style="width:10%;height:30%;position:absolute;top:10%;left:0%;background:url('back.png');background-size:100% 100%;" onclick='showimage("back")'>
</div>

</body>
<style>
.cla{
opacity:0.6;}
.cla:hover
{opacity:1;
}

body
{
overflow-x:hidden;
overflow-y:hidden;
}
</style>





