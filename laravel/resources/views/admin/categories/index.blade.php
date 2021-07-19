@extends('adminlte::page')

@section('title','Listagem Categorias')
{{dd($categories)}}
@section('content_header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}" >DashBoard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('categories.index')}}" class="active">Categories</a></li>
    <li class="breadcrumb-item "><a href="{{route('categories.show',$categories->id)}}" >Detalhes</a></li>

</ol>
<h1> Categorias

    <a href="{{route('categories.create')}}" class="btn btn-success">Add</a>

</h1>
<br>

@stop 

@section('content')
   <div class="content">
       <div class="box box-success">
           <div class="box box-success">
               <div class="box-body">
                   @include('admin.includes.alerts')
                   <form action="{{route('categories.search')}}" class="form form-inline" method="POST">
                    @csrf   
                    <input type="text" name="title" placeholder="Titulo" class="form-controll" value="{{$data['title'] ?? '' }}">
                    <input type="text" name="url" placeholder="url" class="form-controll" value="{{$data['url'] ?? '' }}">
                    <input type="text" name="description" placeholder="Descrição" class="form-controll"  value="{{$data['description'] ?? '' }}">
                       <button type="submit" class="btn btn-success">Pesquisar</button>
                   </form>
                   @if (isset($data))
                   <a href="{{route('categories.index')}}"> (x) Limpar Resultados da Pesquisa</a>
                   @endif
               </div>
           </div>

           <div class="box-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scoope="col">#</th>
                          <th scoope="col">Titulo</th>
                          <th scoope="col">url</th>
                          <th scoope="col">Descricao</th>
                          <th scoope="col">ações</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                      <tr scope="row">
                          <td>{{$category->id}}</td>
                          <td>{{$category->title}}</td>
                          <td>{{$category->url}}</td>
                          <td>{{$category->description}}</td>
                          <td>
                              <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success">Editar</a>
                              <a href="{{route('categories.show',$category->id)}}" class="btn btn-info">Detalhes</a>
                              <a href="{{route('categories.destroy',$category->id)}}" class="btn btn-danger">Excluir</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              @if (isset($data))
              {!!$categories->appends($data)->links()!!}
              @else 
              {!! $categories->links() !!}
              @endif

    
           </div>
       </div>
   </div>
@stop