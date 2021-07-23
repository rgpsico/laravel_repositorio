<?php 

namespace App\Repositories\Core\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Core\BaseEloquetRepository;

class EloquentCategoryRepository extends BaseEloquetRepository 
implements CategoryRepositoryInterface
{
    public function entity()
    {
        return Category::class;
    }

    public function search(array $data)
    {
       return $this->entity
            ->where(function($query) use($data){
                if(isset($data['title']))
                {
                $query->where('title',$data['title']); 
                }    
                
                if(isset($data['url']))
                {
                $query->orWhere('url',$data['url']); 
                }

                if(isset($data['description']))
                {
                $desc = $data['description'];
                $query->where('description','LIKE',"%{$desc}%"); 
                }

            })->orderBy('id','desc')->paginate();;
    }

}

?>