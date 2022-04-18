<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserCredential;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (Auth()->user()->role_id == 1) {
            return route('admin.dashboard');
        } elseif (Auth()->user()->role_id == 2) {
            return route('user.dashboard');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $placement_id = $data['placement_id'];
        $position_id = $data['position'];


        $user = User::create([
            'name' => $data['name'],
            'role_id' => 2,
            'email' => $data['email'],
            'terms' => 1,
            'user_name' => $data['user_name'],
            'sponsor' => $data['sponsor'],
            'position' => 1,
            'password' => Hash::make($data['password']),
            'placement_id' => $placement_id
        ]);

        return $user;



        if ($position_id == 1) {
            User::where('user_name', $placement_id)
                ->update(['left_side' => $user->user_name]);
        } else {
            User::where('user_name', $placement_id)
                ->update(['right_side' => $user->user_name]);
        }
        $this->binary_count($placement_id, $position_id);
    }

    public function showRegistrationForm(Request $request)
    {
        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }

        return view('auth.register');
    }
    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    // protected function registered(Request $request, $user)
    // {
    //     if ($user->sponsor !== null) {
    //         Notification::send($user->sponsor, new ReferrerBonus($user));
    //     }

    //     return redirect($this->redirectPath());
    // }


    public function binary_count($placement_id, $pos)
    {
        if ($pos == 1) {
            $pos = 'left_count';
            $pos_ac = 'left_active';
            // $totalamount = 'left_total';
        } else {
            $pos = 'right_count';
            $pos_ac = 'right_active';
            // $totalamount = 'right_total';
        }

        while ($placement_id != '' && $pos != '') {

            // DB::statement("UPDATE users SET $totalamount = `$totalamount`+$planAmount WHERE user_name = '$placement_id'");
            DB::statement("UPDATE users SET $pos = `$pos`+1 WHERE user_name = '$placement_id'");
            DB::statement("UPDATE users SET $pos_ac = `$pos_ac`+ 1 WHERE user_name = '$placement_id'");

            // $this->is_pair_generate($placement_id);
            $pos = $this->find_position_id($placement_id);
            $pos_ac = $this->find_active_position_id($placement_id);
            $placement_id = $this->find_placement_id($placement_id);
        }
    }

    public function find_position_id($placement_id)
    {

        $user_id = User::where('user_name', $placement_id)->first();
        $pos = $user_id->position;
        if ($pos == 1) {
            $pos = 'left_count';
        } elseif ($pos == 2) {
            $pos = 'right_count';
        }

        return $pos;
    }

    public function find_placement_id($placement_id)
    {

        $user_id = User::where('user_name', $placement_id)->first();
        return $user_id->placement_id;
    }

    public function find_active_position_id($placement_id)
    {

        $user_id = User::where('user_name', $placement_id)->first();
        $pos_ac = $user_id->position;
        if ($pos_ac == 1) {
            $pos_ac = 'left_active';
        } elseif ($pos_ac == 2) {
            $pos_ac = 'right_active';
        }

        return $pos_ac;
    }
}