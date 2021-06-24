<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\User;
use Session;
// use Auth;



class LoginController extends Controller
{
    public function index(){
        return view('admin.admin_dashboard');
    } 

    public function loginPage(){

        return view('admin.auth.login');

    }

    public function RegisterPage(){

        return view('admin.auth.register');

    }
    public function login(Request $request)
    {
        try{

            $rules = array(
                'email' => 'required|email',
                'password' => 'required|'
            );
            

            $remember_me = $request->has('remember') ? true : false;
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                
                return Redirect::to('/')
                    ->withErrors("Email and Password is required to login.")
                    ->withInput(Input::except('password'));
            } 

            else {

                $userdata = array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password'),
                );
                
                if (Auth::attempt($userdata, $remember_me)) {
                    $uid=Auth::user()->id;
                    $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
                    User::where('id',$uid)->update(['login_at'=>$now,'ip_address'=>request()->ip(),'user_agent'=>$request->header('User-Agent')]);
                    Session::flash ('welcome_msg', "Welcome, You are logged in at".$now."." );
                    return Redirect::to('admin/dashboard');

                } else {

                    return Redirect::to('/admin')
                        ->withErrors("The credentials do not match our records");
                }

            }
            
        }catch(Exception $e){

            return redirect()->back()
                ->withErrors($e->getMessage());
        }
    }

    public function register_user(Request $request)
   {
        try{
             $rules = array(
                      'name' => 'required',
                      'email' => 'required|email|unique:users,email',
                      'user_type' => 'required',
                      'password' => 'required',
                      
                     
                );
            $validator = Validator::make($request->all(), $rules
                ,
                [
                  'name.required' => 'Name field is required',
                  'email.required' => 'Email field is required',
                  'email.unique' => 'Email is has already taken',
                  'password.required' => 'Password field is required',
                  'user_type.required' => 'User Type field is required',
                ]
            );

            if ($validator->fails())
            {

                return redirect()->back()->withErrors($validator)->withInput();
            }
            else
            {
                $requestrecd = $request->all();

                $requestData['name'] = $requestrecd['name'];
                $requestData['email'] = $requestrecd['email'];
                $requestData['user_type'] =  $requestrecd['user_type'];
                $requestData['password'] = bcrypt($requestrecd['password']);
                $requestData['user_type'] = 2;
                $requestData['ip_address'] = request()->ip();
                $requestData['user_agent'] =   $request->header('User-Agent');
                // echo request()->ip();
                // dd($request->all());
                $user = User::create($requestData);
                Auth::login($user);
                if ($user) {
                    $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
                    
                    Session::flash ('welcome_msg', "Welcome, You are logged in at".$now."." );
                  return Redirect('/admin/dashboard');
                }else{
                    Session::flash ('message_error', "Something get wrong ,Please try again." );
                    return Redirect('/admin/register');
                }
                
            }
        } catch(QueryException $ex){ 
            Session::flash ('message_error', $ex->getMessage());
            return Redirect('/admin/register');
        }
   }

    public function logout(Request $request) {
        $uid=Auth::user()->id;
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        User::where('id',$uid)->update(['logout_at'=>$now]);
        Auth::logout();

        return Redirect::to('/admin')->withMessage('Logged out successfully.');
    }
}
