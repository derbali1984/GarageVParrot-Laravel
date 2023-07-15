<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Admin.employee.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        $name = (new User)->userAvatar($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        $roleId = $data['role_id'];
        $role = Role::findOrFail($roleId);
        $roleName = $role->name;
        User::create($data);
        return redirect()->back()->with('message', $roleName . ' ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('Admin.employee.delete', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.employee.edit', compact('user'));
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
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        if ($request->hasFile('image')) {
            $imageName = (new User)->userAvatar($request);
            unlink(public_path('employee_admin_images/' . $user->image));
        }
        $data['image'] = $imageName;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }
        $roleId = $data['role_id'];
        $role = Role::findOrFail($roleId);
        $roleName = $role->name;
        $user->update($data);
        return redirect()->route('employee.index')->with('message', $roleName . ' mis à jour avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id == $id) {
            abort(401);
        }
        $user = User::find($id);
        $userDelete = $user->delete();
        if ($userDelete) {
            unlink(public_path('employee_admin_images/' . $user->image));
        }
        $rolename = $user->role->name;
        return redirect()->route('employee.index')->with('message', $rolename . ' supprimé avec succès');
    }

    public function validateStore($request)
    {
        return $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'role_id' => 'required'


        ]);
    }

    public function validateUpdate($request, $id)
    {
        return $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:users,email,' . $id,
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
            'role_id' => 'required'

        ]);
    }
}
