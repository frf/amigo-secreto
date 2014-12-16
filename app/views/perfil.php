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
    
      <script>
        function sortear(id,amigo){
            alert(id);
            alert('Atenção você é: ' + amigo + '? Tem certeza ? Olhe lá hein !!');
        }
    </script>
  </head>
  <body>
      <div role="main" class="container theme-showcase">
    <div class="jumbotron">
        <h1 style="text-align: center"><?php echo $amigo->getNome(); ?></h1>
        <h2 style="text-align: center"><?php echo $amigo->getMensagem(); ?> <a href="/cadastrarmensagem/<?php echo $amigo->getId(); ?>" class="btn btn-sm btn-primary" type="button">Editar Mensagem</a></h2>
        <div class="row">
              <div class="thumbnail">
                        <img src="/images/<?php echo $amigo->getFoto(); ?>.jpg" >
                         <ul class="list-group">
                        <?php if(count($presentes)){ foreach($presentes as $p){ ?>
                             <li class="list-group-item" style="text-align: center;font-size: 18px">
                                 <b><?php echo $p->getProduto(); ?></b>
                                 <a href="/excluirpresente/<?php echo $p->getId(); ?>" style="float: right" class="btn btn-sm btn-danger" type="button">Excluir</a>
                        </li>
                        <?php } }else{ ?>
                        <br>
                        <li class="list-group-item" style="text-align: center;font-size: 18px;color:red">
                                 <b>Nenhum presente cadastrado. Veja mais tarde.</b>
                        </li>
                        <?php } ?>
                    </ul>
              </div>
                <div style="text-align: center">
                    <?php if($amigo->getIdSorteado() == ""){ ?>
                    <a href="/sorteio/<?php echo $amigo->getId(); ?>" class="btn btn-md btn-success" type="button" >Eu sou <?php echo $amigo->getNome(); ?> e quero sortear meu amigo oculto</a>
                    <br>
                    <br>
                    <?php } ?>
                    <a href="/cadastrarpresente/<?php echo $amigo->getId(); ?>" class="btn btn-md btn-primary" type="button">Cadastrar Presente</a>
                    <br>
                    <br>      
                   <a href="/" class="btn btn-sm btn-info" type="button">Voltar</a>
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