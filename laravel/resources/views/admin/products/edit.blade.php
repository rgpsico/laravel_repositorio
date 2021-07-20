@extends('adminlte::page')

@section('title','Cadastrar Novo Produto')

@section('content_header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}" >DashBoard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('products.index')}}" >products</a></li>
    <li class="breadcrumb-item active"><a href="{{route('products.index')}}" class="active">Editar Produto</a></li>

</ol>
<h1> Editar Produtos</h1>
<br>

@stop 

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header" style="background:red">
            @include('admin.includes.alerts')
        </div>
        <div class="card-body">
           
         {{Form::model($product,['route'=>['products.update',$product->id]] )}}
          @method('PUT')
            @include('admin.products._partials.form')

        {{Form::close()}}
            </div>   
    </div>
</div>
   
@stop