@extends('layouts.app')
@section('content')
	<div class="container">
		<h2 class="center">Lista de Páginas</h2>
		<div class="row">
		 	<nav>
			    <div class="nav-wrapper green">
			      	<div class="col s12">
				        <a href="{{ route('admin.principal')}}" class="breadcrumb">Início</a>
				        <a href="#" class="breadcrumb">Lista de Páginas</a>
			      	</div>
			    </div>
		  	</nav>
		</div>
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Slug</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($pages as $page)
					<tr>
						<td>{{ $page->title }}</td>
						<td>{{ $page->slug }}</td>
						<td>
							<form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST">
								<a class="btn orange" href="{{ route('admin.pages.edit', $page->id) }}">Editar</a>
				                <input type="hidden" name="_method" value="delete" />
    							{!! csrf_field() !!}
				                <button class="btn red">Deletar</button>
				            </form>

						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
