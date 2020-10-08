<?php 
include "php/base_class-bd.php";
$bd = new BD();

$lObj=$bd->consultar("temp");
$listaImagens = $bd->consultarTipo("img","files");
$listaSons = $bd->consultarTipo("sons","files");
$listaT= $bd->consultarTipo("txt","files");
	$id=false;

	  $coo=$_GET['cor'] ;

	if(isset($_POST["bt_pag"])){
		$bd->del();
		echo "<script>window.location.href ='index.php';</script>";
		
	}


?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>AAA</title>
	
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/base64.js"></script>
	<script src="js/canvas2image.min.js"></script>
	<script src="js/html2canvas.js"></script>
	
	<style>
        @font-face {
    font-family: Roboto-Light;
    src: url(fonts/Roboto/Roboto-Light.ttf);
}
     @font-face {
    font-family: Roboto-Regular;
    src: url(fonts/Roboto/Roboto-Regular.ttf);
}
        
		 .img{
        margin-top: 60px;
        margin-left: 20px;
        float: left;
			  z-index: 9;
		/*position: absolute;*/
    }
		.textos{
        margin-top: 60px;
        margin-left: 20px;
        float: left;
		padding:5px;
		/*border: thin solid grey;
		/*	position: absolute;*/
		z-index: 900;
    }
	.graficos{
        margin-top: 10px;
        margin-left: 30px;
        margin-right: 30px;
        float: left;
         width: 0;
     height: 0;
     border-right: 50px solid transparent;
     border-top: 100px solid transparent;
     border-left: 50px solid transparent;
     border-bottom: 100px solid black;
   
    }
	
		#final{
			position: fixed;
			top: 50px;
			left: 50px;
			width: 500px;
			height: 400px;
			border: solid thick black;
			z-index: -100;
		}
        
        #bt_pag{
        margin-top: 300px;
       
       width: 30px;
     height: 30px;
 background-color: black;
        cursor:pointer;
        
    }
         #formu{
        clear:left;
          display: flex;
  align-items: center;
  justify-content: center;
    }
        #dl{
               clear:left;
          display: flex;
  align-items: center;
  justify-content: center;
            margin-top: 20px;
            text-decoration: none;
            color: black;
            font-family: Roboto-Regular;
            font-size: 10px;
            letter-spacing: 2px;
        }

</style>
</head>

<body id="corpo">
	
	<script>
	document.getElementById("corpo").style.backgroundColor='<?php echo "#".$coo;?>';
	</script>
	<?php
	
	$i=1;
	$id1=0;
	foreach($lObj as $ob){
		$id1==$ob['fk_file'];
		foreach($listaImagens as $img){
			if($ob['fk_file']==$img['id']){
				echo "<div class='img' id='img".$i."' class='ui-widget-content' onclick='topo('img".$i."')'><img src='".$img['path']."'  /><br></div>";
					$i++;
				}
		}
	}
	
	
	
   
    $i=1;
	$id1=0;
	foreach($lObj as $ob){
		$id1==$ob['fk_file'];
		foreach($listaSons as $so){
			if($ob['fk_file']==$so['id']){
				echo "<audio id='audio".$i."' style='visibility:hidden;'>
				<source src='".$so['path']."'>
				</audio>";
				$i++;
			}
		}
	}
	$i=1;
	$id1=0;
	foreach($lObj as $ob){
		$id1==$ob['fk_file'];
		foreach($listaT as $te){
			if($ob['fk_file']==$te['id']){
				echo "<div class='textos' id='txt".$i."' class='ui-widget-content' >".$te['path']."  <br></div>";
				$i++;
			}
		}
	}
?>
	
	
	

    <form id="formu" method="post">
	<button id='bt_pag' type="submit" name='bt_pag'></button>
</form>
    <a id="dl" onclick="downloadPNG()" href="">DOWNLOAD</a>
</body>
</html>
<script>
	<?php  $i=1;
	$id1=0;
	foreach($lObj as $ob){
		$id1==$ob['fk_file'];
		foreach($listaSons as $so){
			if($ob['fk_file']==$so['id']){
				echo "
				var myAudio".$i." =document.getElementById('audio".$i."') ;
				myAudio".$i.".loop = true;
				myAudio".$i.".play();
				
	";//new Audio('someSound.ogg')
				$i++;
			}
		}
	}
	?>
	
	<?php 
	
	$i=1;
	foreach($listaImagens as $img){
		
   echo "$( function() {
    $( '#img".$i."' ).draggable();
  } );
  
  ";
		$i++;
    }
	$i=1;
	foreach($listaT as $img){
		
   echo "$( function() {
    $( '#txt".$i."' ).draggable();
  } );
  
  ";
		$i++;
    }

?>
	function topo(id){
		document.getElementById(id).style.zIndex+=1;
	}
downloadPNG = function () {
  html2canvas(document.body, {
    onrendered: function (canvas) {
      Canvas2Image.saveAsPNG(canvas);
    }
  });
}
</script>