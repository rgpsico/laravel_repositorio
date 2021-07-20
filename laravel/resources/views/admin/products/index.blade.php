@extends('adminlte::page')

@section('title','Listagem Categorias')

@section('content_header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('admin')}}" >DashBoard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('products.index')}}" class="active">products</a></li>
   

</ol>
<h1> Produtos

    <a href="{{route('products.create')}}" class="btn btn-success">Add</a>

</h1>
<br>

@stop 

@section('content')
   <div class="content">
       <div class="card">
           <div class="card-header box-success">
               <div class="card-title">
                   Listar Produtos
               </div>
           </div>
              
               <div class="card-body">
                   @include('admin.includes.alerts')
                   <form action="{{route('products.search')}}" class="form form-inline" method="POST">
                    @csrf
                    <select name="category" class="form-control">
                        @foreach ($categories as $id=> $category)
                            <option value="{{$id}}" @if(isset($filters['category']) && $filters['category'] == $id) selected @endif>{{$category}}</option>
                        @endforeach    
                    </select>
                
                    <input type="text" name="name" placeholder="Titulo" class="form-control" value="{{$filters['name'] ?? '' }}">
                    <input type="text" name="price" placeholder="Preço" class="form-control" value="{{$filters['price'] ?? '' }}">
                
                       <button type="submit" class="ml-2 btn btn-success">Pesquisar</button>
                      
                   </form>
                   @if (isset($data))
                   <a href="{{route('products.index')}}"> (x) Limpar Resultados da Pesquisa</a>
                   @endif
               </div>
           </div>

           <div class="box-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th scoope="col">Name</th>
                          <th scoope="col">Categoria</th>
                          <th scoope="col">Url</th>
                          <th scoope="col">preço</th>
                          <th scoope="col">ações</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                      <tr scope="row">
                          <td>{{$product->name}}</td>
                          <td>{{$product->category->title}}</td>
                          <td>{{$product->url}}</td>
                          <td>{{$product->price}}</td>
                          <td>
                              <a href="{{route('products.edit',$product->id)}}" class="btn btn-success">Editar</a>
                              <a href="{{route('products.show',$product->id)}}" class="btn btn-info">Detalhes</a>
                              <a href="{{route('products.destroy',$product->id)}}" class="btn btn-danger">Excluir</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
           
              @if (isset($filters))
              {!! $products->appends($filters)->links() !!}

              @else 
              <div class="paginate">
                {!! $products->links() !!}
              </div>

              @endif
    
             
    
           </div>
       </div>
   </div>
@stop