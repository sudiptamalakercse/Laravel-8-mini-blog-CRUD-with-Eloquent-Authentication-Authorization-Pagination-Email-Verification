<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function destroy(Request $request)
    {
        $user_type=null;

        if(Auth::guard('admin')->check()){
            
           $user_type='admin';

           Auth::guard('admin')->logout();
        }
        elseif(Auth::guard('blogger')->check()){

            $user_type='blogger';

            Auth::guard('blogger')->logout();
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect()->route('login-'.$user_type);
    }
}
