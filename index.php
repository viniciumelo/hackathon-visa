
<!DOCTYPE html>
<html lang="en">
  <head>


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
			
											<a href="login.php">entrar</a>  | 
						
						
							<a href="cadastro.php">Cadastrar-se</a>
							</div>
			
                <img class="logo-topo" id="logo" alt="Packbuy"src="img/logo.png" class="img-default">
				
				
				
		</div>
		
	</div>
   <br>
   <br>
   
<?php 
require_once 'system/config.php';
require_once 'system/database.php';
?>

<div class="row" id="packbuy>
    

        
        


			
					
                

            <?php


            $posts = DBRead( 'produto', "WHERE status = 1 ORDER BY data DESC" );

            if( !$posts ){
                echo '<h2>Nenhuma produto encontrado!</h2>';
           } else{
			   
                foreach ( $posts as $post ):
                    
					$categ = DBRead( 'categoria', "WHERE id = '". $post['categoria'] ."'" );
                $categ = ( $categ ) ? $categ[0]['titulo'] : 'SEM CATEGORIA';
                ?>
				
		<div class="col-md-4" >
					<div class="thumbnail" >
                
                    <a href="produtos.php?id=<?php echo $post['id']; ?>" title="<?php echo $post['modelo']; ?>">
					<img src="<?php echo $post['foto']; ?>" alt="<?php echo $post['modelo']; ?>">
					<div class="caption">
							<h3>
								<?php echo $post['modelo']; ?>
							</h3>
							</a>
							<p align="center">
								R$:  <?php echo $post['preco']; ?>, 00
							</p>
							
                    </a>
                            

                
                
				</div>
				</div>
</div>

            <?php endforeach; 
                }
            ?>

</div>
</div>
</div>
    <?php include'includes/rodape.php';?>