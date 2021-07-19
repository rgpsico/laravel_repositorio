@csrf
                   <div class="form-group">                      
                       <input type="text" name="title" value="{{$category->title ?? old('title')}}" class="form-control" placeholder="Titulo">
                   </div>

                   <div class="form-group">
                       
                        <input type="text" name="url" class="form-control"  value="{{$category->url ?? old('url')}}" placeholder="url">
                    </div>

                <div class="form-group">
                 
                    <br>
                    <textarea name="description" id="" cols="100%" rows="10" value="{{$category->description ?? old('description')}}" placeholder="Description">{{$category->description ?? old('description')}}</textarea>
                </div>

                <div class="form-group">                 
                 <input type="submit" value="Enviar" class="btn btn-success">
                </div>
                   