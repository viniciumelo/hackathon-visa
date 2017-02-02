
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
			
			
                <img class="logo-topo" id="logo" alt="Packbuy"src="img/logo.png" class="img-default">
				
				

		</div>
		
	</div>
   <br>
   <br>

<?php

require_once 'system/config.php';
require_once 'system/database.php';

if( !isset( $_GET['id'] ) || empty( $_GET['id'] ) )
    header('Location: index.php');
else {

    $id     = DBEscape( strip_tags( trim( $_GET['id'] ) ) );
    $post   = DBRead( 'produto', "WHERE id = '{$id}' LIMIT 1" );

    if( $post ){

        $post = $post[0];

        $upVisitas = array(
            'viws' => $post['viws'] + 1
            );

        DBUpDate( 'produto', $upVisitas, "id = '{$id}'" );

    }

}

?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        

            <?php if( $post ): ?>
   
          
            

                <div class="col-md-8" >
                    <img class="img-responsive" src="<?php echo $post['foto']; ?>" alt="<?php echo $post['modelo']; ?>">
                    </div>
					
					<div class="col-md-4">
					<div class="caption">
							<h2>
							
                <?php echo $post['modelo']; ?>
            </h2>
							
							<p>
							<H2>
							
							</H2>
							</p>
							R$: <?php echo $post['preco']; ?>,00
							
							<p>
							
</p>
<p>
<div class="form-group">
  <label class="control-label" for="tamanho">Tamanho</label>
  <div class="col-md-4">
    <select id="tamanho" name="tamanho" class="form-control">
      
      <option value="1">P</option>
	  <option value="2">M</option>
	  <option value="3">G</option>
	  <option value="4">GG</option>
	  
    </select>
  </div>
</div>

</P>
<!-- Text input-->
<div class="form-group">
  <label class="control-label" for="qtd">Quantidade</label>  
  <div class="col-md-8">
  <input id="quantidade" name="quantidade" type="text" placeholder="" class="form-control input-md" required="" value="1">
    
  </div>
</div>

<P>
								<a class="btn btn-success" href="carrinho.php?id=<?php echo $post['id']; ?>">Comprar</a> 	

								</p>
								<br>
								</form>
								Referência: 2016hw<?php echo $post['id']; ?>
								
								<br>
								<a href="index.php">Continuar Comprando</a>
						</div>
				</div>
				
                
			</div>
		</div>
	</div>
	
<h3>Descrição: </h3>
<br>
<div class="jumbotron">
DESCRIÇÃO DO PRODUTO
<br>
<br>
                
               
                    <?php echo nl2br( $post['descricao'] ); ?>
                
            <?php endif; ?>
           

  

       

            

</div>
    <?php include'includes/rodape.php';?>