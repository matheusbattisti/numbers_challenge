<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChallengeTest extends TestCase
{

    public function testRoute()
    {
        $response = $this->json('GET', '/1');

        $response->assertStatus(200);
    }

    public function testUnit()
    {
        $response = $this->json('GET', '/1');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'um',
            ]);
    }

    public function testDozen()
    {
        $response = $this->json('GET', '/13');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'treze',
            ]);
    }

    public function testHundred()
    {
        $response = $this->json('GET', '/321');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'trezentos e vinte e um',
            ]);
    }

    public function testThousand()
    {
        $response = $this->json('GET', '/1449');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'mil e quatrocentos e quarenta e nove',
            ]);
    }

    public function testThousandPlus()
    {
        $response = $this->json('GET', '/94587');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'noventa e quatro mil e quinhentos e oitenta e sete',
            ]);
    }

    public function testCentoCase()
    {
        $response = $this->json('GET', '/108');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'cento e oito',
            ]);
    }

    public function testNegativeNumber()
    {
        $response = $this->json('GET', '/-948');

        $response
            ->assertStatus(200)
            ->assertJson([
                'extenso' => 'menos novecentos e quarenta e oito',
            ]);
    }

    public function testBigNumber()
    {
        $response = $this->json('GET', '/999999');

        $response
            ->assertStatus(422)
            ->assertJson([
                'extenso' => 'Erro: o número solicitado deve estar entre -99999 e 99999.',
            ]);
    }

    public function testSmallNumber()
    {
        $response = $this->json('GET', '/-999999');

        $response
            ->assertStatus(422)
            ->assertJson([
                'extenso' => 'Erro: o número solicitado deve estar entre -99999 e 99999.',
            ]);
    }

    public function testLetters()
    {
        $response = $this->json('GET', '/testando');

        $response
            ->assertStatus(422)
            ->assertJson([
                'extenso' => 'Erro: você deve enviar um número entre -99999 e 99999.',
            ]);
    }

    public function testSpecialChars()
    {
        $response = $this->json('GET', '/2.1');

        $response
            ->assertStatus(422)
            ->assertJson([
                'extenso' => 'Erro: você deve enviar um número entre -99999 e 99999.',
            ]);
    }

    public function testSpecialCharsB()
    {
        $response = $this->json('GET', '/@21');

        $response
            ->assertStatus(422)
            ->assertJson([
                'extenso' => 'Erro: você deve enviar um número entre -99999 e 99999.',
            ]);
    }

    public function testSpecialCharsC()
    {
        $response = $this->json('GET', '/$&*##(#');

        $response
            ->assertStatus(422)
            ->assertJson([
                'extenso' => 'Erro: você deve enviar um número entre -99999 e 99999.',
            ]);
    }
}
