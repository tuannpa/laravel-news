<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\Comment;

class AdminController extends Controller
{
    //
    public function index(){
    	$comment = Comment::latest()->take(10)->get();
    	$tintuc = TinTuc::latest()->take(10)->get();
    	return view('admin.home',['comment' => $comment, 'tintuc' => $tintuc]);
    }
}
