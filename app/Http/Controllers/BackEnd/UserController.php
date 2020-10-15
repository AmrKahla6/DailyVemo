<?php

namespace App\Http\Controllers\BackEnd;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BackEnd\Users\StoreRequest;
use App\Http\Requests\BackEnd\Users\UpdateRequest;



class UserController extends BackEnd
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }// end of __constract child function


    // protected function filter($rows)
    // {
    //     if(request()->has('name') && request()->get('name') != "")
    //     {
    //         $rows += where('name' ,  request()->get('name'));
    //     }

    //     return $rows;
    // }


    public function store(StoreRequest $request)
    {
        //   dd($request->all());

        $requestArray = $request->all();

        $requestArray['password'] =  Hash::make($requestArray['password']);

        $this->model->create($requestArray);

        return redirect(route('users.index'));
    } // end of store function



    public function update($id , UpdateRequest $request)
    {
        $row = $this->model->findOrFail($id);

        $requestArray = $request->all();

        if(isset($requestArray['password']) && $requestArray['password'] != "")
        {
            $requestArray['password'] =  Hash::make($requestArray['password']);
        } else {
             unset($requestArray['password']);
        }

        $row->update($requestArray);

        return redirect(route('users.index'));

    }// end of update function


}// end of controller
