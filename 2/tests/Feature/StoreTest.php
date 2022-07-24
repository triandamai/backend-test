<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /** @test */
    public function TemperatureSuccessTest()
    {
        $response = $this->post(route('medical.store'), [
                                    'member_id'     => 'overtime_method',
                                    'nurse_id'      => '1',
                                    'type'          => 'TEMPERATURE',
                                    'value'         => 27.50,
                                    'method'        => 'MANUAL',
                                    'diagnosis'     => 'ini diagnos',
                                    'note'          => 'ini note',
                                    'mime_type'     => 'ini mime type'
                                ]);

        $response->assertStatus(201);
    }

    /** @test */
    public function BloodSuccessTest()
    {
        $response = $this->post(route('medical.store'), [
                                    'member_id'     => 'overtime_method',
                                    'nurse_id'      => '1',
                                    'type'          => 'BLOODPRESSURE',
                                    'method'        => 'MANUAL',
                                    'diagnosis'     => 'ini diagnos',
                                    'note'          => 'ini note',
                                    'mime_type'     => 'ini mime type',
                                    'systole'       => 'systole',
                                    'disatole'      => 'disatole'
                                ]);

        $response->assertStatus(201);
    }

    /** @test */
    public function BloodFailTest()
    {
        $response = $this->post(route('medical.store'), [
                                    'member_id'     => 'overtime_method',
                                    'nurse_id'      => '1',
                                    'type'          => 'BLOODPRESSURE',
                                    'method'        => 'MANUAL',
                                    'diagnosis'     => 'ini diagnos',
                                    'note'          => 'ini note',
                                    'mime_type'     => 'ini mime type'
                                ]);

        $response->assertStatus(422);
    }

    /** @test */
    public function SleepSuccessTest()
    {
        $response = $this->post(route('medical.store'), [
                                    'member_id'     => 'overtime_method',
                                    'nurse_id'      => '1',
                                    'type'          => 'SLEEP',
                                    'method'        => 'MANUAL',
                                    'diagnosis'     => 'ini diagnos',
                                    'note'          => 'ini note',
                                    'mime_type'     => 'ini mime type',
                                    'sleepStart'    => '07:00',
                                    'sleepEnd'      => '07:30',
                                    'deepSleep'     => 600,
                                    'lightSleep'    => 500,
                                    'wakeTime'      => 1
                                ]);

        $response->assertStatus(201);
    }

        /** @test */
        public function SleepFailTest()
        {
            $response = $this->post(route('medical.store'), [
                                        'member_id'     => 'overtime_method',
                                        'nurse_id'      => '1',
                                        'type'          => 'SLEEP',
                                        'method'        => 'MANUAL',
                                        'diagnosis'     => 'ini diagnos',
                                        'note'          => 'ini note',
                                        'mime_type'     => 'ini mime type',
                                        'sleepStart'    => '07:00',
                                        'sleepEnd'      => '06:30',
                                        'deepSleep'     => 600,
                                        'lightSleep'    => 500,
                                        'wakeTime'      => 1
                                    ]);
    
            $response->assertStatus(422);
        }
}
