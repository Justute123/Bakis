<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate('5');
        $students = User::where('role_id', 1)->paginate(5);
        return view('pages.dashboardUsersIndex', compact('users', 'students'));
    }

    public function create()
    {

        return view('pages.dashboardUsersForm');
    }

    public function store(Request $request)
    {

      $request->validate([
                'name' => ['required', 'alpha', 'max:255'],
                'surname' => ['required', 'alpha', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required'],
                'study_programme' => ['nullable', 'string', 'max:255'],
            ]
        );

        $user = new User();
        $user->name=$request->name;
        $user->surname=$request->surname;
        $user->email=$request->email;
        $user->study_programme=$request->study_programme;
        $user->role_id='1';
        $user->password=Hash::make($request->password);
        $res = $user -> save();
        if($res){
            return redirect('admin/users')->with('success', 'Student is added succsfully');
        }
        else{
            return redirect('admin/users')->with('fail', 'Student is not added succsfully');

        }

    }
    public function edit(string $id)
    {
        $student = User::findOrFail($id);


        return view('pages.dashboardUsersEdit',compact('student'));
    }
    public function update(Request $request, string $id)
    {

        $student = User::findOrFail($id);
        $request->validate([
                'name' => ['required', 'alpha', 'max:255'],
                'surname' => ['required', 'alpha', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$student->id],
                'password' => ['required'],
                'study_programme' => ['nullable', 'string', 'max:255'],
            ]
        );

        $student->update(['name'=>$request->input('name')]);
        $student->update(['surname'=>$request->input('surname')]);
        $student->update(['email'=>$request->input('email')]);
        $student->update(['password'=>$request->input('password')]);
        if(!Hash::check($request->input('password'),$student->password))
        {
            $student->update(['password'=>Hash::make($request->input('password'))]);
        }

        $student->save();
        return redirect('/admin/users')->with('success', 'Student was succesfully updated');


    }
    public function destroy(Request $request)
    {
        $student = User::findOrFail($request->student_delete_id);
        try {
            $student->delete();
            return redirect('admin/users')->with('success', 'Student was successfully deleted');
        }
        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'you can not delete this student');
        }

    }





}
