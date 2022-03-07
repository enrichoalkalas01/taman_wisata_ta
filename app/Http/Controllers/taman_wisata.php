<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\simple_location;
use App\Models\taman_wisata as TamanModels;

class taman_wisata extends Controller
{
    public function index(Request $request) {
        $DataSL = simple_location::all();
        $LowPrice = TamanModels::min('price');
        $HighPrice = TamanModels::max('price');
        if (
            ( $request->input('query') && $request->input('query') != '' ) || 
            ( $request->input('rating') && $request->input('rating') != '' )
        ) {
            $DataTaman = DB::table('taman_wisata')
                ->where('title', $request->input('query'))
                ->where('rating', $request->input('rating'))
                ->orWhere('description', 'like', '%' . $request->input('query') . '%')
                ->orWhere('simple_location', 'like', '%' . $request->input('query') . '%')
                ->simplePaginate(20);
        } else {
            echo "else";
            $DataTaman = DB::table('taman_wisata')->simplePaginate(20);
        }

        return view('wisata/index', [
            'data_taman' => $DataTaman,
            'DataSL' => $DataSL,
            'HighPrice' => $HighPrice,
            'LowPrice' => $LowPrice,
        ]);

        // SELECT * FROM taman_wisata WHERE price IN (SELECT MAX(price) FROM taman_wisata)
    }

    public function detail(Request $request, $id) {
        $UserData = Session::get('users');
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
        $DataFasilitas = DB::table('fasilitas')
                    ->where('taman_id', $id)
                    ->get();

        $DataFavourites = DB::table('favourites')
                        ->where('taman_id', $id)
                        ->where('user_id', $UserData->id)
                        ->get();

        return view('wisata/detail',[  
            'data_detail' => $DataDetail,
            'data_images' => $DataImages,
            'data_comment' => $DataComment,
            'data_fasilitas' => $DataFasilitas,
            'data_favourites' => $DataFavourites
        ]);
    }

    public function SeederDataTaman() {
        $Counted = 0;
        for ( $i = 250; $i < 300; $i++ ) {
            $models = new TamanModels;
            $models->users_id = 1;
            $models->title = 'Ini title ' . $i;
            
            if ( $i % 2 == 0 ) {
                $models->rating = 'tidak bagus';
                $models->simple_location = 'tiptop';
                $models->latitude = '-6.403005609582511';
                $models->longitude = '106.83529018425048';
                $models->price = $i * 100;
                // $models->simple_location = 'nusantara';
                // $models->latitude = '-6.393724041022173';
                // $models->longitude = '106.80834472294565';
                // $models->price = $i * 2500;
                
            } else {
                $models->rating = 'sangat tidak bagus';
                $models->simple_location = 'jembatan serong';
                $models->latitude = '-6.416864724604323';
                $models->longitude = '1106.7967449977435'; 
                $models->price = $i * 200;
                // $models->simple_location = 'citayam';
                // $models->latitude = '-6.448703561458972';
                // $models->longitude = '106.80243443934127';
                // $models->price = $i * 1500;
            }
            
            $models->thumbnail = '';
            $models->excerpt = 'ini excerpt dari title ' . $i;
            $models->description = 'bla bla bla bla bla bla bla bla bla bla bla bla';
            $models->maps = '';
            $models->save();
        }
    }
}

/* 
    SELECT * FROM `comment` INNER JOIN users ON users.id = comment.users_id INNER JOIN profile on profile.users_id = comment.users_id WHERE taman_wisata_id = 1
    SELECT * FROM taman_wisata c WHERE c.price < 50000 AND NOT EXISTS ( SELECT * FROM taman_wisata c1 WHERE c1.price < c.price AND c1.rating LIKE '%bagus%' AND ( c1.price < c.price ) )
    SELECT * FROM taman_wisata WHERE taman_wisata.simple_location = 'sawangan' AND NOT EXISTS ( SELECT * FROM taman_wisata WHERE taman_wisata.simple_location = 'sawangan' AND taman_wisata.price > 0 AND taman_wisata.rating LIKE '%bagus%' )
*/


/*
DB::table('tib_db.tb_request')
->join('tib_db.tb_cob', 'tib_db.tb_request.cob_code', '=', 'tib_db.tb_cob.id')
->join('tib_client.tb_client', 'tib_db.tb_request.client_id', '=', 'tib_client.tb_client.id')
->join('tib_db.tb_events_log', 'tib_db.tb_request.id', '=', 'tib_db.tb_events_log.req_id')
->join('tib_db.tb_events', 'tib_db.tb_events_log.event_id', '=', 'tib_db.tb_events.id')
->select('tib_db.tb_request.*', 'tib_db.tb_cob.cob_code', 'tib_client.tb_client.name', 'tib_db.tb_events.event_name', 'tib_db.tb_events_log.event_id')   
->get();
*/