<?php 

namespace App\Repositories\Core\Eloquent;


use App\Models\User;
use App\Repositories\Core\BaseEloquetRepository;
use App\Repositories\Contracts\UsersRepositoryInterface;
use Illuminate\Http\Request;


class EloquentUsersRepository extends BaseEloquetRepository 
implements UsersRepositoryInterface
{
    public function entity()
    {
        return User::class;
    }

    public function search(array $data)
    {
       return $this->entity
            ->where(function($query) use($data){
                if(isset($data['name']))
                {
                $query->where('name',$data['name']); 
                }    
                
                if(isset($data['email']))
                {
                $query->orWhere('email',$data['email']); 
                }


            })->orderBy('id','desc')->paginate();;
    }

}

?>