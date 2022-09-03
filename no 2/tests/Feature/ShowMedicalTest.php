<?php

namespace Tests\Feature;

use Tests\TestCase;

class ShowMedicalTest extends TestCase
{
    public function testShowMedicals()
    {
        $this->get('/api/medical')
            ->assertStatus(200)
            ->assertJson(['message' => 'List Medicals'])
            ->assertSeeText('data');
    }

    public function testShowMedicalById()
    {
        $this->get('/api/medical/1')
            ->assertStatus(200)
            ->assertJson(['message' => 'Detail Medical'])
            ->assertSeeText('data');
    }
}
