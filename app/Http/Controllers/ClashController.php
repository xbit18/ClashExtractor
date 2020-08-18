<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClashController extends Controller
{
    public function index(){
        $AUTH_KEY = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjUxMzAwOTYwLTljZGUtNDQ1OC05ZDBmLTRiZmU2ZTNiNTQ2NCIsImlhdCI6MTU5NzcxMjYyNywic3ViIjoiZGV2ZWxvcGVyLzNiZTJkZDNkLTk1MjQtZGFjYS1iMWE3LTU4NjJlMjBmNDdjZSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE1My45Mi4wLjEyIl0sInR5cGUiOiJjbGllbnQifV19.1VObONcTsMPxEdhl37nihmlUwX9XzJrJT5fQaKGRrTar5p_jUbOZl-P3GITXpCIot8UqMwGSPin_fHhp0ZXVog";

        $response = Http::withToken($AUTH_KEY)->get("https://api.clashofclans.com/v1/clans/%239V2VJQ9P");

        $members = array();
        foreach ($response["memberList"] as $member){
            $members[] = $member["name"];
        }
        return view('welcome', ['members' => $members]);
        return $response;
    }

    public function extract(Request $request){
        $members = $request->members;
        $quantity = $request->number;
        $extracted = array();

        for($i = 0; $i < $quantity; $i++){
            do {
                $member = $members[array_rand($members)];
            } while(in_array($member, $extracted));

            $extracted[] = $member ;
        }
        return view('extracted', ['extracted' => $extracted, 'members'=>$members, 'quantity'=>$quantity]);
        //return $quantity;
        
    }
}
