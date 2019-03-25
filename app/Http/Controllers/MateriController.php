<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class MateriController extends Controller
{
    public function index($id){
      $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
      $firebase = (new Factory)
          ->withServiceAccount($serviceAccount)
          ->withDatabaseUri('https://laravel-firebase-beecoder77.firebaseio.com/')
          ->create();
      $database = $firebase->getDatabase();
      $ref = $database->getReference("Materi");
      $materi = $ref->getvalue();

      $data = $ref->orderByChild("ParentJurusanID")->equalTo($id)->getValue();

      foreach ($materi as $materi) {
        // Manggil Subjects (Arraynya)
        $all_materi[] = $materi;
      }

      return view('pages.materi', compact('all_materi'));

    }


      public function addMateri(Request $request, $id){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://laravel-firebase-beecoder77.firebaseio.com/')
            ->create();
            $database 		= $firebase->getDatabase();
        $ref = $database->getReference("Materi"); //Ngambil dari Subjects di firebase db realtime
        $materi = $ref->getvalue();

        $name = $request->name; //sesuai name form yg di profile.blade.php
        $link = $request->link; //sesuai name form yg di profile.blade.php
        $image = $request->image; //sesuai name form yg di profile.blade.php

        $key = $ref->push()->getKey(); //dapterin keynya

        //eksekusi ke dbnya, ambil child dari key, habis itu di add
        $ref->getChild($key)->set([
          'Name'=>$name,
          'Image'=>$image,
          'Link'=>$link,
          'ParentMateriId'=>$id
        ]);

        foreach ($materi as $materi) {
          // Manggil Subjects (Arraynya)
          $all_materi[] = $materi;
        }

        return view('pages.materi', compact('all_materi'));
      }
}
