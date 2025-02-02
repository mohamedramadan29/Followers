<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    use Message_Trait;
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'role' => 'required',
                'permissions' => 'required',
            ];
            $messages = [
                'role.required' => 'من فضلك ادخل اسم الصلاحية ',
                'permissions.required' => 'من فضلك ادخل صلاحيات الصلاحية ',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $role = new Role();
            $role->role = $data['role'];
            $role->permissions = json_encode($data['permissions']);
            $role->save();

            return $this->success_message(' تم اضافة الصلاحية بنجاح');
        }
        return view('admin.roles.create');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'role' => 'required',
                'permissions' => 'required',
            ];
            $messages = [
                'role.required' => 'من فضلك ادخل اسم الصلاحية ',
                'permissions.required' => 'من فضلك ادخل صلاحيات الصلاحية ',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $role = Role::find($id);
            $role->role = $data['role'];
            $role->permissions = json_encode($data['permissions']);
            $role->save();
            return $this->success_message(' تم تعديل الصلاحية بنجاح');
        }
        $role = Role::find($id);
        return view('admin.roles.update', compact('role'));
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if (!$role || $role->admins()->count() > 0) {
            return $this->error_message('لا يمكن حذف الصلاحية لانها مرتبطة بالادمن');
        }
        $role->delete();
        return $this->success_message(' تم حذف الصلاحية بنجاح');
    }
}
