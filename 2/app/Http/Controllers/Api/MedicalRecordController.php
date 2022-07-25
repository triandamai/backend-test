<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\BloodPressure;
use App\Models\Sleep;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MedicalRequest;
use Illuminate\Support\Carbon;

class MedicalRecordController extends Controller
{
    protected $medicals, $sleeps, $bloogs;

    public function __construct(MedicalRecord $medicals, BloodPressure $bloods, Sleep $sleeps)
    {
        $this->medicals = $medicals;
        $this->bloods   = $bloods;
        $this->sleeps   = $sleeps;
    }

    public function get()
    {
        try {
            $medicals = $this->medicals
                                    ->paginate(10);

            return response()->json([
                'success'   => true,
                'data'      => $medicals
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success'   => false,
                'data'      => $e->getMessage()
            ]);
        }
    }

    public function detail($id)
    {
        try {
            $medicals = $this->medicals
                                    ->find($id);

            return response()->json([
                'success'   => true,
                'data'      => $medicals
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success'   => false,
                'data'      => $e->getMessage()
            ]);
        }
    }
    
    public function store(MedicalRequest $request)
    {
        try {
            $medicals = $this->medicals->create([
                'member_id'     => $request->member_id,
                'nurse_id'      => $request->nurse_id,
                'type'          => $request->type,
                'method'        => $request->method,
                'diagnosis'     => $request->diagnosis,
                'mime_type'     => $request->mime_type,
                'value'         => $request->value ? $request->value : null,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);

            if($request->type == 'SLEEP') {
                $this->sleeps->create([
                    'medical_id'    => $medicals->id,
                    'sleepStart'    => $request->sleepStart,
                    'sleepEnd'      => $request->sleepEnd,
                    'deepSleep'     => $request->deepSleep,
                    'lightSleep'    => $request->lightSleep,
                    'wakeTime'      => $request->wakeTime,
                ]);
            } else if ($request->type == 'BLOODPRESSURE') {
                $this->bloods->create([
                    'medical_id'    => $medicals->id,
                    'systole'       => $request->systole,
                    'disatole'      => $request->disatole
                ]);
            } 
            
            return response()->json([
                'success'   => true,
                'data'      => $medicals
            ], 201);
        } catch(\Exception $e) {
            return response()->json([
                'success'   => false,
                'data'      => $e->getMessage()
            ], 400);
        }
    }
}
