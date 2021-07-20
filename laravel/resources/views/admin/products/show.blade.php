@extends('adminlte::page')

@section('title',"Detalhes do produto {$product->title}")

@section('content_header')
<h1> 
  
</h1>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}" >Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Produtos</a></li>
    <li class="breadcrumb-item"><a href="{{ route('categories.show', $product->id) }}" class="active">Detalhes</a></li>
</ol>
@stop 

@section('content')
   <div class="container">
       <div class="card">
           <div class="card-header">
            Produto: {{$product->name}}
           </div>
           <div class="card-body">
                <p><strong>ID:</strong>{{$product->id}}</p>
                <p><strong>Categoria:</strong>{{$product->name}}</p>
                <p><strong>Categoria:</strong>{{$product->category->title}}</p>
                <p><strong>Preço:</strong>{{$product->price}}</p>
                <p><strong>Descricao:</strong>{{$product->description}}</p>
                <hr>
               
               <form action="{{route('products.destroy',$product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar produto</button>
               
              </form>
              
           </div>
       </div>
   </div>
@stop