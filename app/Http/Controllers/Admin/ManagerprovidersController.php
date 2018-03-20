<?php

namespace App\Http\Controllers\Admin;

use App\managerProvider;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class managerprovidersController extends Controller
{
    //-****************************************

    public function index()
    {
        //
        $manager_providers = managerProvider::all();
        return view('admin.manager-providers.index', compact('manager_providers'));
    }

    //-****************************************

    public function create()
    {
        $providers = Provider::pluck('name', 'id');
        return view('admin.manager-providers.create', compact('providers'));
    }

    //-****************************************

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'id_provider' => 'required',
        ]);

        $manager_provider = managerProvider::add($request->all());
        $manager_provider->setProvider(get('id_provider'));
        return redirect()->route('manager-providers.index');
    }

    //-****************************************

//    public function show($id)
//    {
//        //
//    }

    //-****************************************

    public function edit($id)
    {
        $manager_provider = Provider::find($id);
        $providers = Provider::pluck('name', 'id')->all();
        return view('admin.manager-providers.edit', compact('providers', 'manager_provider'));
    }

    //-****************************************

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'id_provider' => 'required'
        ]);

        $manager_provider = managerProvider::find($id);
        $manager_provider->edit($request->all());
        $manager_provider->setProvider(get('id_provider'));
        return redirect()->route('manager-providers.index');
    }

    //-****************************************

    public function destroy($id)
    {
        managerProvider::find($id)->delete();
        return redirect()->route('manager-providers.index');
    }
}
