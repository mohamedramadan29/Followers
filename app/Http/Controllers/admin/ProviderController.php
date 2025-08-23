<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\Provider;
use App\Http\Traits\Message_Trait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{
    use Message_Trait;

    public function index()
    {
        $providers = Provider::all();
        return view('admin.providers.index', compact('providers'));
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required|unique:providers',
                'api_url' => 'required|unique:providers',
                'api_key' => 'required|unique:providers',
                'status'=>'required'
            ];
            $messages = [
                'name.required' => ' من فضلك ادخل الاسم  ',
                'api_url.required' => ' من فضلك ادخل Api Url ',
                'api_key.required' => ' من فضلك ادخل Api Key ',
                'status.required' => ' من فضلك ادخل الحالة ',
                'name.unique' => ' الاسم موجود بالفعل ',
                'api_url.unique' => ' Api Url موجود بالفعل ',
                'api_key.unique' => ' Api Key موجود بالفعل ',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $provider = new Provider();
            $provider->name = $request->name;
            $provider->api_url = $data['api_url'];
            $provider->api_key = $data['api_key'];
            $provider->status = $data['status'];
            $provider->save();
            return $this->success_message('تم اضافة مزود بنجاح');
        }
        return view('admin.providers.add');
    }

    public function update(Request $request, $id)
    {
        $provider = Provider::find($id);
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required|unique:providers,name,' . $id,
                'api_url' => 'required|unique:providers,api_url,' . $id,
                'api_key' => 'required|unique:providers,api_key,' . $id,
                'status'=>'required'
            ];
            $messages = [
                'name.required' => ' من فضلك ادخل الاسم  ',
                'api_url.required' => ' من فضلك ادخل Api Url ',
                'api_key.required' => ' من فضلك ادخل Api Key ',
                'status.required' => ' من فضلك ادخل الحالة ',
                'name.unique' => ' الاسم موجود بالفعل ',
                'api_url.unique' => ' Api Url موجود بالفعل ',
                'api_key.unique' => ' Api Key موجود بالفعل ',

            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $provider->name = $request->name;
            $provider->api_url = $data['api_url'];
            $provider->api_key = $data['api_key'];
            $provider->status = $data['status'];
            $provider->save();
            return $this->success_message('تم تعديل مزود بنجاح');
        }
        return view('admin.providers.edit', compact('provider'));
    }

    public function delete($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
        return $this->success_message('تم حذف مزود بنجاح');
    }
}
