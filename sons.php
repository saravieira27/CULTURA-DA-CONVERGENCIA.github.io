<?php 
include "php/base_class-bd.php";
$bd = new BD();

$listaSons = $bd->consultarTipo("sons");
	$id=false;

	  $coo=$_GET['cor'] ;

	
	if(isset($_POST["bt_pag"])){
		//$bd->del();
		echo "<script>window.location.href ='conposiao.php?cor=".$coo."';</script>";
		
	}

if(isset($_POST['bt-upload']))
{
    
	$pic = rand(1000,100000)."-".$_FILES['imagem']['name'];//Cria um nome aleatório para imagem de forma a prevenir substituições indesejadas
    $pic_loc = $_FILES['imagem']['tmp_name'];//Array que guarda a imagem publicada
	$folder="ficheiros/";//Pasta de destino da imagem
	if(move_uploaded_file($pic_loc,$folder.$pic))// Mais informações: http://php.net/manual/en/function.move-uploaded-file.php
	{
        
		
		$caminho = $folder.$pic;//Guarda numa variável uma composição do nome do ficheiro e a sua localização
		
			$bd->inserir($caminho,"sons");
		echo "<script>;
	window.location.href = 'sons.php?cor=".$coo."&load=1';
	
	
	</script>";
		
		
		
    //mudei o link      alert('Imagem enviada')
             
	}
	else
	{
		?><script>alert('Alguma coisa correu mal... ');</script><?php
	}
    $id=false;
	
}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>AAA</title>
 
 <style>
	   @font-face {
    font-family: Roboto-Light;
    src: url(fonts/Roboto/Roboto-Light.ttf);
}
     @font-face {
    font-family: Roboto-Regular;
    src: url(fonts/Roboto/Roboto-Regular.ttf);
}
    
    
	
    
    #logo{
        margin-top: 70px;
        margin-left: auto;
        margin-right: auto;
        background-color: pink;
        width: 600px;
        padding: 30px;
    }
    
    h1{
        font-size: 50px;
       text-align:right;
        color:white;
        letter-spacing: 5px;
        font-family: Roboto-Light;
        line-height: 35px;
    }
    
    h2{
        text-align: center;
        font-family: Roboto-Regular;
        margin-top: 40px;
        letter-spacing: 4px;
        font-size: 16px;
        
    }
    
    p{
       
        font-family: Roboto-Regular;
        letter-spacing: 4px;
        font-size: 16px; 
        margin-bottom: -5px;
    }
    
     b{
       
        font-family: Roboto-Light;
        font-size: 14px; 
        line-height: 22px;
    
    }
    
     #b{
       
        margin-top: 15px;
        margin-bottom: 5px;
    }
    
    input{
        margin-bottom: 10px;
        
    }
    
    #input01{
         background-color: black;
        color: white;
        margin-left: auto;
        margin-right: auto;
        width: 300px;
        padding: 30px;
        margin-top: 50px;
        
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
     
    
    
    #pv{
       
        display: block;
    margin-left: auto;
    margin-right: auto;
       
    }
	#bt_pag{
        margin-top: 100px;
        margin-left: auto;
        margin-right: auto;
       width: 0;
     height: 0;
     border-right: 17px solid transparent;
     border-top: 30px solid transparent;
     border-left: 17px solid transparent;
     border-bottom: 30px solid ;
    }
    </style>

</head>

<body>
		<form id="input01" method="post" enctype="multipart/form-data">
	

<script>
		
var fake=0;
	function sons(i){
		fake=i;
		if(fake!=0){
			
		<?php
		echo "var num=parseInt(fake);
			var ref='texto.php?cor=".$coo."&load=0&i='+num;";
		$iii="ref";
			if(isset($iii)){
				$bd->conct($iii);
				echo "
				console.log($iii);
				
				window.location.href =".$iii.";";
			}
			
		?>
	}
	}
  </script>
		<div id="" style="text-align:center;"> <p>UPLOAD DE SONS:</p> <div id="b"><b>Só pode ser realizado o upload de sons em formato mp3 com menus de 2mB </b> </br><b>(Nome do som sem espaços ou carateres especiais)</b></div><br />
<input name="imagem"  type="file" />
    <br />
<input type="submit" name="bt-upload" style="font-weight:bold" accept="audio/x-mpeg" value="UPLOAD"/>

</div>
</form>
    
    <?php
    foreach($listaSons as $so){
		
   echo "<div class='graficos' id='hoverElement".$so['id']."' onclick='sons(".$so['id'].")'></div>
   <audio id='audio".$so['id']."' style='visibility:hidden;'>
<source src=".$so['path'].">
</audio>";
    }
?>
    <!--	<div   onclick='sons(".$img['id'].")' class="graficos"></div>
    <div id="hoverElement1"  onclick='imagens(".$img['id'].")' class="graficos"></div>
<audio id=audio style="visibility:hidden;">
<source src="sons/som1.mp3">
</audio>
    <audio id=audio1 style="visibility:hidden;">
<source src="sons/som2.mp3">
</audio>-->
    
	<script>
		 <?php
		$i=1;
    foreach($listaSons as $so){
		
   echo "
   var hoverArea".$so['id']." = document.getElementById('hoverElement".$so['id']."');
  
	var audio".$so['id']." = document.getElementById('audio".$so['id']."');
	hoverArea".$so['id'].".onmouseover= function(){
		audio".$so['id'].".play();
	}
	hoverArea".$so['id'].".onmouseout= function(){
		audio".$so['id'].".pause();
	} ";  
   
		$i++;
    }
?>/*
	var hoverArea = document.getElementById('hoverElement');
    var hoverArea1 = document.getElementById('hoverElement1');
	var audio = document.getElementById('audio');
    var audio1 = document.getElementById('audio1');
	
    hoverArea.onmouseover= function(){
		audio.play();
	}
	hoverArea.onmouseout= function(){
		audio.pause();
	}    
    
    hoverArea1.onmouseover= function(){
		audio1.play();
	}
	hoverArea1.onmouseout= function(){
		audio1.pause();
	}  */  
    </script>
   
</body>
</html>