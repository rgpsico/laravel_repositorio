
           <div class="form-group">
                <input type="text" name="name" placeholder="Nome" class="form-control" value="{{$product->name ?? old('name')}}">
            </div>

            <div class="form-group">
              <input type="number" name="price" placeholder="Preço" class="form-control" value="{{$product->price ?? old('price')}}">
          </div>

            <div class="form-group">
              <input type="text" name="url" placeholder="url" class="form-control" value="{{$product->url ?? old('url')}}">
          </div>

          <div class="form-group">
              <select name="category_id" id="category_id" class="form-control">
                  <option value="">Escolha Categoria </option>
                  @foreach ($categories as $category)                       
                      <option value="{{$category->id}}" 
                        @if (isset($product->category_id) && $product->category_id ==  $category->id  ) selected @endif                        
                        >{{$category->title}}</option>
                  @endforeach
              </select>
              
          </div>

          <div class="form-group">
            <textarea name="description" id="" cols="30" rows="10" class="form-control">
              {{$product->description ?? old('description')}}
            </textarea>
          </div>

          <div class="form-group">
              <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
          
