<?php 

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\UsersRepositoryInterface;
use Illuminate\Support\Str;


class QueryBuilderUsersRepository extends BaseQueryBuilderRepository implements UsersRepositoryInterface
{
    protected $table = 'users';
    

    public function search(array $data)
    {
      
        return $this->db

            ->table($this->tb)
             ->where(function($query) use ($data){
                 if(isset($data['name'])) {
                 $query->where('name', $data['name']); 
                 }    

                 
                 if(isset($data['email'])) {
                 $query->orWhere('email',$data['email']); 
                 }
 
                
             })
             ->orderBy('id','desc')
             ->paginate();
     }

    public function store(array $data)
    {
     
        return $this->db->table($this->tb)
                    ->insert($data);
    }

    public function update($id, array $data)
    {
    
        
        return $this->db->table($this->tb)
                    ->where('id', $id)
                    ->update($data);
    }

  




}


