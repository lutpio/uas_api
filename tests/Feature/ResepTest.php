<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResepTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_not_found_resep(): void
    {
        // $pas = Hash::make('12345678');
        

        $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('GET', 'api/resep/200', ['Accept' => 'application/json'])
            ->assertStatus(404)
            ->assertJsonStructure([
              "status",
              "message",              
            ]);

    }
    public function test_found_resep(): void
    {

        $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('GET', 'api/resep/1', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
              "status",
              "message",              
              "resep",              
            ]);

    }

    public function test_it_can_store_the_resep(): void
    {        
        $data = [
            'judul' => 'Test Recipe',
            'waktu_masak' => '30 minutes',
            'bahan' => 'asdasd 1, Ingredient 2',
            'intruksi' => 'Step 1, Step 2',
            'kategori_id' => 1,
        ];

        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('POST', '/api/resep', $data);

        
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        // ngecek ada dalam database nda
        $this->assertDatabaseHas('reseps', [
            'judul' => 'Test Recipe',
            'waktu_masak' => '30 minutes',
            'bahan' => 'asdasd 1, Ingredient 2',
            'intruksi' => 'Step 1, Step 2',
            'kategori_id' => 1,
        ]);
    }

    public function test_invalid_data_store_the_resep(): void
    {        
        $data = [
            'judul' => 'Test Recipe',
            'waktu_masak' => '30 minutes',
            'bahan' => 'Ingredient 1, Ingredient 2',            
            'kategori_id' => 1,
        ];

        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('POST', '/api/resep', $data);

        
        $response->assertStatus(422)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
       
    }
    public function test_it_can_update_the_resep(): void
    {        
        $data = [            
          'judul' => 'yes ganti',
          'waktu_masak' => '30 minutes',
          'bahan' => 'Ingredient 1, Ingredient 2',
          'intruksi' => 'Step 1, Step 2',
          'kategori_id' => 1,
        ];

        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('PUT', '/api/resep/16', $data);

        
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        // ngecek ada dalam database nda
        $this->assertDatabaseHas('reseps', [
            'judul' => 'yes ganti',
            'waktu_masak' => '30 minutes',
            'bahan' => 'Ingredient 1, Ingredient 2',
            'intruksi' => 'Step 1, Step 2',
            'kategori_id' => 1,
        ]);
    }

    public function test_invalid_data_update_the_resep(): void
    {        
        $data = [
            'judul' => 'Test Recipe',
            'waktu_masak' => '30 minutes',
            'bahan' => 'Ingredient 1, Ingredient 2',            
            'kategori_id' => 1,
        ];

        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('PUT', '/api/resep/14', $data);

        
        $response->assertStatus(422)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
       
    }
    public function test_delete_data_resep(): void
    {        
       
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('DELETE', '/api/resep/22');

        
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',                
            ]);
       
    }
}
