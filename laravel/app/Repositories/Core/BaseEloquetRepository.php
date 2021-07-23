<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\NotEntityDefined;

class BaseEloquetRepository implements RepositoryInterface
{
    protected $Entity;
    public function __construct()
    {
        $this->entity = $this->resolveEntity();
        
    }
    public function getAll()
    {
        return $this->entity->get();
    }
    public function findById($id)
    {
        return $this->entity->find($id);
    }
    public function findWhere($column, $valor)
    {
        return $this->entity->where($column,$valor)
                            ->get();
    }
    public function findWhereFirst($column, $valor)
    {
        return $this->entity->where($column,$valor)
                            ->first();
    }
    public function paginate($totalPage = 10)
    {
        return $this->entity->paginate($totalPage);

    }
    public function store(array $data)
    {
        return $this->entity->create($data);

    }
    public function update(int $id, array $data)
    {        
        $entity = $this->findById($id);
        return $entity->update($data);
    }

    public function delete(int $id)
    {
       return $this->entity->find($id)->delete();

    }

    public function relationships(...$relationsships)
    {
        $this->entity = $this->entity->with($relationsships);
        return $this;

    }
    public function orderBy($column, $order = "DESC")
    {
        $this->entity = $this->entity->orderBy($column, $order);
        
        return $this;
        
    }

    public function resolveEntity()
    {
        if(!method_exists($this,'entity')) {
            throw new NotEntityDefined;
        }
    
       return  app($this->entity());

    }
    public function entity()
    {
        return Product::class;
    }
}
