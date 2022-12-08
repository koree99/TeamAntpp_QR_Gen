<?php

namespace App\Http\Controllers;
use Zxing\QrReader;
use Illuminate\Http\Request;

class DecodeQrController extends Controller
{
    public function index(){

        return view('scanqr');
      }
    
    public function scanqr(Request $request){
        /*
|--------------------------------------------------------------------------
| This function takes in A QR image and Read it 
|--------------------------------------------------------------------------
|
|
*/
        $request->validate(['image'=>'required|image|mimes:png,jpg,svg|max:2048']);
       $qrcode = new QrReader($request->image);
        $text = $qrcode->text();
        
       return view('decoded')->with('data',$text);

      }
}
