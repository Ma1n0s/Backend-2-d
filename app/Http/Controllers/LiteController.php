<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiteController extends Controller
{
    protected $LiteURL = "https://xn--24-9kc.xn--d1ao9c.xn--p1ai/rest/3315/gpwqg6idjvlrhp01/crm.lead.list.json";

    public function index(){

        $client = new Client();

        $LiteList = [
            'order' =>  [ 'STATUS_ID:' => 'ASC' ],
            'filter' => [ '>OPPORTUNITY' => 0, '!STATUS_ID:' =>'CONVERTED' ],
            'select' => [ 'ID', 'TITLE', 'STATUS_ID', 'OPPORTUNITY', 'CURRENCY_ID' ]
        ];

        try{
            $response = $client->get($this-$LiteList,[
                'Test' -> $LiteList
            ]);
            $data = json_encode($response->getBody(),TRUE);

            if(isset($data['result'])){
                return view("test", ["leads" => $data['result']]);
            } else {
                return response()->json(['error' => $date['error_result']]);
            }
        }catch(Except $err){
            return response()->json(['error' => $err->getMessange()]);
        }
    }
}
