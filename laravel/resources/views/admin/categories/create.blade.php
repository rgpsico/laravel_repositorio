@extends('adminlte::page')

@section('title','Cadastrar Nova Categorias')

@section('content_header')
<h1> 
    Cadastrar Nova Categoria
</h1>

<ol class="breadcrumb float-sm-right">
    <li><a href="{{ route('admin') }}">Dashboard</a></li>
    <li><a href="{{ route('categories.index') }}">Categorias</a></li>
    <li><a href="{{ route('categories.create') }}" class="active">Cadastrar</a></li>
</ol>

@stop 

@section('content')
   <div class="container">
       <div class="box box-success">
           <div class="box-body">
            @include('admin.includes.alerts')
               <form action="{{route('categories.store')}}" method="POST">
                    @include('admin.categories._partials.form')
               </form>
              
           </div>
       </div>
   </div>
@stop