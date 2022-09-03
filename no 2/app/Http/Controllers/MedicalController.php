<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalRequest;
use App\Models\{ Medical, Sleep, Bloodpressure };
use Illuminate\Support\ {Carbon, Str};

class MedicalController extends Controller
{
    public function index()
    {
        try {
            $medicals = Medical::paginate(2);
            $res = [
                'message' => 'List Medicals',
                'data' => $medicals
            ];

        return response()->json($res, 200);

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function show($id)
    {
        try {
            $medical = Medical::findOrFail($id);
            $res = [
                'message' => 'Detail Medical',
                'data' => $medical
            ];

            return response()->json($res,200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function store(MedicalRequest $request)
    {
        try {
            $medicals = Medical::create([
                'member_id' => Str::random(12),
                'nurse_id' => Str::random(12),
                'type' => $request->type,
                'method' => $request->method,
                'diagnosis' => $request->diagnosis,
                'note' => $request->note,
                'mime_type' => $request->mime_type,
                'value' => $request->value ? $request->value:null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            if($request->type == 'SLEEP') {
                Sleep::create([
                    'medical_id' => $medicals->id,
                    'sleepStart' => $request->sleepStart,
                    'sleepEnd' => $request->sleepEnd,
                    'deepSleep' => $request->deepSleep,
                    'lightSleep' => $request->lightSleep,
                    'wakeTime' => $request->wakeTime
                ]);
            } else if ($request->type == 'BLOODPRESSURE') {
                Bloodpressure::create([
                    'medical_id' => $medicals->id,
                    'systole' => $request->systole,
                    'disatole' => $request->disatole
                ]);
            } 

            $res = [
                'message' => 'Created',
                'data' => $medicals
            ];
                    
            return response()->json($res,201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
       
}
