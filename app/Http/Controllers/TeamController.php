<?php

namespace App\Http\Controllers;

use App\Model\PlayerModel;
use App\Model\TeamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    private $successStatus = 200;
    private $validateStatus = 403;
    private $saveError=405;

    //
    function getTeamPlayers(TeamModel $teamModel)
    {

        $result['team']=['name'=>$teamModel->name];
        $result['players']=PlayerModel::whereTeam_id($teamModel->id)->get();

        return response()->json($result);

    }

    function updateTeam(TeamModel $teamModel,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->validateStatus);
        }

        $teamModel->name=$request->name;
        $check=$teamModel->save();

        if(!$check)
            return response()->json(['error' => 'Information could not be saved'], $this->saveError);


        return response()->json(['success' => 'team updated'], $this->successStatus);

    }

    function search_team(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->validateStatus);
        }

        return response()->json(['success'=>['result'=>TeamModel::select('id','name')->whereName($request->name)->get()]],$this->successStatus);

    }



}
