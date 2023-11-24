<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KategoriTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_not_found_kategori(): void
    {
        // $pas = Hash::make('12345678');
        

        $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('GET', 'api/kategori/200', ['Accept' => 'application/json'])
            ->assertStatus(404)
            ->assertJsonStructure([
              "status",
              "message",              
            ]);

    }
    public function test_found_kategori(): void
    {

        $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('GET', 'api/kategori/1', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
              "status",
              "message",              
              "kategori",              
            ]);

    }

    public function test_it_can_store_the_kategori(): void
    {        
        $data = [
            'nama' => 'Test kategorisss',
            
        ];

        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('POST', '/api/kategori', $data);

        
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        // ngecek ada dalam database nda
        $this->assertDatabaseHas('kategoris', [
            'nama' => 'Test kategorisss',
        ]);
    }

    public function test_invalid_data_store_the_kategori(): void
    {        
        $data = [
            'nama' => '',
            
        ];

        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('POST', '/api/kategori', $data);

        
        $response->assertStatus(422)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
       
    }
    public function test_it_can_update_the_kategori(): void
    {        
        $data = [            
          'nama' => 'yes ganti4',
         
        ];

        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('PUT', '/api/kategori/4', $data);

        
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        // ngecek ada dalam database nda
        $this->assertDatabaseHas('kategoris', [
            'nama' => 'yes ganti4',            
        ]);
    }

    public function test_invalid_data_update_the_kategori(): void
    {        
        $data = [
            'nama' => '',            
        ];

        
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('PUT', '/api/kategori/4', $data);

        
        $response->assertStatus(422)
            ->assertJsonStructure([
                'status',
                'message',
                'data',
            ]);
       
    }
    public function test_delete_data_kategori(): void
    {        
       
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '41|SQeEtG1Q3wKyhBXfUl5ZYTQN5yDZPoa0rHGpicwGeae905ca',])->json('DELETE', '/api/kategori/1');

        
        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',                
            ]);
       
    }
}
