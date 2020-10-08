<?php 
include "php/base_class-bd.php";
$bd = new BD();
$lObj=$bd->consultar("temp");
$listaTexto = $bd->consultarTipo("txt");
	$id=false;

	  $coo=$_GET['cor'] ;
if(isset($_GET['i'])){
	$num=$bd->contar($_GET['i']);
	
	if($num!=1){
	$bd->conct($_GET['i']);
	}
	
}
if(isset($_GET['load'])){
		if($_GET['load']==1){
		echo "<script>
	window.location.href = 'texto.php?cor=".$coo."&load=0';</script>";
		//mudei o link
		}
	}
if(isset($_POST['bt-upload'])){
	$bd->inserir($_POST['texto'],"txt");
	echo "<script>
	window.location.href = 'texto.php?cor=".$coo."&load=0';</script>";
		//mudei o link
		
}
	if(isset($_POST["bt_pag"])){
		//$bd->del();
		echo "<script>window.location.href ='sons.php?cor=".$coo."';</script>";
		
	}
//
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
    
    
	
	body{
		
        font-family: Roboto-Light;
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
        margin-top: -50px;
        
    }
    
    .textos{
        margin-top: 60px;
        margin-left: 20px;
        float: left;
		padding:5px;
		/*border: thin solid grey;*/
    }
    .graficos{
      width: 30px;
     height: 30px;
 background-color: black;
        cursor:pointer;
       clear:left;
          margin-left: auto;
        margin-right: auto;
        border-radius: 2px;
    }
    
    #floatbreak{
        clear: both;
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
    
     #formu{
       margin-top: 60px;
    }
    
   
</style>
	<script>
	
var fake=0;
	function text(i){
		fake=i;
		if(fake!=0){
			//document.getElementById('hide').innerHTML= fake;
		<?php
		echo "var num=parseInt(fake);
			var ref='texto.php?cor=".$coo."&load=1&i='+num;";
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
	function final(){
		<?php
		echo "window.location.href ='conposiao.php?cor=".$coo."';";
		
		?>
	}
</script>
</head>

<body>
	<h1>hello world!!!!</h1>
	<form id="input01" method="post" enctype="multipart/form-data"><!--input01= elementos de text-->
	
		<div id="texti" style="text-align:center;"> <p>TEXTO:</p> <div id="b"><b>Escreva algumas palavras ou conceitos inspiradores que se relacionem ou não com os restantes elementos.</b><h5>(Maximo 20 carateres)</h5>  </div><br />
<input name="texto" type="text">
    <br />
<input type="submit" name="bt-upload" style="font-weight:bold" value="UPLOAD">
    
</div>
</form>
	<?php
    foreach($listaTexto as $te){
		
   echo "<div class='textos' id='te".$te['id']."' onclick='text(".$te['id'].")'>".$te['path']."  <br></div>";
		foreach($lObj as $obj){
			if($obj['fk_file']==$te['id']){
				echo "<script>
		document.getElementById('te".$te['id']."').style.borderStyle= 'solid';
		document.getElementById('te".$te['id']."').style.borderColor= 'grey';
		document.getElementById('te".$te['id']."').style.borderWidth= 'thin';
	</script>";
			}
		}
    }
?>
    <div id="floatbreak"></div>
	<div id="formu" class='graficos' onClick="final()"></div>
</body>
</html>