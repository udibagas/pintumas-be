<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

describe("/api/department", function () {

    test('GET /api/department', function () {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get('/api/department');
        $response->assertStatus(200);
    });

    test('POST /api/department', function () {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->post('/api/department', [
            'name' => fake()->company(),
            'logo' => fake()->imageUrl(),
            'link' => fake()->url(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => fake()->address(),
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'youtube' => fake()->url(),
            'linkedin' => fake()->url(),
        ]);

        $response->assertJsonFragment([
            'name' => $response->json('name'),
            'logo' => $response->json('logo'),
            'link' => $response->json('link'),
            'phone' => $response->json('phone'),
            'email' => $response->json('email'),
            'address' => $response->json('address'),
            'facebook' => $response->json('facebook'),
            'instagram' => $response->json('instagram'),
            'youtube' => $response->json('youtube'),
            'linkedin' => $response->json('linkedin'),
        ]);

        $response->assertStatus(201);
    });

    test('GET /api/department/{id}', function () {
        $department = \App\Models\Department::factory()->create();

        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->get("/api/department/{$department->id}");
        $response->assertJsonFragment([
            'name' => $department->name,
            'logo' => $department->logo,
            'link' => $department->link,
            'phone' => $department->phone,
            'email' => $department->email,
            'address' => $department->address,
            'facebook' => $department->facebook,
            'instagram' => $department->instagram,
            'youtube' => $department->youtube,
            'linkedin' => $department->linkedin,
        ]);

        $response->assertStatus(200);
    });

    test('PUT /api/department/{id}', function () {
        $department = \App\Models\Department::factory()->create();

        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->put("/api/department/{$department->id}", [
            'name' => fake()->company(),
            'logo' => fake()->imageUrl(),
            'link' => fake()->url(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'address' => fake()->address(),
            'facebook' => fake()->url(),
            'instagram' => fake()->url(),
            'youtube' => fake()->url(),
            'linkedin' => fake()->url(),
        ]);

        $response->assertJsonFragment([
            'name' => $response->json('name'),
            'logo' => $response->json('logo'),
            'link' => $response->json('link'),
            'phone' => $response->json('phone'),
            'email' => $response->json('email'),
            'address' => $response->json('address'),
            'facebook' => $response->json('facebook'),
            'instagram' => $response->json('instagram'),
            'youtube' => $response->json('youtube'),
            'linkedin' => $response->json('linkedin'),
        ]);

        $response->assertStatus(200);
    });

    test('DELETE /api/department/{id}', function () {
        $department = \App\Models\Department::factory()->create();

        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user)->delete("/api/department/{$department->id}");
        $response->assertStatus(200);
    });
});
