
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php  
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['email']);
	unset($_SESSION['senha']);
	header('location:index.php');
	}

$logado = $_SESSION['email'];
?>

  	  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9303490577411539",
    enable_page_level_ads: true
  });
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Packbuy</title>

   
    <meta name="Vinicius Melo" content="Packbuy">
    
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/customCss.css" rel="stylesheet">
	
	    <script src="css/bootstrap.min.js"></script>
	<script type="text/javascript">

      $(document).ready(function(){
         $window = $(window);
         $('section[data-type="background"]').each(function(){
           var $scroll = $(this);                 
            $(window).scroll(function() {
              var yPos = -($window.scrollTop() / $scroll.data('speed')); 
               var coords = '50% '+ yPos + 'px';
              $scroll.css({ backgroundPosition: coords });    
            });
         });  
      }); 
      </script>



  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
    
		<div class="col-md-12">
			
			<br>
			<br>
			<br>
			<div align="right">
			<?php 
	echo" Bem vindo $logado";
	?>
											<a href="sair.php">sair</a>  | 
						
						
							<a href="pedidos.php">Meus Pedidos</a>
							</div>
			<a href="www.prohelloworld.com.br">
                <img class="logo-topo" id="logo" alt="Packbuy"src="img/logo.png" class="img-default">
				</a>
				
				<div align="right" >
				

						
				<button class="btn btn-warning responsive" align="left" action="carrinho.php" >
				<span class="glyphicon glyphicon-shopping-cart"></span>
				Carrinho 
				<span class="badge">0</span>
			</button>
			</div>
		</div>
		
	</div>
   