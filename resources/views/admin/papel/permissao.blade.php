@extends('layouts.app')
@section('content')
	<div class="container">
		<h2 class="center">Lista de Permissões para o {{ $papel->nome }}</h2>
		<div class="row">
		 	<nav>
			    <div class="nav-wrapper green">
			      	<div class="col s12">
				        <a href="{{ route('admin.principal')}}" class="breadcrumb">Início</a>
				        <a href="{{ route('admin.papel')}}" class="breadcrumb">Lista de Papéis</a>
				        <a href="#" class="breadcrumb">Lista de Permições</a>
			      	</div>
			    </div>
		  	</nav>
		</div>
		<div class="row">
			<form action="{{ route('admin.papel.permissao.salvar', $papel->id) }}" method="post">
				{{ csrf_field() }}
				<div class="input-field">
					<select name="id_permissao">
					@foreach ($permissao as $valor)
						<option value="{{ $valor->id }}">{{ $valor->nome }}</option>
					@endforeach
					</select>
				</div>
				<button class="btn blue">Adicionar</button>
			</form>
			
		</div>
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Permissão</th>
						<th>Descrição</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($papel->permissoes as $valor)
					<tr>
						<td>{{ $valor->nome }}</td>
						<td>{{ $valor->descricao }}</td>
						<td>
							<a class="btn red" href="javascript: if(confirm('Remover esse papel?')) { window.location.href = '{{ route('admin.papel.permissao.remover', [$papel->id, $valor->id]) }}'}">Remover</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
