<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Imovel;

class ImovelController extends Controller
{
    public function index($id)
    {
    	$imovel = Imovel::find($id);
    	$galeria = $imovel->galerias()->orderBy('ordem')->get();
    	$direcaoTexto = ['center-align', 'left-align', 'right-align'];

    	$seo = [
    		'titulo'=>$imovel->titulo,
			'descricao'=>$imovel->descricao,
			'imagem'=>asset($imovel->imagem),
			'url'=> route('site.imovel',[$imovel->id,str_slug($imovel->titulo,'_')])
    	];

    	return view('site.imovel', compact('imovel', 'direcaoTexto', 'galeria', 'seo'));
    }
}
