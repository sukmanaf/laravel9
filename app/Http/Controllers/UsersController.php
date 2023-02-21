<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\PasswordValidationRules;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Rules\Password;
use Datatable;

class UsersController extends Controller
{    

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $users = User::latest()->paginate(5);

        //render view with posts
        return view('users.index', compact('users'));
    }


    public function data(Request $request)
    {
        // Fetch all users from the database
        $users = User::all();

        // Check if the request is an AJAX request (from DataTables)
        if ($request->ajax()) {
            // If it is, return the users as a JSON object
            // return datatables()->of($users)->toJson();
            return response()->json([
                'data' => [
                    'name' => $users->name,
                    'email' => $users->email, 
                    'jenis' => $users->jenis 
                ]
            ]);
        }

        // Otherwise, return the normal view
        return view('users.index', ['users' => $users]);
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        // dd($request->input());
        // $request=$request->input();
        //create post
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'jenis' => ['required'],
            'password' => ['required'],
        ]);
        

            // dd($input);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'jenis' => $request['jenis'],
            'password' => Hash::make($request['password']),
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * edit
     *
     * @param  mixed $users
     * @return void
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        //validate form
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'jenis' => ['required'],
            'password' => ['required'],
        ]);
        

            // dd($input);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'jenis' => $request['jenis'],
            'password' => Hash::make($request['password']),
        ]);
        
        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $user
     * @return void
     */
    public function destroy(User $user)
    {
        //delete image
        Storage::delete('public/posts/'. $user->image);

        //delete user
        $user->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}