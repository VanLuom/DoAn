<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       


        $cates =User::orderby('id','desc')->get();
        return view('admin.users.index')->with(compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $user = User::create($request->only(['name', 'email', 'password']));
        // $message = "Seccess full Created";
        // if($user == null){
        //     $message = "Seccess full failed";
        // }
        $data = $request->validate(
            [
                'name' => 'required|unique:categories|max:225',
                'email' =>'required',
                'password'=>'required'
            ],
            [
                'name.required' => 'Nhập Tiêu đề',
                'name.unique' => 'Tiêu đề này đã tồn tại, Nhập tiêu đề khác',
                'email.required' => 'Nhập email',
                'password.required' => 'Nhập password',


            ]
            );
            $cate = new User;
            $cate ->name = $data['name'];
            $cate->email = $data['email'];
            $cate->password = $data['password'];
            $cate->save();
        return redirect()->route('admin.users.index')->with('status', 'Thêm Danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $bool = $user->update($request->only(['name', 'email', 'password']));
        $message = "Seccess full Created";
        if(!$bool){
            $message = "Seccess full failed";

        }
        return redirect()->route('admin.users.index')->with('message', $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $message = "Seccess full deleted";
        if (!User::destroy($id)) {
            $message = "Seccess full failed";
        }

        return redirect()->route('admin.users.index')->with('message', $message);
    }
}