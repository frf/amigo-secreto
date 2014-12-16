<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello',array('amigos' => Base\AmigoQuery::create()->orderByNome()->find()));
	}
	public function showPerfil($id)
	{
		return View::make('perfil',array('amigo' => Base\AmigoQuery::create()->findOneById($id),
                                                'presentes'=>  Base\PresenteQuery::create()->findBy("IdAmigo", $id)));
	}
	public function showCadastroPresente($id)
	{
            return View::make('cadastropresente',array('amigo' => Base\AmigoQuery::create()->findOneById($id),
                                                'presentes'=>  Base\PresenteQuery::create()->findBy("IdAmigo", $id)));
	}
	public function showCadastroMensagem($id)
	{
            return View::make('cadastromensagem',array('amigo' => Base\AmigoQuery::create()->findOneById($id),
                                                'presentes'=>  Base\PresenteQuery::create()->findBy("IdAmigo", $id)));
	}
	public function showSorteio($id)
	{
            return View::make('sorteio',array('amigo' => Base\AmigoQuery::create()->findOneById($id),
                                                'presentes'=>  Base\PresenteQuery::create()->findBy("IdAmigo", $id)));
	}
        public function showSortear()
	{
            $method = Request::method();
            
            $idamigo = Input::get('idamigo');
              
            if (Request::isMethod('post'))
            {

              $resultsTest = DB::select("select * from amigo where id_sorteado ISNULL AND id = " . $idamigo);
              
              if($resultsTest){
                $dataSorteio       = date('Y-m-d H:i:s');
                $dataExibirSorteio = date('d/m/Y H:i');
                
                //$results = DB::select('select * from amigo where id_sorteado isNull and id  <> ' . $idamigo . ' order by random() limit 1');
                $results = DB::select('SELECT id
                                        FROM amigo as  a1
                                        WHERE NOT EXISTS (SELECT 1 FROM amigo as a2 WHERE a2.id_sorteado = a1.id AND id <> ' . $idamigo . ') AND id <> ' . $idamigo . ' '
                        . '             order by random() limit 1');

                $amigo = Base\AmigoQuery::create()->findOneById($idamigo);
                $amigo->setIdSorteado($results[0]->id);
                $amigo->setDtSorteio($dataSorteio);
                $amigo->save();

                $amigoSorteado = Base\AmigoQuery::create()->findOneById($results[0]->id);
                
                return View::make('sorteado',array('amigo' => $amigoSorteado, 
                                               'dataSorteio'=>$dataExibirSorteio
                            )
                        );
              }else{
                  return View::make('sorteadoerro');
              }
              
            }
            
	}
        public function showSalvarMensagem()
	{
            $method = Request::method();
            
            $mensagem = Input::get('mensagem');
            $idamigo = Input::get('idamigo');
              
            if (Request::isMethod('post'))
            {
              $oA = Base\AmigoQuery::create()->findOneById($idamigo);
              
              if($mensagem != ""){
                $oA->setMensagem($mensagem);
                $oA->save();
              }
              
              return Redirect::to('/perfil/'.$idamigo);
            }
            
            return Redirect::to('/perfil/'.$idamigo);
	}
	public function showSalvarPresente()
	{
            $method = Request::method();
            
            $produto = Input::get('produto');
            $idamigo = Input::get('idamigo');
              
            if (Request::isMethod('post'))
            {
              
              $oP = new Presente();
              $oP->setIdamigo($idamigo);
              $oP->setProduto($produto);
              $oP->save();
              
              return Redirect::to('/perfil/'.$idamigo);
            }
            
            return Redirect::to('/perfil/'.$idamigo);
	}
	public function showExcluirPresente($id)
	{
            if($id != ""){
                $oPresente = Base\PresenteQuery::create()->filterById($id)->findOne();
                $idUser = $oPresente->getIdamigo();
                $oPresente->delete();
                return Redirect::to('/perfil/'.$idUser);
            }else{
                return Redirect::to('/perfil/'.$idUser);
            }
	}

}
