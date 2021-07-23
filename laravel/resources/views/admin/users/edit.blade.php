@extends('adminlte::page')

@section('title','Editar  Categorias')

@section('content_header')
<h1> 
    Editar Usuario: {{$users->title}}
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}">Dashboard</a></li>
    <li><a href="{{ route('users.index') }}">Categorias</a></li>
    <li><a href="{{ route('users.edit', $users->id) }}" class="active">Editar</a></li>
</ol>

@stop 

@section('content')
   <div class="container">
       <div class="box box-success">
           <div class="box-body">
            @include('admin.includes.alerts')
               <form action="{{route('users.update',$users->id)}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                    @include('admin.users._partials.form')
               </form>
              
           </div>
       </div>
   </div>
@stop