<?php

namespace App\Http\Controllers;

use App\Jobs\SalesCsvProcess;
use App\Models\Salses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class SaleController extends Controller
{

    public function index(){

    }
    public function upload(Request $request){

        $header = [];
        if($request->file('myfile')){
            $file = $request->file('myfile');
            if ($file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
                $tempPath = $file->getRealPath();
                $fileSize = $file->getSize(); //Get size of uploaded file in bytes
                $location = 'uploads'; //Created an "uploads" folder for that
                $file->move($location, $filename);
                $filepath = public_path($location . "/" . $filename);
                //$data = array_map('str_getcsv', file($filepath));
                $allDataRecords = file($filepath);
                //Chunking file
                $dataChunks = array_chunk($allDataRecords, 1000);  
                $batch = Bus::batch([])->dispatch();

                foreach ($dataChunks as $key => $chunk) {
                    $data = array_map('str_getcsv', $chunk);
                    if($key === 0){
                        $header = $data[0];
                        unset($data[0]);
                    }  
                    $batch->add(new SalesCsvProcess($data,$header));
                    //SalesCsvProcess::dispatch($data,$header);
                }
                return $batch;
            }
        }
       return 'please upload file';
    }

    public function batch(){

        $batchId = Request('id');
        return  Bus::findBatch($batchId);
    }
}
