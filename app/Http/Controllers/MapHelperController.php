<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapHelperController extends Controller
{
    public function getDistance(Request $request)
    {
        $lat1 = $request->lat1;
        $lat2 = $request->lat2;
        $long1 = $request->lng1;
        $long2 = $request->lng2;

        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?key=".config('app.map_api_key')."&origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=".$request->mode."&language=en-EN";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
//        return $response_a;
        $dist_txt = $response_a['rows'][0]['elements'][0]['distance']['text'];
        $time_txt = $response_a['rows'][0]['elements'][0]['duration']['text'];
        $dist = $response_a['rows'][0]['elements'][0]['distance']['value'];
        $time = $response_a['rows'][0]['elements'][0]['duration']['value'];

        if($dist){
            return array('distance' => $dist, 'time' => $time,'time_txt'=>$time_txt,'dist_txt'=>$dist_txt,'error'=>0);

        }else{
            return array('error' => 1);
        }
    }
}
