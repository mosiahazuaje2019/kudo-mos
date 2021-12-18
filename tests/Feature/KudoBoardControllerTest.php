<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\Models\KudoBoard;

class KudoBoardControllerTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * A basic feature test index.
     * Test the status 200 Http
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/kudo_boards');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test store.
     *
     * @return void
     */
/*     public function test_store(){
        $this->withoutExceptionHandling();

        $response = $this->postJson('/api/kudo_boards', [
            'name'         => 'Kudo test1',
            'description'  => 'This is a KudoBoard example for Mosiah Azuaje',
            'categorie_id' => '1',
            'email'        => 'test@test.com',
            'birthday'     => '1981-08-17',
            'uri'          => 'https://images.indianexpress.com/2019/12/Merry-Christmas-Live.jpg'
        ]);

        $response->assertJsonStructure(['name','description','categorie_id','email','birthday','uri','created_at','updated_at'])
        ->assertJson([
            'name' => 'Kudo test1',
            'description' => 'This is a KudoBoard example form Mosiah Azuaje',
            'categorie_id' => '1',
            'email' => 'test@test.com',
            'birthday' => '1981-08-17',
            'uri'=> 'https://images.indianexpress.com/2019/12/Merry-Christmas-Live.jpg',
            ])
            ->assertStatus(201);
    } */

    
}
