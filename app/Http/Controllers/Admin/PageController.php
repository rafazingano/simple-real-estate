<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = Page::all();
        return view('admin.pages.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.paginas.index', compact('paginas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->atualizar($request);
        return redirect()->route('admin.paginas')->with('mensagem', 'Pagina criada com sucesso!')->with('class', 'green white-text');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pagina'] = Page::find($id);
        $data['views'] = $this->listar_views();
        return view('admin.pages.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->atualizar($request, $id);
        return redirect()->route('admin.paginas')->with('mensagem', 'Pagina atualizada com sucesso!')->with('class', 'green white-text');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Page::destroy($id);
        return redirect()->route('paginas.index')->with('mensagem', 'Pagina deletado com sucesso!!')->with('class', 'green white-text');
    }

    public function atualizar(Request $request, $id = null, $pagina = false)
    {
        $dados = $request->all();        
        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $rand = rand(11111, 99999);
            $diretorio = "img/paginas/" . $id . "/";
            $ext = $file->guessExtension();
            $nomeArquivo = "_img_" . $rand . "." . $ext;
            $file->move($diretorio, $nomeArquivo);
            $dados['imagem'] = $diretorio . "/" . $nomeArquivo;
        }
        if(!$id){
            $pagina = Page::create($dados);
        }else{
            $pagina = Page::find($id);
            $pagina->update($dados);
        }
        return $pagina;
    }

    public function listar_views(){
        $path = resource_path("paginas"); 
        $diretorio = dir($path); 
        dd($diretorio->read());
        while($arquivo = $diretorio -> read()){
            echo "<a href='".$path.$arquivo."'>".$arquivo."</a>";
        }
        $diretorio -> close();
    }
}
