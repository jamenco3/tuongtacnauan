<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\WebsocketDemoEvent;

class HiHiController extends Controller
{
    public function hihi(){
        broadcast(new WebsocketDemoEvent('some data','some face'));
    
    
        return view('welcome');
    }
}
