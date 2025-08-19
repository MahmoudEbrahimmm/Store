<?php

namespace App\Actions\Fortify;

class AuthenticateUser
{
    public function authenticate($request){
        $username = $request->post(config('fortify.username'));
    }
}
