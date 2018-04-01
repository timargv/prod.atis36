<?php

namespace App\Http\Controllers\Admin;

use App\Mprovider;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class MprovidersController extends Controller
{
    //-****************************************

    public function index()
    {
        $mproviders = Mprovider::paginate(500);
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
            'provider_id' => 'nullable'
        ]);

        $mprovider = Mprovider::add($request->all());
        $mprovider->setProvider($request->get('provider_id'));
        return redirect()->route('manager-providers.index');
    }

    //-****************************************

    public function edit($id)
    {
        $mprovider = Mprovider::find($id);
        $providers = Provider::pluck('name', 'id')->all();
        return view('admin.manager-providers.edit', compact('providers', 'mprovider'));
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
            'provider_id' => 'nullable',
        ]);

        $mprovider = Mprovider::find($id);
        $mprovider->edit($request->all());
        $mprovider->setProvider($request->get('provider_id'));
        return redirect()->route('manager-providers.index');

    }

    //-****************************************

    public function destroy($id)
    {
        Mprovider::find($id)->delete();
        return redirect()->route('manager-providers.index');
    }


    //-****************************************

    public function export()
    {
        $mprovider = Mprovider::with('provider')
            ->get()
            ->map(function (Mprovider $mprovider) {
                return [
                    'name_con_p' => $mprovider->name_con_p,
                    'email_con_p' => $mprovider->email_con_p,
                    'slug' => $mprovider->slug,
                    'provider' => $mprovider->provider->name ?? '',
                ];
            });
        return Excel::create('Экспорт мэнэджеров', function ($excel) use ($mprovider) {
            $excel->sheet('Лист', function ($sheet) use ($mprovider) {
                $sheet->fromArray($mprovider);
            });
        })->export('xlsx');

    }


    //-****************************************

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);
        $data = Excel::load($request->file('file')->getRealPath())->get();
        foreach ($data as $key => $value) {
            $attributes = $value->only('name_con_p', 'first_name', 'middle_name', 'last_name', 'email', 'slug')->toArray();
            if ($value['provider']) {
                $provider = Provider::firstOrCreate([
                    'name' => $value['provider']
                ]);
                $attributes['provider_id'] = $provider->id;
            }
            Mprovider::create($attributes);
        }
        return back();
    }
}
