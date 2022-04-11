<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ReferralController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.refferals.refferals', compact('users'));
    }

    public function updatePosition(Request $request)
    {

        $id = $request->id;
        $request->validate([
            'position' => 'required'
        ]);
        $user = User::find($id);
        $user->position = $request->position;
        $user->save();

        $placement_id = $request->placement_id;
        $position_id = $request->position;

        if ($position_id == 1) {
            User::where('user_name', $placement_id)
                ->update(['left_side' => $user->user_name]);
        } else {
            User::where('user_name', $placement_id)
                ->update(['right_side' => $user->user_name]);
        }
        $this->binary_count($placement_id, $position_id);

        $notification = array(
            'message' => 'Your sponsor position is updated!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

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







    public function getSponsor(Request $request)
    {

        $userName = User::where('user_name', 'like', $request->search)->first();
        if ($userName) {
            //dd($userName['user_name']);
            return response()->json(['success' => '<span style="color: green;">User found!!</span>', 'data' => $userName['user_name']], 200);
        } else {
            // dd('userName');
            return response()->json(['success' => '<span style="color: red;">User not found!!</span>'], 200);
        }
    }


    public function checkPosition(Request $request)
    {
        $userName = User::where('user_name', 'like', $request['sponsor'])->pluck('user_name')->first();
        $check_position = User::where('placement_id', $userName)->where('position', $request['position'])->orderBy('id', 'desc')->first();
        if (is_null($check_position)) {
            $first = User::where('user_name', $userName)->orderBy('id', 'desc')->first();
            return  $first->user_name;
        } else {
            $all = $check_position->childrenRecursive;
        }
        // loop through category ids and find all child categories until there are no more
        if (count($all) > 0) {
            foreach ($all as $subcat) {
                if (count($subcat->childrenRecursive) > 0) {
                    //dd($subcat->childrenRecursive());
                    foreach ($subcat->childrenRecursive as $item) {
                        return $this->check($item);
                    }
                } else {
                    return $subcat->user_name;
                }
            }
        } else {
            return $check_position->user_name;
        }
    }

    public function check($subcat)
    {
        if (count($subcat->childrenRecursive) > 0) {
            foreach ($subcat->childrenRecursive as $item) {
                return  $this->check($item);
                //return $item->user_name;
            }
        } else {
            return $subcat->user_name;
        }
    }
}
