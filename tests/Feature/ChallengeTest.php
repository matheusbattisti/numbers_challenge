<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChallengeTest extends TestCase
{

    public function testRoute()
    {
        $response = $this->json('GET', '/api/1');

        $response->assertStatus(200);
    }

    public function testUnit()
    {
        $response = $this->json('GET', '/api/1');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'um',
            ]);
    }

    public function testDozen()
    {
        $response = $this->json('GET', '/api/13');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'treze',
            ]);
    }

    public function testHundred()
    {
        $response = $this->json('GET', '/api/321');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'trezentos e vinte e um',
            ]);
    }

    public function testThousand()
    {
        $response = $this->json('GET', '/api/1449');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'mil e quatrocentos e quarenta e nove',
            ]);
    }

    public function testThousandPlus()
    {
        $response = $this->json('GET', '/api/94587');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'noventa e quatro mil e quinhentos e oitenta e sete',
            ]);
    }

    public function testCentoCase()
    {
        $response = $this->json('GET', '/api/108');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'cento e oito',
            ]);
    }

    public function testNegativeNumber()
    {
        $response = $this->json('GET', '/api/-948');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'menos novecentos e quarenta e oito',
            ]);
    }
}
