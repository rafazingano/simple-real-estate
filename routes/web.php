<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',['as' => 'site.home', 'uses' => 'Site\HomeController@index']);

Route::get('/sobre',['as' => 'site.sobre', 'uses' => 'Site\PaginaController@sobre']);

Route::get('/contato',['as' => 'site.contato', 'uses' => 'Site\PaginaController@contato']);
Route::post('/contato/enviar',['as' => 'site.contato.enviar', 'uses' => 'Site\PaginaController@enviarContato']);

Route::get('/imovel/{id}/{titulo?}',['as' => 'site.imovel', 'uses' => 'Site\ImovelController@index']);

Route::get('/busca',['as' => 'site.busca', 'uses' => 'Site\HomeController@busca']);

Route::get('/login', ['as' => 'admin.login', function() {
    return view('admin.login.index');
}]);

Route::post('/login', ['as' => 'admin.login', 'uses' => 'Admin\UsuarioController@login']);

//Route::group(['middleware' => 'auth'], function() {
Route::namespace('Admin')->prefix('admin')->middleware(['auth'])->as('admin.')->group(function () {

  Route::resource('pages', 'PageController');

    Route::get('/login/sair',['as'=>'login.sair', 'uses'=>'UsuarioController@sair']);
    Route::get('/admin', ['as' => 'principal', function() {
        return view('principal.index');
    }]);

    Route::get('/usuarios',['as'=>'usuarios', 'uses'=>'UsuarioController@index']);

    Route::get('/usuarios/adicionar', ['as' => 'usuarios.adicionar', 
                                             'uses' => 'UsuarioController@adicionar']);

    Route::post('/usuarios/salvar', ['as' => 'usuarios.salvar','uses' => 'UsuarioController@salvar']);

    Route::get('/usuarios/editar/{id}', ['as' => 'usuarios.editar', 
                                               'uses' => 'UsuarioController@editar']);

    Route::put('/usuarios/atualizar/{id}', ['as' => 'usuarios.atualizar', 
                                                  'uses' => 'UsuarioController@atualizar']);

    Route::get('/usuarios/deletar/{id}', ['as' => 'usuarios.deletar', 
                                                'uses' => 'UsuarioController@deletar']);

    Route::get('/usuarios/papel/{id}',['as'=>'usuarios.papel', 'uses'=>'UsuarioController@papel']);
    Route::post('/usuarios/papel/salvar/{id}',['as'=>'usuarios.papel.salvar', 'uses'=>'UsuarioController@salvarPapel']);
    Route::get('/usuarios/papel/{id}/{papel_id}',['as'=>'usuarios.papel.remover', 'uses'=>'UsuarioController@vemoverPapel']);

    

    Route::get('/tipos',['as'=>'tipos', 'uses'=>'TipoController@index']);

    Route::get('/tipos/adicionar', ['as' => 'tipos.adicionar', 
                                             'uses' => 'TipoController@adicionar']);

    Route::post('/tipos/salvar', ['as' => 'tipos.salvar', 
                                           'uses' => 'TipoController@salvar']);

    Route::get('/tipos/editar/{id}', ['as' => 'tipos.editar', 
                                               'uses' => 'TipoController@editar']);

    Route::put('/tipos/atualizar/{id}', ['as' => 'tipos.atualizar', 
                                                  'uses' => 'TipoController@atualizar']);

    Route::get('/tipos/deletar/{id}', ['as' => 'tipos.deletar', 
                                                'uses' => 'TipoController@deletar']);

    Route::get('/cidades',['as'=>'cidades', 'uses'=>'CidadeController@index']);

    Route::get('/cidades/adicionar', ['as' => 'cidades.adicionar', 
                                             'uses' => 'CidadeController@adicionar']);

    Route::post('/cidades/salvar', ['as' => 'cidades.salvar', 
                                           'uses' => 'CidadeController@salvar']);

    Route::get('/cidades/editar/{id}', ['as' => 'cidades.editar', 
                                               'uses' => 'CidadeController@editar']);

    Route::put('/cidades/atualizar/{id}', ['as' => 'cidades.atualizar', 
                                                  'uses' => 'CidadeController@atualizar']);

    Route::get('/cidades/deletar/{id}', ['as' => 'cidades.deletar', 
                                                'uses' => 'CidadeController@deletar']);

    Route::get('/imoveis',['as'=>'imoveis', 'uses'=>'ImovelController@index']);

    Route::get('/imoveis/adicionar', ['as' => 'imoveis.adicionar', 
                                            'uses' => 'ImovelController@adicionar']);

    Route::post('/imoveis/salvar', ['as' => 'imoveis.salvar', 'uses' => 'ImovelController@salvar']);

    Route::get('/imoveis/editar/{id}', ['as' => 'imoveis.editar', 
                                              'uses' => 'ImovelController@editar']);

    Route::put('/imoveis/atualizar/{id}', ['as' => 'imoveis.atualizar', 
                                                 'uses' => 'ImovelController@atualizar']);

    Route::get('/imoveis/deletar/{id}', ['as' => 'imoveis.deletar', 
                                               'uses' => 'ImovelController@deletar']);

    Route::get('/galerias/{id}',['as'=>'galerias', 'uses'=>'GaleriaController@index']);

    Route::get('/galerias/adicionar/{id}', ['as' => 'galerias.adicionar', 
                                            'uses' => 'GaleriaController@adicionar']);

    Route::post('/galerias/salvar/{id}', ['as' => 'galerias.salvar', 
    									   'uses' => 'GaleriaController@salvar']);

    Route::get('/galerias/editar/{id}', ['as' => 'galerias.editar', 
                                              'uses' => 'GaleriaController@editar']);

    Route::put('/galerias/atualizar/{id}', ['as' => 'galerias.atualizar', 
                                                 'uses' => 'GaleriaController@atualizar']);

    Route::get('/galerias/deletar/{id}', ['as' => 'galerias.deletar', 
                                               'uses' => 'GaleriaController@deletar']);

    Route::get('/slides/',['as'=>'slides', 'uses'=>'SlideController@index']);

    Route::get('/slides/adicionar/', ['as' => 'slides.adicionar', 
                                            'uses' => 'SlideController@adicionar']);

    Route::post('/slides/salvar', ['as' => 'slides.salvar', 'uses' => 'SlideController@salvar']);

    Route::get('/slides/editar/{id}', ['as' => 'slides.editar', 'uses' => 'SlideController@editar']);

    Route::put('/slides/atualizar/{id}', ['as' => 'slides.atualizar', 
                                                'uses' => 'SlideController@atualizar']);

    Route::get('/slides/deletar/{id}',['as'=>'slides.deletar','uses'=>'SlideController@deletar']);

    Route::get('/papel/',['as'=>'papel', 'uses'=>'PapelController@index']);

    Route::get('/papel/adicionar', ['as' => 'papel.adicionar', 
                                           'uses' => 'PapelController@adicionar']);

    Route::post('/papel/salvar', ['as' => 'papel.salvar', 'uses' => 'PapelController@salvar']);

    Route::get('/papel/editar/{id}', ['as' => 'papel.editar', 'uses' => 'PapelController@editar']);

    Route::put('/papel/atualizar/{id}', ['as' => 'papel.atualizar', 
                                                'uses' => 'PapelController@atualizar']);

    Route::get('/papel/deletar/{id}',['as'=>'papel.deletar','uses'=>'PapelController@deletar']);

    Route::get('/papel/permissao/{id}',['as'=>'papel.permissao', 
                                              'uses' => 'PapelController@permissao']);

    Route::post('/papel/permissao/{id}/salvar',['as'=>'papel.permissao.salvar', 
                                              'uses' => 'PapelController@salvarPermissao']);
    
    Route::get('/papel/permissao/{id}/remover/{id_permissao}',['as'=>'papel.permissao.remover', 
                                              'uses' => 'PapelController@removerPermissao']);

    Route::get('/papel/permissao/{id}', ['as' => 'papel.permissao', 'uses' => 'PapelController@permissao']);

    Route::post('/papel/permissao/salvar/{id}', ['as' => 'papel.permissao.salvar', 'uses' => 'PapelController@salvarPermissao']);

    Route::get('/papel/permissao/remover/{id}/{id_permissao}', ['as' => 'papel.permissao.remover', 'uses' => 'PapelController@removerPermissao']);


});
