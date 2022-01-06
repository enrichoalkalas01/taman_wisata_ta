<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class taman_wisata extends Controller
{
    public function index(Request $request) {
        if ( $request->input('query') ) {
            $DataTaman = DB::table('taman_wisata')
                        ->where('title', $request->input('query'))
                        ->orWhere('title', 'like', '%' . $request->input('query') . '%')
                        ->orWhere('excerpt', 'like', '%' . $request->input('query') . '%')
                        ->orWhere('description', 'like', '%' . $request->input('query') . '%')
                        ->simplePaginate(20);
        } else {
            $DataTaman = DB::table('taman_wisata')->simplePaginate(20);
        }

        return view('wisata/index', [
            'data_taman' => $DataTaman
        ]);
    }

    public function detail(Request $request, $id) {
        $DataDetail = DB::table('taman_wisata')->where('id', $id)->get()->first();
        $DataImages = DB::table('images')
                    ->where('type_table', 'taman_wisata')
                    ->where('type', 'images')
                    ->orWhere('type', 'imageslink')
                    ->where('relation_id', $DataDetail->id)
                    ->get();
        $DataComment = DB::table('comment')
                    ->join('users', 'users.id', '=', 'comment.users_id')
                    ->join('profile', 'profile.users_id', '=', 'comment.users_id')
                    ->get();

        return view('wisata/detail',[  
            'data_detail' => $DataDetail,
            'data_images' => $DataImages,
            'data_comment' => $DataComment
        ]);
    }
}

/* SELECT * FROM `comment` INNER JOIN users ON users.id = comment.users_id INNER JOIN profile on profile.users_id = comment.users_id WHERE taman_wisata_id = 1 */

/*
DB::table('tib_db.tb_request')
->join('tib_db.tb_cob', 'tib_db.tb_request.cob_code', '=', 'tib_db.tb_cob.id')
->join('tib_client.tb_client', 'tib_db.tb_request.client_id', '=', 'tib_client.tb_client.id')
->join('tib_db.tb_events_log', 'tib_db.tb_request.id', '=', 'tib_db.tb_events_log.req_id')
->join('tib_db.tb_events', 'tib_db.tb_events_log.event_id', '=', 'tib_db.tb_events.id')
->select('tib_db.tb_request.*', 'tib_db.tb_cob.cob_code', 'tib_client.tb_client.name', 'tib_db.tb_events.event_name', 'tib_db.tb_events_log.event_id')   
->get();
*/