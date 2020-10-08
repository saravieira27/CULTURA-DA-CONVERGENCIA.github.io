<?php 
include "php/base_class-bd.php";
$bd = new BD();

$listaImagens = $bd->consultar("files");
	$id=false;

?>
<!doctype html>
<html>
		

<head>
<meta charset="utf-8">
<title>AAA</title>
	<script type="text/javascript" src="jquery.js"></script>
 <script type="text/javascript" src="farbtastic.js"></script>
 <link rel="stylesheet" href="farbtastic.css" type="text/css" />
 <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#demo').hide();
    $('#picker').farbtastic('.color');
  });
 </script>
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
        margin-top: 100px;
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
        margin-top: 10px;
        
    }
    
    #graficos{
        float: left;
    }
    
    #bt_pag{
        margin-top: 100px;
        margin-left: auto;
        margin-right: auto;
       width: 30px;
     height: 30px;
 background-color: black;
        cursor:pointer;
    }
</style>
</head>

<body class="color" id="col">


    <div id="" style="text-align:center;" > <p>ESCOLHER COR DE FUNDO:</p> 

   <form method="post" action="" style="width: 195px;">
  <div class="form-item" ></div><div id="picker"></div>
	   <input type="hidden" class="color" name="color" value="#FFFFFF" />
	   <button type="submit" id='bt_pag' name='bt_pag'></button>
</form>

</div>
	<?php 
	
if(isset($_POST["bt_pag"])){
	$codigocor=$_POST["color"];
	$cor = trim($codigocor,"#");
	echo" <script>window.location = 'imagens.php?cor=".$cor."&load=0'</script>";
}else $cor="%23255255";
	?>
</body>
</html>
