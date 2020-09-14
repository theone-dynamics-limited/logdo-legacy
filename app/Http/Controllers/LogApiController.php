<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\App;
use Illuminate\Http\Request;
use App\Http\Resources\AppApiTransformer;

class LogApiController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'appId' => 'required:string',
            'log' => 'required:string',
            'logLevel' => 'required:string',
        ]);

        try {
            $app = App::where('app_id', $request->appId)->get()->first();
            if (!$app || Auth::user()->id != $app->user_id) {
                return response()->json(['message' => "There is no app with that app id. Or token mismatch."], 400);
            }

            if(!$app->log($request, $app)){
                return response()->json(['message' => "Sorry, we couldn't log that, please check the data you are sending."], 400);
            }

            return response()->json(new AppApiTransformer($app), 202);
        } catch (\Throwable $th) {
            \Log::info($th->getFile());
            \Log::info($th->getLine());
            return response()->json([
                'message' => "Whoops! This is embarrassing: {$th->getMessage()}",
            ], 500);
        }
    }
}
