<?php

namespace App\Http\Controllers;
use App\Models\big;
use App\Models\data;
use Illuminate\Http\Request;


class listdata
{
public function list(Request $request)
{
    $resellerURL = 'https://integration.mcd.5starcompany.com.ng/api/reseller/';

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL =>$resellerURL . 'list',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('service' => 'data','coded' => $request->name),
        CURLOPT_HTTPHEADER => array(
            'Authorization: mcd_key_75rq4][oyfu545eyuriup1q2yue4poxe3jfd'
        ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);
//    return $response;

    $data = json_decode($response, true);

    $body=$data['data'];


    return view('service', ['data'=>$body, 'result'=>true]);

}
public function lis()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.honourworld.com.ng/api/v1/set/webhook/url',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
    "url" : "https://mobile.primedata.com.ng/api/honor"
}',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer {{Token}}',
            'Content-Type: application/json',
            'Accept: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

}
}
