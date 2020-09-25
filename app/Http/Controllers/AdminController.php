<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Peso;
use App\Pagina;
use App\Atividade;
use App\Categoria;
use App\Medalhas;
use App\DesafioUser;
use Auth;
use Yajra\Datatables\Datatables;
use Session;
use DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
	public function index()
	{
		//$atividades = Atividade::where('user_id', Auth::id())->orderBy('created_at','desc')->get();
        //dd($atividades);
		return view('admin.dashboard');
	}

	public function arquivos()
	{
		return view('admin.listaArquivos');
	}
	public function getPaginas(Request $request)
	{
		if ($request->ajax()) {
			$lista = Pagina::all();
			return Datatables::of($lista)
			->addColumn('categoria', function ($lista) {
				return ($lista->categoria->nome);
			})
			->addColumn('autor', function ($lista) {
				return ($lista->dono->nome);
			})
			->addColumn('ultimo_editor', function ($lista) {
				return ($lista->ultimo_editor->nome);
			})
			->addColumn('action', function($lista) {
				return '<a class="btn btn-primary btn-flat" href="'.route('editarPagina',$lista->id).'"><span class="fa fa-edit"></span>Editar</a>';
			})->make(true);
		}
		return view('admin.listaPaginas');
	}

	public function novaPagina($id = null)
	{
		if($id != null){
			$pagina = Pagina::find($id)->getAttributes();
			if(empty($pagina)){
				return redirect()->back()->with('error', 'Erro pagina não existe!');
			}
			foreach ($pagina as $key => $value) {
				Session::flash('_old_input.'.$key, $value);
			}	
			return view('admin.novaPagina', compact('id',$id));	
		}
		return view('admin.novaPagina');
	}

	public function salvaPagina(Request $request)
	{
		$rules = [
			'categoria_id'=> 'required', 
			'submenu'	=> 'required', 
			'titulo'	=> 'required',
			'descricao'	=> 'required',
			'conteudo'	=> 'required',
		];
		$mensagens = [
		];
		$this->validate($request, $rules, $mensagens);
		if ($request->id != ""){
			$pagina = Pagina::find($request->id);
			if(empty($pagina)){
				return redirect()->route('Paginas')->with('error', 'Erro ao editar!');
			}else{
				$pagina->update([
					'titulo' => $request->titulo,
					'submenu' => $request->submenu,
					'categoria_id' => $request->categoria_id,
					'descricao' => $request->descricao,
					'conteudo' => $request->conteudo,
					'ultimo_editor_id' => Auth::id(),
				]);

				return redirect()->route('Paginas')->with('success', 'Pagina salva com sucesso!');
			}
		}else{
			$pagina = Pagina::create([
				'titulo' => $request->titulo,
				'submenu' => $request->submenu,
				'categoria_id' => $request->categoria_id,
				'descricao' => $request->descricao,
				'conteudo' => $request->conteudo,
				'ultimo_editor_id' => Auth::id(),
				'criador_id' => Auth::id(),
			]);
			return redirect()->route('Paginas')->with('success', 'Pagina criada com sucesso!');
		}
	}

	public function getMedalhas(Request $request)
	{	
		if ($request->ajax()) {
			$lista = Medalhas::with('dono');
			return Datatables::of($lista)			
			->addColumn('usuario', function ($lista) {
				return $lista->dono->nome;
			})
			->addColumn('action', function($lista) {
				return '<a class="btn btn-primary btn-flat" href="'.route('editarMedalha',$lista->id).'"><span class="fa fa-edit"></span>Editar</a><br><a class="btn btn-primary btn-flat" href="'.route('verUsuariosDesafio',$lista->id).'"><span class="fa fa-users"></span>Participantes</a>';
			})
			->make(true);
		}
		return view('admin.listaMedalhas');
	}

	public function verUsuariosDesafio(Request $request)
	{	
		if(isset($request->id)){
			if ($request->ajax()) {
				$lista = DesafioUser::with('user')->where('medalha_id',$request->id);
				return Datatables::of($lista)->make(true);
			}
			return view('admin.listaUsersDesafio')->with('id',$request->id);
		}

	}

	public function novaMedalha($id = null)
	{
		if($id != null){
			$medalha = Medalhas::where('id',$id)->first();
			$pagina = $medalha->getAttributes();

			if(empty($pagina)){
				return redirect()->back()->with('error', 'Erro medalha não existe!');
			}
			foreach ($pagina as $key => $value) {
				Session::flash('_old_input.'.$key, $value);
			}	
			return view('admin.novaMedalha')->with('id',$id)->with('medalha',$medalha);	
		}
		return view('admin.novaMedalha');
	}

	public function salvaMedalha(Request $request)
	{
		$rules = [
			'nome'      	=> 'required', 
			'tipo_atividade'      	=> 'required', 
			'tipo'      	=> 'required', 
			'imagem' 		=> 'required',
			'texto' 		=> 'nullable|max:300',
			'ativo' 		=> 'required',
			'quantidade' 	=> 'required|numeric|min:1',
		];
		$mensagens = [
		];

		$this->validate($request, $rules, $mensagens);
		if ($request->id != ""){
			$pagina = Medalhas::find($request->id);

			if(empty($pagina)){
				return redirect()->route('Medalhas')->with('error', 'Erro ao editar!');
			}else{
				$pagina->update([
					'ativo' => $request->ativo,
					'nome' => $request->nome,
					'slug' => str_slug($request->nome, '-'),
					'tipo' => $request->tipo,
					'tipo_atividade' => $request->tipo_atividade,
					'periodo_inicio' => $request->periodo_inicio,
					'periodo_fim' => $request->periodo_fim,
					'imagem' => $request->imagem,
					'img_confirmacao' => $request->img_confirmacao,
					'texto' => $request->texto,
					'descricao_completa' => $request->descricao_completa,
					'quantidade' => $request->quantidade,
				]);

				return redirect()->route('Medalhas')->with('success', 'Medalha salva com sucesso!');
			}
		}else{
			$pagina = Medalhas::create([
				'ativo' => $request->ativo,
				'nome' => $request->nome,
				'slug' => str_slug($request->nome, '-'),
				'tipo' => $request->tipo,
				'tipo_atividade' => $request->tipo_atividade,
				'imagem' => $request->imagem,
				'img_confirmacao' => $request->img_confirmacao,
				'periodo_inicio' => $request->periodo_inicio,
				'periodo_fim' => $request->periodo_fim,
				'texto' => $request->texto,
				'descricao_completa' => $request->descricao_completa,
				'quantidade' => $request->quantidade,
				'criador_id' => Auth::id(),
			]);
			return redirect()->route('Medalhas')->with('success', 'Medalha criada com sucesso!');
		}
	}

	public function getCategorias(Request $request)
	{
		if ($request->ajax()) {
			$lista = Categoria::all();
			return Datatables::of($lista)			
			->addColumn('menu', function ($lista) {
				return ($lista->menu == '1' ? 'Sim' : 'Não');
			})
			->addColumn('action', function($lista) {
				return '<a class="btn btn-primary btn-flat" href="'.route('editarCategoria',$lista->id).'"><span class="fa fa-edit"></span>Editar</a>';
			})
			->make(true);
		}
		return view('admin.listaCategorias');
	}
	public function novaCategoria($id = null)
	{
		if($id != null){
			$categoria = Categoria::find($id)->getAttributes();
			if(empty($categoria)){
				return redirect()->back()->with('error', 'Erro categoria não existe!');
			}
			foreach ($categoria as $key => $value) {
				Session::flash('_old_input.'.$key, $value);
			}	
			return view('admin.novaCategoria', compact('id',$id));	
		}
		return view('admin.novaCategoria');
	}
	
	public function salvaCategoria(Request $request)
	{
		$rules = [
			'nome'      			=> 'required', 
			'menu' 		=> 'required',
		];
		$mensagens = [
		];
		$this->validate($request, $rules, $mensagens);
		if ($request->id != ""){
			$pagina = Categoria::find($request->id);
			if(empty($pagina)){
				return redirect()->route('Categorias')->with('error', 'Erro ao editar!');
			}else{
				$pagina->update([
					'nome' => $request->nome,
					'menu' => $request->menu,
					'ordem' => $request->ordem,
					'criador_id' => Auth::id(),
				]);

				return redirect()->route('Categorias')->with('success', 'Categoria salva com sucesso!');
			}
		}else{
			$pagina = Categoria::create([
				'nome' => $request->nome,
				'menu' => $request->menu,
				'ordem' => $request->ordem,
				'criador_id' => Auth::id(),
			]);
			return redirect()->route('Categorias')->with('success', 'Categoria criada com sucesso!');
		}
	}
	public function getUsuarios(Request $request)
	{
		if ($request->ajax()) {
			$lista = User::query();
			return Datatables::of($lista)
			->addColumn('dias', function ($lista) {
				return Atividade::contaDias($lista->id);
			})
			->addColumn('pesoAtual', function ($lista) {
				return $lista->peso($lista->id);
			})
			->addColumn('action', function($lista) {
				return '<a class="btn btn-primary btn-flat" href="'.route('removeUser',$lista->id).'"><span class="fa fa-remove"></span>Remover</a>';
			})
			->make(true);
		}
		return view('admin.listaUsuarios');
	}
	public function removeUser($id)
	{
		if(Auth::user()->tipo == 'admin'){
			User::find($id)->delete();
			return redirect()->route('Usuarios')->with('success', 'Usuario apagado com sucesso');
		}
		return redirect()->route('Usuarios')->with('erro', 'Erro ao apagar');
	}
	public function getAtividades(Request $request)
	{
		if ($request->ajax()) {
			$lista = Atividade::with('user')
			->select('id',
				'user_id',
				'name',
				'type',
				'elapsed_time',
				'distance',
				'strava_activity',
				'location_city',
				'location_state',
				'average_speed',
				'created_at'
			)
			->orderBy('created_at','desc');
			return Datatables::of($lista)
			->addColumn('usuario', function ($lista) {
				return $lista->user->nome;
			})
			->addColumn('tipo', function ($lista) {
				return Atividade::tipoAtividade($lista->type);
			})
			->addColumn('tempo', function ($lista) {
				return gmdate("H:i:s", $lista->elapsed_time);
			})
			->addColumn('strava', function ($lista) {
				return (!empty($lista->strava_activity)?'Sim':'Não');
			})
			->make(true);
		}
		return view('admin.listaAtividades');
	}
}
