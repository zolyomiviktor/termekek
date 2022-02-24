<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Termek;
use Validator;
use App\Http\Resources\Termek as TermekResource; 

class TermekController extends BaseController
{

    public function index()
    {
        $termeks = Termek::all();
        return $this->sendResponse(TermekResource::collection($termeks), 'A termékek lekérve!');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            "productname" => "required",
            "price" => "required",
            "commodity" => "required",
            "product_production_time" => "required"
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $termek = Termek::create($input);
        return $this->sendResponse(new TermekResource($termek), 'A termék létrehozva!');
    }

   
    public function show($id)
    {
        $termek= Termek::find($id);
        if (is_null($termek)) {
            return $this->sendError('A termék nem található!');
        }
        return $this->sendResponse(new TermekResource($termek), 'a termék lekérve.');
    }
    

    public function update(Request $request, Termek $termek)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            "productname" => "required",
            "price" => "required",
            "commodity" => "required",
            "product_production_time" => "required"
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $termek->productname = $input["productname"];
        $termek->price = $input["price"];
        $termek->commodity = $input["commodity"];
        $termek->product_production_time = $input["product_production_time"];
        $termek->save();
        
        return $this->sendResponse(new TermekResource($termek), 'A termék sikeresen frissítve!');
    }
   
    public function destroy(Termek $termek)
    {
        $termek->delete();
        return $this->sendResponse([], 'A termék törölve!');
    }





}