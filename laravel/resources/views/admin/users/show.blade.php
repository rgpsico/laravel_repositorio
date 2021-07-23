@extends('adminlte::page')

@section('title','Editar  Categorias')

@section('content_header')
<h1> 
    Categoria: {{$users->title}}
</h1>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}" >Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.show', $users->id) }}" class="active">Detalhes</a></li>
</ol>
@stop 

@section('content')
   <div class="content row">
       <div class="box box-success">
           <div class="box-body">
                <p><strong>ID:</strong>{{$users->id}}</p>
                <p><strong>Nome:</strong>{{$users->name}}</p>
                <p><strong>Email:</strong>{{$users->email}}</p>
            
                <hr>
                <form action="{{route('users.destroy',$users->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            
              
           </div>
       </div>
   </div>
@stop