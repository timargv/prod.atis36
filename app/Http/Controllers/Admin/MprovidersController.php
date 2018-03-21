<?php

namespace App\Http\Controllers\Admin;

use App\Mprovider;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class MprovidersController extends Controller
{
    //-****************************************

    public function index()
    {
        $mproviders = Mprovider::paginate(10);
//        $mproviders =  DB::table('mproviders')->paginate(15);
        return view('admin.manager-providers.index', compact('mproviders'));
    }

    //-****************************************

    public function create()
    {
        $providers = Provider::pluck('name', 'id')->all();
        return view('admin.manager-providers.create', compact('providers'));
    }

    //-****************************************

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_con_p' => 'required',
            'surname_con_p' => 'nullable',
            'patronymic_con_p' => 'nullable',
            'position_con_p' => 'nullable',
            'mobile_con_p' => 'nullable',
            'office_con_p' => 'nullable',
            'officedob_con_p' => 'nullable',
            'email_con_p' => 'nullable',
            'id_provider' => 'nullable',
        ]);

        $mprovider = Mprovider::all($request->all());
        $mprovider->setProvider($request->get('id_provider'));
        return redirect()->route('manager-providers.index');
    }

    //-****************************************

    public function edit($id)
    {
        $mprovider = Mprovider::find($id);
        $providers = Provider::pluck('name', 'id')->all();
        return view('admin.manager-providers.edit', compact('mprovider', 'providers'));
    }

    //-****************************************

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name_con_p' => 'required',
            'surname_con_p' => 'nullable',
            'patronymic_con_p' => 'nullable',
            'position_con_p' => 'nullable',
            'mobile_con_p' => 'nullable',
            'office_con_p' => 'nullable',
            'officedob_con_p' => 'nullable',
            'email_con_p' => 'nullable',
            'id_provider' => 'nullable',
        ]);

        $mprovider = Mprovider::find($id);
        $mprovider->edit($request->all());
        $mprovider->setProvider($request->get('id_provider'));
        return redirect()->route('manager-providers.index');

    }

    //-****************************************

    public function destroy($id)
    {
        //
    }
}