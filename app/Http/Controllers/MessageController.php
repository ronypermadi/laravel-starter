<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use URL;
use Auth;

class MessageController extends Controller
{
    public function index_view ()
    {
        return view('pages.message-data', [
            'message' => Message::class
        ]);
    }
    public function listUser(){
        $url=URL::to('/panel/message');
        $users = User::select('id','name')->orderBy('name','ASC')->get();

        foreach($users as $user){
            if(Auth::user()->id != $user->id){
                echo '<a href="'.$url.'/'.$user->id.'">
                        <li class="media"><img alt="image" class="mr-3 rounded-circle" width="50" src="'.asset('img/Logo.png').'"><div class="media-body"><div class="mt-0 mb-1 font-weight-bold">'.$user->name.'</div><div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div></div></li></a>';
            }
        }
    }
    public function autocomplete_searchUser(Request $request)
    {
        if($request->ajax()) {
            $url=URL::to('/panel/message');
            $users = User::where('name', 'LIKE', $request->autocomplete_searchUser.'%')->get();
           
            $output = '';
           
            if (count($users)>0) {
                foreach($users as $user){
                    if(Auth::user()->id != $user->id){
                        $output .= '<a href="'.$url.'/'.$user->id.'">
                        <li class="media"><img alt="image" class="mr-3 rounded-circle" width="50" src="'.asset('img/Logo.png').'"><div class="media-body"><div class="mt-0 mb-1 font-weight-bold">'.$user->name.'</div><div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div></div></li></a>';
                    }
                }
            }
            else {
                $output .= '<div class="row"><div class="col-sm-12 col-xs-12">'.'Pencarian tidak ditemukan'.'</div></div>';
            }
            return $output;
        }
    }

}
