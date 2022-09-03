<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\ {Carbon, Str};

class StoreMedicalTest extends TestCase
{
    public function testStoreTemperature()
    {
        $value = [
            'member_id' => Str::random(12),
            'nurse_id' => Str::random(12),
            'type' => 'TEMPERATURE',
            'value' => 35.66,
            'method' => 'MANUAL',
            'diagnosis' => 'diagnosis',
            'note' => 'ini adalah note',
            'mime_type' => 'text',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->post('/api/medical', $value)
            ->assertStatus(201)
            ->assertJson(['message' => 'Created']);
    }
    
    public function testFailStoreTemperature()
    {
        $value = [
            'member_id' => Str::random(12),
            'nurse_id' => Str::random(12),
            'type' => 'TEMPERATURE',
            'method' => 'MANUAL',
            'diagnosis' => 'diagnosis',
            'note' => 'ini adalah note',
            'mime_type' => 'text',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->post('/api/medical', $value)
            ->assertStatus(302);
    }
    
    public function testStoreBlood()
    {
        $value = [
            'member_id' => Str::random(12),
            'nurse_id' => Str::random(12),
            'type' => 'BLOODPRESSURE',
            'systole' => 'systole',
            'disatole' => 'disatole',
            'method' => 'MANUAL',
            'diagnosis' => 'diagnosis',
            'note' => 'ini adalah note',
            'mime_type' => 'text',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->post('/api/medical', $value)
            ->assertStatus(201)
            ->assertJson(['message' => 'Created']);
    }
    
    public function testStoreSleep()
    {
        $value = [
            'member_id' => Str::random(12),
            'nurse_id' => Str::random(12),
            'type' => 'SLEEP',
            'sleepStart' => '10:05',
            'sleepEnd' => '11:05',
            'deepSleep' => 455,
            'lightSleep' => 397,
            'wakeTime' => 2,
            'method' => 'MANUAL',
            'diagnosis' => 'diagnosis',
            'note' => 'ini adalah note',
            'mime_type' => 'text',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        $this->post('/api/medical', $value)
            ->assertStatus(201)
            ->assertJson(['message' => 'Created']);
    }
}
