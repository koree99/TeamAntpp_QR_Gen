<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zxing\QrReader;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use SVG\SVG;
use SVG\Nodes\Shapes\SVGRect;
use App\Models\file; 

class GenController extends Controller
{
    public function index()
    {
        return view('generateqr');
    }

    public function generateqrcode(Request $request){
      $qrdb = new file;
        
        if($request->input('qtype')=='event'){
      /**
     * This function is reponsible for generating qr code and saving
     * it to db .
     *
     * 
     */
            $data=$request->all();
           $randomname= Str::random(8);
            $filepath='/qrcodes/'.$randomname.'.svg';
           $qr= QrCode::generate('Title: '.$data['ename'] .'ticket No: '.$data['data'].'Address: '. $data['addr'].' '.'event time:'.$data['time'].'Event Dress code'.$data['dresscode']);
           $qrdb->qr = base64_encode($qr);
          // $qrdb->user_id = Auth::user()->id;
           $qrdb->save();
          return view('viewqr')->with('imgurl',$qr);
        }elseif($request->input('qtype')=='address'){

            $latitude='1.2675674';
            $longitude='3.656456';
          
            $qr=QrCode::generate('geo:'.$latitude.','.$longitude);
            $qrdb->qr = base64_encode($qr);
           // $qrdb->user_id = Auth::user()->id;
            $qrdb->save();

            return  view('viewqr')->with('imgurl',$qr);

        }

    }

    public function showqr(){
      /**
     * This function is reponsible for displaying all qr code that a user has 
     * in the db .
     *
     * 
     */
   // $qrcodes = qrfile::where('user_id',Auth::user()->id)->get();
      $qrcodes = file::all();

     return view('showqr')->with('data',$qrcodes);
    }

    public function downloadqrpdf($qr){
/**
     * This function is allows  the user to downloader qr code in pdf format
     * .
     *
     * 
     */

      $pdf = \App::make('dompdf.wrapper');
  $html='<img src="data:image/svg+xml;base64,' . $qr . '" ...>';
  $pdf->loadHTML($html);

  return $pdf->download('myqr.pdf');

    }




    public function delete($id){

    /**
     * This function is reponsible for deleting qr code that a user wish to delete
     * it to db .
     *
     * 
     */
      $qrcodes = file::find($id);
      if($qrcodes){
          $destroy = file::destroy($id);
      }
      if ($destroy){

        $status=[
            'status'=>'1',
            'msg'=>'success'
        ];
    
    }else{
    
        $status=[
            'status'=>'0',
            'msg'=>'fail'
        ];
    
    }

    return redirect('/showqr')->with('status',$status);
    }
}
