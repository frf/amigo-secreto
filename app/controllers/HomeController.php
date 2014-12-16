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

}
