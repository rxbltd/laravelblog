<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
    	$subscribers = Subscriber::latest()->get();
    	return view('admin.subscriber',compact('subscribers'));
    } 

    public function destroy($subscriber)
    {
    	$subscriber = Subscriber::findOrFail($subscriber);
    	$subscriber->delete();
    	Toastr::success('Subscriber Delete Successfully','Success');
    	return redirect()->back();
    }
}
