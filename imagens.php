<?php 
include "php/base_class-bd.php";
$bd = new BD();


$lObj=$bd->consultar("temp");
$listaImagens = $bd->consultarTipo("img");
	$id=false;

	  $coo=$_GET['cor'] ;
if(isset($_GET['i'])){
	$num=$bd->contar($_GET['i']);
	
	if($num!=1){
	$bd->conct($_GET['i']);
	}
	
}

	
	if(isset($_POST["bt_pag"])){
		//$bd->del();
		echo "<script>window.location.href ='sons.php?cor=".$coo."';</script>";
		
	}
?>
<!doctype html>
<html>
		<!--<script src="js/java_01.js" type="text/javascript"></script>-->
<?php
    if(isset($_GET['load'])){
		if($_GET['load']==1){
		echo "<script>
	window.location.href = 'imagens.php?cor=".$coo."&load=0'</script>";
		//mudei o link
		}
	}
if(isset($_POST['bt-upload']))
{
    
	$pic = rand(1000,100000)."-".$_FILES['imagem']['name'];//Cria um nome aleatório para imagem de forma a prevenir substituições indesejadas
    $pic_loc = $_FILES['imagem']['tmp_name'];//Array que guarda a imagem publicada
	$folder="ficheiros/";//Pasta de destino da imagem
	if(move_uploaded_file($pic_loc,$folder.$pic))// Mais informações: http://php.net/manual/en/function.move-uploaded-file.php
	{
        
		
		$caminho = $folder.$pic;//Guarda numa variável uma composição do nome do ficheiro e a sua localização
		list($width, $height) = getimagesize($caminho);
		if($width<=200 || $height<=200){
			$bd->inserir($caminho,"img");
			echo "<script>;
	window.location.href = 'imagens.php?cor=".$coo."&load=1';
	
	
	</script>";
		}else {
			echo "<script>alert('Imagens demasiado grande ');</script>";
		}
		
		
    //mudei o link      alert('Imagem enviada')
             
	}
	else
	{
		?><script>alert('Alguma coisa correu mal... ');</script><?php
	}
    $id=false;
	
}
?>
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
        margin-top: 50px;
        
    }
    
    #graficos{
        margin-top: 60px;
        margin-left: 20px;
        float: left;
    }
    
    #pv{
       
        display: block;
    margin-left: auto;
    margin-right: auto;
       
    }
	#bt_pag{
        margin-top: 100px;
       
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
</style>
</head>

<body>

	
<!-- ---------------------um utilizador...------ -->
<!-- FALTAVA O METHOD E O ENCTYPE -->
	

<script>
   function previewFile(){
       var preview = document.querySelector('img'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }

  previewFile();  //calls the function named previewFile()
	
var fake=0;
	function imagens(i){
		fake=i;
		if(fake!=0){
			//document.getElementById('hide').innerHTML= fake;
		<?php
		echo "var num=parseInt(fake);
			var ref='imagens.php?cor=".$coo."&load=1&i='+num;";
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
	//document.getElementById("hide").innerHTML= fake;
	
</script>
<form id="input01" method="post" enctype="multipart/form-data"><!--input01= elementos de imagens-->
	
        <img id="pv" src="" >
		<div id="" style="text-align:center;"> <p>UPLOAD DE IMAGENS:</p> <div id="b"><b>Só pode ser realizado o upload de imagens em formato png, fundo transparente, com lado igual ou inferior a 200px</br></b><h5>(Porfavor não adicione imagens repetidas)</h5>  </div><br />
<input name="imagem" onchange="previewFile()" type="file" />
    <br />
<input type="submit" name="bt-upload" style="font-weight:bold" accept="image/x-png" value="UPLOAD"/>

</div>
</form>
    
	
<?php
    foreach($listaImagens as $img){
		
   echo "<div id='graficos' ><img id='img".$img['id']."' onclick='imagens(".$img['id'].")'  src=".$img['path']."  /><br></div>";
		foreach($lObj as $obj){
			if($obj['fk_file']==$img['id']){
				echo "<script>
		document.getElementById('img".$img['id']."').style.borderStyle= 'solid';
		document.getElementById('img".$img['id']."').style.borderColor= 'grey';
		document.getElementById('img".$img['id']."').style.borderWidth= 'thin';
	</script>";
			}
		}
    }
?>
	
	<form id="formu" method="post">
	<button id='bt_pag' type="submit" name='bt_pag'></button>
	</form>	
</body>
</html>
