<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amigo Oculto Familhão</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
      <div role="main" class="container theme-showcase">
    <div class="jumbotron">
        <h1><?php echo $amigo->getNome(); ?></h1>
        <h3>Cadastro de mensagem de natal.</h3>
        <br>
        <div class="row">
            <form action="/salvarmensagem" method="post" role="form">
                <input name="idamigo" type="hidden" class="form-control" value="<?php echo $amigo->getId(); ?>">
                    <div class="form-group">
                        <label style="color:red" for="exampleInputPassword1">Mensagem</label>
                        <textarea name="mensagem" type="text" class="form-control"><?php echo $amigo->getMensagem(); ?></textarea>
                    </div>
                    <button class="btn btn-md btn-primary" type="submit">Salvar</button>                   
                    <a href="/" class="btn btn-md btn-info" type="button">Voltar</a>                   
                <br>
            </form>
        </div>
        
    </div>
          
          
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    
  
  </body>
</html>