@extends('adminlte::page')

@section('title','Editar  Categorias')

@section('content_header')
<h1> 
    Editar Categoria: {{$category->title}}
</h1>


@stop 

@section('content')
   <div class="container">
       <div class="box box-success">
           <div class="box-body">
            @include('admin.includes.alerts')
               <form action="{{route('categories.update',$category->id)}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                    @include('admin.categories._partials.form')
               </form>
              
           </div>
       </div>
   </div>
@stop