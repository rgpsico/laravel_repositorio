<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UsersRepositoryInterface;
use App\Http\Requests\StoreUpdateUsersFormRequest;
class UsersController extends Controller
{

    protected $repository;

    public function __construct(UsersRepositoryInterface $repository)
    {
        $this->repository = $repository;
        
    }
   /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
      
       $users = $this->repository->orderBy('id')->paginate();
       return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateusersFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUsersFormRequest $request)
    {
        $this->repository->store([
            'name' => $request->name,      
            'email' => $request->email,
            'password'=>bcrypt($request->password)
      ]);

      return redirect()->route('users.index')
             ->withSuccess('Cadastro realizado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $users = $this->repository->findById($id);
        if(!$users){
            return redirect()->back();

        }
        return view('admin.users.show',compact('users'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $users = $this->repository->findById($id);
         if(!$users){
             return redirect()->back();

         }
         return view('admin.users.edit',compact('users'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateusersFormRequest;
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUsersFormRequest $request, $id)
    {
        $data = $request->all();

        if($request->password){
            $data['password'] = bcrypt($data['password']);

        } else {
            unset($data['password']);

        }
        $this->repository->update($id, $data);

       
     return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $this->repository->delete($id);
       return redirect()->route('users.index')
                        ->withSuccess('Usuario excluido com successo');
    }

    public function search(Request $request)
    {
        $data = $request->except('_token');
             $users =  $this->repository->search($data);                                     
                return view('admin.users.index',compact('users','data'));
    }
}

