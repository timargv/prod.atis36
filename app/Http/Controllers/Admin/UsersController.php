<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    //-****************************
    // Вывод всех пользователей

    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
//        $users = User::where('id', '>', 100)->paginate(15);
//        return view('admin.users.index')->with('users', $users);
    }


    //-****************************
    // Форма создания пользователя

    public function create()
    {
        return view('admin.users.create');
    }


    //-****************************
    // Запись данных пользователя в Базу данных

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'avatar' => 'nullable|image'
        ]);

        $user = User::add($request->all());
        $user->password;
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('users.index');
    }


    //-****************************
    // Редактирование пользователя

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }


    //-****************************
    //Обновление пользователя

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name'     => 'required',
            'email'    => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'avatar'   => 'nullable|image'
        ]);

        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('users.index');
    }


    //-****************************
    // Удаление пользователя

    public function destroy($id)
    {
        User::find($id)->remove();
        return redirect()->route('users.index');
    }
}
