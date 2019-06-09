<?php

namespace App\Http\Controllers;

use App\Model\PlayerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    private $successStatus = 200;
    private $validateStatus = 403;
    private $saveError=405;

    //
    function updatePlayer(PlayerModel $playerModel,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->validateStatus);
        }

        $playerModel->fname=$request->fname;
        $playerModel->lname=$request->lname;
        $check=$playerModel->save();

        if(!$check)
            return response()->json(['error' => 'Information could not be saved'], $this->saveError);


        return response()->json(['success' => 'player updated'], $this->successStatus);


    }

    function search_player(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->validateStatus);
        }

        return response()->json(['success'=>['result'=>PlayerModel::select('id','fname','lname')->wherefname($request->fname)->get()]],$this->successStatus);

    }



}
