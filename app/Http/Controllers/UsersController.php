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
        $request=$request->input();
        //create post
        Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'jenis' => ['required'],
            'password' => ['required'],
        ])->validate();
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
    public function edit(Users $users)
    {
        return view('users.edit', compact('users'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Post $post)
    {
        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}