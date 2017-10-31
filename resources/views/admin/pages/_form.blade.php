<div class="input-field">
    <input type="text" name="titulo" class="validate" value="{{ isset($pagina->titulo) ? $pagina->titulo : '' }}">
    <label>Título</label>
</div>
<div class="input-field">
    <input type="text" name="slug" value="{{ isset($pagina->slug) ? $pagina->slug : '' }}">
    <label>Slug</label>
</div>
<div class="input-field">
    <textarea name="texto" class="materialize-textarea">{{ isset($pagina->texto) ? $pagina->texto : '' }}</textarea>
    <label>Descrição</label>
</div>
<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>Imagem</span>
            <input type="file" name="imagem">
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate">
        </div>
    </div>
    <div class="col m6 s12">
    @if (isset($pagina->imagem))
        <img width="120" src="{{ asset($pagina->imagem) }}">
    @endif
    </div>
</div>
<div class="input-field">
    <input type="text" name="meta_titulo" value="{{ isset($pagina->meta_titulo) ? $pagina->meta_titulo : '' }}">
    <label>Meta Titulo</label>
</div>
<div class="input-field">
    <textarea name="meta_descricao">{{ isset($pagina->meta_descricao) ? $pagina->meta_descricao : '' }}</textarea>
    <label>Meta Descrição</label>
</div>