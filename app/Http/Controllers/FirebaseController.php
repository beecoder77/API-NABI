<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    public function index(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://laravel-firebase-beecoder77.firebaseio.com/')
            ->create();
            $database 		= $firebase->getDatabase();
        $ref = $database->getReference("Jurusan"); //Ngambil dari Subjects di firebase db realtime
        $jurusan = $ref->getvalue();

        foreach ($jurusan as $key => $jurusan) { //kenapa as $key? biar nanti keynya bisa sama kaya id (intinya sih biar ngga jadi random string aja)
          // Manggil Subjects (Arraynya)
          $all_jurusan1 = $jurusan;
          $all_jurusan1['key'] = $key;

          $all_jurusan[] = $all_jurusan1;
        }

        return view('pages.jurusan', compact('all_jurusan'));
        // return json_encode($all_profile);
    }

    public function addData(Request $request){
      $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
      $firebase = (new Factory)
          ->withServiceAccount($serviceAccount)
          ->withDatabaseUri('https://laravel-firebase-beecoder77.firebaseio.com/')
          ->create();
          $database 		= $firebase->getDatabase();
      $ref = $database->getReference("Jurusan"); //Ngambil dari Subjects di firebase db realtime
      $jurusan = $ref->getvalue();

      $name = $request->name; //sesuai name form yg di profile.blade.php
      $image = $request->image; //sesuai name form yg di profile.blade.php

      $key = $ref->push()->getKey(); //dapterin keynya

      //eksekusi ke dbnya, ambil child dari key, habis itu di add
      $ref->getChild($key)->set([
        'Name'=>$name,
        'Image'=>$image
      ]);

      foreach ($jurusan as $key => $jurusan) { //kenapa as $key? biar nanti keynya bisa sama kaya id (intinya sih biar ngga jadi random string aja)
        // Manggil Subjects (Arraynya)
        $all_jurusan1 = $jurusan;
        $all_jurusan1['key'] = $key;

        $all_jurusan[] = $all_jurusan1;
      }

      return view('pages.jurusan', compact('all_jurusan'));
    }
}
