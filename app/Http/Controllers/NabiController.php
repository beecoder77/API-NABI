<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;


class NabiController extends Controller
{
  public function index(){
      $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
      $firebase = (new Factory)
          ->withServiceAccount($serviceAccount)
          ->withDatabaseUri('https://laravel-firebase-beecoder77.firebaseio.com/')
          ->create();
          $database 		= $firebase->getDatabase();
      $ref = $database->getReference("Nabi"); //Ngambil dari Subjects di firebase db realtime
      $nabi = $ref->getvalue();

      foreach ($nabi as $nabi) {
        // Manggil Subjects (Arraynya)
        $all_nabi[] = $nabi;
      }

      return view('pages.nabi', compact('all_nabi'));
      // return json_encode($all_nabi);
  }

  public function addData(Request $request){
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravel-firebase-beecoder77.firebaseio.com/')
        ->create();
        $database 		= $firebase->getDatabase();
    $ref = $database->getReference("Nabi"); //Ngambil dari Subjects di firebase db realtime
    $nabi = $ref->getvalue();

    $nama = $request->nama;
    $alias = $request->alias;
    $usia = $request->usia;
    $periode = $request->periode;
    $tempatDiutus = $request->tempatDiutus;
    $tempatWafat = $request->tempatWafat;
    $disebutDalamAlQuran = $request->disebutDalamAlQuran;
    $sebutanKaum = $request->sebutanKaum;
    $jumlahKeturunan = $request->jumlahKeturunan;

    $key = $ref->push()->getKey(); //dapterin keynya

    //eksekusi ke dbnya, ambil child dari key, habis itu di add
    $ref->getChild($key)->set([
      'nama'=>$nama,
      'alias'=>$alias,
      'usia'=>$usia,
      'periode'=>$periode,
      'tempatDiutus'=>$tempatDiutus,
      'tempatWafat'=>$tempatWafat,
      'disebutDalamAlQuran'=>$disebutDalamAlQuran,
      'sebutanKaum'=>$sebutanKaum,
      'jumlahKeturunan'=>$jumlahKeturunan
    ]);

    foreach ($nabi as $nabi) {
      $all_nabi[] = $nabi;
    }

    return view('pages.nabi', compact('all_nabi'));
  }

  public function api(){
      $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
      $firebase = (new Factory)
          ->withServiceAccount($serviceAccount)
          ->withDatabaseUri('https://laravel-firebase-beecoder77.firebaseio.com/')
          ->create();
          $database 		= $firebase->getDatabase();
      $ref = $database->getReference("Nabi"); //Ngambil dari Subjects di firebase db realtime
      $nabi = $ref->getvalue();

      foreach ($nabi as $nabi) {
        // Manggil Subjects (Arraynya)
        $all_nabi[] = $nabi;
      }

      // return view('pages.nabi', compact('all_nabi'));
      return json_encode($all_nabi);
  }
}
