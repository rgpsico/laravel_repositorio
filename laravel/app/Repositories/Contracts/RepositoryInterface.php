<?php 

namespace App\Repositories\Contracts;

interface RepositoryInterface 
{
   public function getAll();
   public function findById($id);
   public function findWhere($column, $valor);
   public function findWhereFirst($column, $valor);
   public function paginate($totalPage = 10);
   public function store(array $data);
   public function update(int $id, array $data);
   public function delete(int $id);
   public function orderBy($column, $order = 'DESC');


}