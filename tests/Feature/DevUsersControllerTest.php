<?php

use App\Models\DevUsers;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Testing\RefreshDatabase;


    it('can load the users index page', function () {
        \DB::table('dev_users')->insert([
            ['nome' => 'User 1', 'funcao' => 'Desenvolvedor'],
            ['nome' => 'User 2', 'funcao' => 'Gerente'],
            ['nome' => 'User 3', 'funcao' => 'Designer'],
        ]);

        $response = $this->get(route('dev-users.index')); 

        $response->assertStatus(200); 
        $response->assertSee('Nome');
        $response->assertSee('Função'); 
    });

    
    it('can store a new user', function () {
        $userData = [
            'nome' => 'Teste User',
            'funcao' => 'Desenvolvedor',
        ];

        $response = $this->post(route('dev-users.store'), $userData); 

        $response->assertRedirect(route('dev-users.index')); 
        $this->assertDatabaseHas('dev_users', $userData); 
    });


    it('can update a user', function () {

    $user = \App\Models\DevUsers::create([
        'nome' => 'User Original',
        'funcao' => 'Desenvolvedor',
    ]);

    $updatedData = [
        'nome' => 'User Atualizado',
        'funcao' => 'Gerente',
    ];

    $response = $this->put(route('dev-users.update', $user->id), $updatedData);
    $response->assertRedirect(route('dev-users.index')); 
    $this->assertDatabaseHas('dev_users', $updatedData); 
    });


    it('can delete a user', function () {
        $user = \App\Models\DevUsers::create([
        'nome' => 'User para Deletar',
        'funcao' => 'Desenvolvedor',
        ]);

        $response = $this->delete(route('dev-users.destroy', $user->id)); 

        $response->assertRedirect(route('dev-users.index')); 
        $this->assertDatabaseMissing('dev_users', ['id' => $user->id]); 
    });


