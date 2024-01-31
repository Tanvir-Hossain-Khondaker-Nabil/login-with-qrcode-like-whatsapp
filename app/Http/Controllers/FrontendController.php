<?php

namespace App\Http\Controllers;

use App\Models\Qrcode as ModelsQrcode;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.modules.step1');
    }

    public function qr(){

        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        QrCode::size(600)
        ->format('png')
        ->generate($string, public_path($string.'.png'));

        ModelsQrcode::create([
            'qrcode' => $string,
            'qr' => $string.'.png',
            
        ]);
        $qr = ModelsQrcode::where('qr',$string.'.png')->first();
        return view('frontend.modules.step2',compact('qr','string'));
    }

    public function service(){
        return view('frontend.modules.step3');
    }

    public function account(){
        return view('frontend.modules.step4');
    }

    public function receipt(){
        return view('frontend.modules.step5');
    }

    public function complete(){
        return view('frontend.modules.step6');
    }


    public function backend(){
        return view('frontend.backend.modules.index');
    }

    public function scanner(){
        return view('frontend.backend.modules.scanner');
    }

    public function getQrCode(Request $request,$id){

        // $qr_code = ModelsQrcode::where('qrcode',$id)->get();
        // return response()->json($qr_code) ;

        $qr_code = ModelsQrcode::where('qrcode',$id)->update(["status" => "1","receiver_id" => $request->userId]);

    }
    public function findQr($id){

        $qr_code = ModelsQrcode::where('qrcode',$id)->where('status','1')->get();
        return response()->json($qr_code) ;

        // $qr_code = ModelsQrcode::where('qrcode',$id)->update(["status" => "1","receiver_id" => $request->userId]);

    }
}
