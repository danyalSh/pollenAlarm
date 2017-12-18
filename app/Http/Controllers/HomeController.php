<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;

class HomeController extends Controller
{
    public function index(Request $request){
        $req = $request->instance();
        //$request->setTrustedProxies(array('127.0.0.1')); // only trust proxy headers coming from the IP addresses on the array (change this to suit your needs)
        $ip = $req->getClientIp();
        $location = geoip($ip);
        //dd($x);
        return view('home.home')->with('location', $location);
    }

    public function contact(){
        return view('contact.contact');
    }
}
