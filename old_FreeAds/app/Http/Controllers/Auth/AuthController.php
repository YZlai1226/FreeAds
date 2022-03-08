<?php

  

namespace App\Http\Controllers\Auth;

  

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

use App\Models\User;

use Hash;

  

class AuthController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {
        error_log('message here 1');
        return view('auth.login');

    }  

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function registration()

    {
        error_log('message here 2');
        return view('auth.registration');

    }

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postLogin(Request $request)

    {
        error_log('message here 3');
        $request->validate([

            'email' => 'required',

            'password' => 'required',

        ]);

   

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            error_log('message here 4');
            return redirect()->intended('dashboard')

                        ->withSuccess('You have Successfully loggedin');

        }

  

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

    }

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postRegistration(Request $request)

    {  
        error_log('message here 5');
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',

        ]);

           

        $data = $request->all();

        $check = $this->create($data);

         
        error_log('message here here here here');
        return redirect("/email/verify")->withSuccess('Great! You have Successfully loggedin');

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function dashboard()

    {
        error_log('message here 6');
        if(Auth::check()){

            return view('dashboard');

        }

  
        
        return redirect("/email/verify")->withSuccess('Opps! You do not have access');

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function create(array $data)

    {

      return User::create([

        'name' => $data['name'],

        'email' => $data['email'],

        'password' => Hash::make($data['password'])

      ]);

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout() {

        Session::flush();

        Auth::logout();

  

        return Redirect('login');

    }

}