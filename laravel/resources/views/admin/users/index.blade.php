@extends('adminlte::page')

@section('title','Listagem Categorias')

@section('content_header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}" >DashBoard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('users.index')}}" class="active">user</a></li>
   

</ol>
<h1> Categorias

    <a href="{{route('users.create')}}" class="btn btn-success">Add</a>

</h1>
<br>

@stop 

@section('content')
   <div class="content">
       <div class="card">
           <div class="card-header box-success">
               <div class="card-title">
                   Listar Categorias
               </div>
           </div>
              
               <div class="card-body">
                   @include('admin.includes.alerts')
                   <form action="{{route('users.search')}}" class="form form-inline" method="POST">
                    @csrf   
                    <input type="text" name="name" placeholder="Titulo" class="form-control" value="{{$data['name'] ?? '' }}">
                    <input type="text" name="email" placeholder="email" class="form-control" value="{{$data['email'] ?? '' }}">

                       <button type="submit" class="ml-2 btn btn-success">Pesquisar</button>
                   </form>
                   @if (isset($data))
                   <a href="{{route('users.index')}}"> (x) Limpar Resultados da Pesquisa</a>
                   @endif
               </div>
           </div>

           <div class="box-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scoope="col">#</th>
                          <th scoope="col">Nome</th>
                          <th scoope="col">E-mail</th>

                          <th scoope="col">ações</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      <tr scope="row">
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                              <a href="{{route('users.edit',$user->id)}}" class="btn btn-success">Editar</a>
                              <a href="{{route('users.show',$user->id)}}" class="btn btn-info">Detalhes</a>
                              <a href="{{route('users.destroy',$user->id)}}" class="btn btn-danger">Excluir</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              @if (isset($data))
              {!!$users->appends($data)->links()!!}
              @else 
              {!! $users->links() !!}
              @endif

    
           </div>
       </div>
   </div>
@stop