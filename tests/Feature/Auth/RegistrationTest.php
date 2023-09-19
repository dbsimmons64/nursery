<?php

use App\Models\Organisation;
use App\Models\Test;
use App\Models\User;
use App\Providers\RouteServiceProvider;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name'                  => 'Test User',
        'organisation'          => 'Test Org',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);

    $user = User::latest()->first();
    expect($user->role)->toBe('admin');
});

test('new users create organisation', function () {

    $response = $this->post('/register', [
        'name'                  => 'Test User',
        'organisation'          => 'Test Org',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
    ]);

    $user = User::latest()->first();
    expect($user->name)->toBe('Test User');

    $organisation = Organisation::latest()->first();
    expect($organisation->name)->toBe('Test Org');
});

test('organisation name must be unique', function () {
    $user = User::factory()->create();

    $org = Organisation::factory([
        'name' => "Test Org"
    ])->hasUsers()->create();

    $response = $this->post('/register', [
        'name'                  => 'Test User',
        'organisation'          => 'Test Org',
        'email'                 => 'test@example.com',
        'password'              => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertSessionHasErrors([
        'organisation' => 'The organisation has already been taken.'

    ]);

});
