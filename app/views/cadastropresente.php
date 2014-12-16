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
        <h2>Cadastro de Presente, lembrando que o valor do presente é de R$ 30 a R$ 50</h2>
        <div class="row">
                <div style="text-align: center">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" style="background-color: #E7E7E7">Nome produto</span>
                        <input name="produto" type="text" class="form-control" placeholder="Havaiana,Boné,Camisa">
                    </div>
                    <br>
                    <br>
                    <button class="btn btn-md btn-primary" type="button">Salvar</button>                   
                    <a href="/" class="btn btn-md btn-info" type="button">Voltar</a>                   
                </div>
                <br>
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