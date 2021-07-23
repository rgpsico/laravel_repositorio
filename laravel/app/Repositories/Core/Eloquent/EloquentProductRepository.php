<?php 

namespace App\Repositories\Core\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Core\BaseEloquetRepository;
use Illuminate\Http\Request;

class EloquentProductRepository extends BaseEloquetRepository 
implements ProductRepositoryInterface
{
    public function entity()
    {
        return Product::class;
    }

    public function search(Request $request)
    {
       return $this->entity
        ->with('category')
         ->where(function($query) use ($request) {
                 if($request->name)
                 {        
                  $filter = $request->name;                    
                  $query->where(function($querySub) use ($filter) {
                  $querySub->where('name', 'LIKE', "%{$filter}%")
                          ->orWhere('description', 'LIKE' ,"%{$filter}%");
                    });
                 }

                 if($request->price)
                {
                 $query->where('price',$request->price);

                }

                if($request->category)
                {
                 $query->orWhere('category_id',$request->category);

                }
             
             
             })->paginate(1);
        
    }

}

?>