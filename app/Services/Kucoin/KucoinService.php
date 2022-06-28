<?php

namespace App\Services\Kucoin;

use App\Models\Kucoin;
use KuCoin\SDK\PrivateApi\Account;
use KuCoin\SDK\Http\SwooleHttp;
use KuCoin\SDK\PublicApi\Symbol;
use KuCoin\SDK\PrivateApi\Order;
use KuCoin\SDK\PublicApi\Time;
use KuCoin\SDK\KuCoinApi;
use KuCoin\SDK\Exceptions\HttpException;
use KuCoin\SDK\Exceptions\BusinessException;
use KuCoin\SDK\Auth;
use DB;

class KucoinService {

    public function createUser(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        return Kucoin::create($data);
    }


    public function verifyUser($key, $secret, $passphrase)
    {
        KuCoinApi::setBaseUri('https://openapi-sandbox.kucoin.com');
        // $key = "62b9d1072b968a0001539717";
        // $secret = "4765165e-26b8-4859-a229-fb9bde6b246b";
        // $passphrase = "Emperor003";

        $auth = new Auth($key, $secret, $passphrase, Auth::API_KEY_VERSION_V2);

        $api = new Account($auth);
        try {
            $result = $api->getList();
            return $result;
        } catch (HttpException $e) {
            $error = explode("body=",$e->getMessage());
            return $error['2'];
        } catch (BusinessException $e) {
            return $e->getMessage();
        }
    }

    public function placeOrder($key, $secret, $passphrase, $data)
    {

        $signature = $this->signature($method, $request_path, $data);
        $passphrase = $this->passphrase($passphrase, $secret);
        $url = env('KUCOIN_TEST_URL') . "api/v1/orders";

        $ch = curl_init();
        $headr = [];
        $headr[] = "Content-Type:application/json";
        $headr[] = "KC-API-KEY:".$key;
        $headr[] = "KC-API-TIMESTAMP:".intval(microtime(true) * 1000);
        $headr[] = "KC-API-PASSPHRASE:".$passphrase;
        $headr[] = "KC-API-SIGN:".$signature;
        $headr[] = "KC-API-KEY-VERSION:". 2;
        
        curl_setopt($ch, CURLOPT_URL, "$url");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec($ch);

        $check = json_decode($server_output);

        return $server_output; // returns order id and status code for 200000:success
    }

    //generate passphrase for kc-api-passphrase
    public function passphrase($passphrase, $secret)
    {
       return base64_encode(hash_hmac('sha256', $passphrase, $secret, true));
    }

    public function signature($method, $request_path, $data)
    {
        $timestamp = intval(microtime(true) * 1000);
        $method = 'POST';
        $request_path = '/api/v1/orders';
       
        $body = is_array($data) ? json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : $data;
        $timestamp = $timestamp ? $timestamp : time();
        $what = $timestamp.$method.$request_path.$body;
  
        
        return base64_encode(hash_hmac("sha256", $what, $secret, true));
    }
}