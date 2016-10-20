<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('admin');
    }

    public function home()
    {
        return view('admin.home');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request,
                $validator
            );
        }

        Admin::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
        return redirect('admin/index')->with('success', 'Details have been saved.');
    }

    public function edit($id)
    {
        $user = Admin::whereId($id)->first();
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = Admin::whereId($id)->first();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins,email,'.$user->id
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request,
                $validator
            );
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        return redirect()->back()->with('success', 'Details have been saved.');
    }

    public function destroy($id)
    {
        $user = Admin::whereId($id)->first();
        $user->delete();
        return redirect()->back()->with('success', 'Details have been deleted.');
    }

    public function showResetPasswordForm()
    {
        return view('admin.auth.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request,
                $validator
            );
        } else {
            $admin = \Auth::guard('admin')->user();
            $hash_check = \Hash::check($request->get('old_password'), $admin->password);
            if ($hash_check) {
                $admin_instance = Admin::find($admin->id);
                $admin_instance->password = \Hash::make($request->get('new_password'));
                $admin_instance->save();
                return redirect()->back()->with('success', 'Password reset successfully.');
            } else {
                return redirect()->back()->with('error', 'Invalid Old Password');
            }
        }
    }
}
