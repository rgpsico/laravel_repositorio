@csrf
                   <div class="form-group">                      
                       <input type="text" name="name" value="{{$users->name ?? old('name')}}" class="form-control" placeholder="Nome">
                   </div>

                   <!--<div class="form-group">
                       
                        <input type="text" name="url" class="form-control"  value="{{$users->url ?? old('url')}}" placeholder="url">
                    </div>-->

                <div class="form-group">
                 
                    <input type="text" name="email" value="{{$users->email ?? old('email')}}" class="form-control" placeholder="E-mail">
                </div>

                <div class="form-group">
        
                    <input type="text" name="password" value="" class="form-control" placeholder="password">
                </div>

                <div class="form-group">                 
                 <input type="submit" value="Enviar" class="btn btn-success">
                </div>
                   