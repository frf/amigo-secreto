<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
      <script>
        function sortear(id,amigo){
            alert(id);
            alert('Atenção você é: ' + amigo + '? Tem certeza ? Olhe lá hein !!');
        }
    </script>
  </head>
  <body>
    <div role="main" class="container theme-showcase">
        <div class="jumbotron" style="text-align:center; ">
        <h1>Amigo Oculto</h1>
        <p>Clique abaixo na <b style="text-transform: uppercase">sua foto</b> para sortear <b style="text-transform: uppercase">o seu amigo oculto.</b> Somos <?php echo count($amigos); ?> participantes.</p>
    </div>
          
          
          
         
          <div class="row">
            <?php foreach($amigos as $amigo){ ?>
            <div class="col-xs-6">
            <a href="/perfil/<?php echo $amigo->getId(); ?>" class="thumbnail">
                <?php echo $amigo->getNome(); ?>
                  <?php if($amigo->getFoto() == ""){ ?>
                        <img src="/images/" alt="<?php echo $amigo->getNome(); ?>">
                  <?php } else { ?>
                        <img src="/images/<?php echo $amigo->getFoto(); ?>.jpg" alt="">
                  <?php }  ?>
              </a>               
            </div>       
            <?php } ?>  
          </div>        
           
         
          
          
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    
  
  </body>
</html>