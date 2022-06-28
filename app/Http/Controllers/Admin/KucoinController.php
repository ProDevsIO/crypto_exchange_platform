<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Services\Kucoin\KucoinService;
use DB;

class KucoinController extends Controller
{
    //notice 
    //kucoin passphrase: passWORD1234#
    //secret :
    //api_name: ezechime50@icloud.com
    //kucoin key: 62b9a68362fa710001f9f40c

    /* kucoin test secret : 4765165e-26b8-4859-a229-fb9bde6b246b
        kucoin test key: 62b9d1072b968a0001539717
        ucoin passphrase: Emperor003
    */

    public function index()
    {
       
        return view('admin.kucoin.list');
    }

    public function addAccount(Request $request)
    {
        $this->validate($request, [
            'account_name' => "required",
            'api_token' => "required",
            'secret' => "required",
            'passphrase' => "required"
        ]);

        DB::beginTransaction();
        try {

            $kucoinService = new kucoinService;
            $verifyAccount = $kucoinService->verifyUser($request->api_token, $request->secret, $request->passphrase); //test credentials with a get list endpoint
          
            if(!is_array($verifyAccount))
            {
                session()->flash('alert-danger', "Verification Error ". $verifyAccount);
                logger()->error($verifyAccount);
                return back()->withInput();
            }

            $kucoinService->createUser($request->all());

            DB::commit();

            session()->flash('alert-success', "Kucoin account saved successfully");
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            logger()->error($e);
            session()->flash('alert-danger', "Couldnt complete this action. ". $e->getMessage());
            return back()->withInput();
        }

        // KuCoinApi::setBaseUri('https://openapi-sandbox.kucoin.com');
        // $key = "62b9d1072b968a0001539717";
        // $secret = "4765165e-26b8-4859-a229-fb9bde6b246b";
        // $passphrase = "Emperor003";

        // $auth = new Auth($key, $secret, $passphrase, Auth::API_KEY_VERSION_V2);

        // $api = new Account($auth);

        // try {
        //     $result = $api->getList();
        //     dump($result);

        //     //symbol list
        //     $api = new Symbol();
        //     $result = $api->getList(['type' => 'main']);
        //     dump($result);

        //     //make order
        //     $data = [
        //         'clientOid' => uniqid(),
        //         'price'     => '0.03',
        //         'size'      => '1',
        //         'symbol'    => 'ETH-USDT',
        //         'type'      => 'market',
        //         'side'      => 'sell',
        //         'remark'    => 'ORDER#' . uniqid(),
        //     ];
           
            

        //     $timestamp = intval(microtime(true) * 1000);
        //     $method = 'POST';
        //     $request_path = '/api/v1/orders';
            
        //     $body = is_array($data) ? json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : $data;
        //     $timestamp = $timestamp ? $timestamp : time();
        //     $what = $timestamp.$method.$request_path.$body;
    
          
        //     $signature = base64_encode(hash_hmac("sha256", $what, $secret, true));
            
        //     $ch = curl_init();
        //     $headr = [];
        //     $headr[] = "Content-Type:application/json";
        //     $headr[] = "KC-API-KEY:".$key;
        //     $headr[] = "KC-API-TIMESTAMP:".intval(microtime(true) * 1000);
        //     $headr[] = "KC-API-PASSPHRASE:".base64_encode(hash_hmac('sha256', $passphrase, $secret, true));
        //     $headr[] = "KC-API-SIGN:".$signature;
        //     $headr[] = "KC-API-KEY-VERSION:". 2;
            
        //     curl_setopt($ch, CURLOPT_URL, "https://openapi-sandbox.kucoin.com/api/v1/orders");
        //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
        //     curl_setopt($ch, CURLOPT_POST, 1);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        //     $server_output = curl_exec($ch);
        //     dd($server_output);
        //     curl_close($ch);
        //     dd( $request2 );
        // } catch (\Exception $e) {
        //     dd($e);
        // } 
        // dd();
    }
}
