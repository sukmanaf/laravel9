<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::authenticateUsing(function (Request $request) {
            $secret = "6LfhoZkkAAAAAOG1EvljaWAHX7SMITmJmIUL5d4U";
            $check = file_get_contents("https://google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$_POST['g-recaptcha-response']);
            $res = json_decode($check);

            $user = User::where('email', $request->email)->first();
            
   
            if ($user &&
                Hash::check($request->password, $user->password) 
                ) {
                // if($res->success){
                //   die('true');
                    return $user;
                // }
            }

        });
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
