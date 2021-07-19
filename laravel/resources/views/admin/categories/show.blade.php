@extends('adminlte::page')

@section('title','Editar  Categorias')

@section('content_header')
<h1> 
    Categoria: {{$category->title}}
</h1>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}" >DashBoard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('categories.index')}}" >Categories</a></li>
    <li class="breadcrumb-item "><a href="{{route('categories.show',$categories->id)}}" class="active" >Detalhes</a></li>

</ol>

@stop 

@section('content')
   <div class="content row">
       <div class="box box-success">
           <div class="box-body">
                <p><strong>ID:</strong>{{$category->id}}</p>
                <p><strong>Titulo:</strong>{{$category->title}}</p>
                <p><strong>URL:</strong>{{$category->url}}</p>
                <p><strong>Descricao:</strong>{{$category->description}}</p>
                <hr>
                <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            
              
           </div>
       </div>
   </div>
@stop