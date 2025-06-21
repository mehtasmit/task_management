<?php

namespace Tests\Feature;

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        // create a test user and authenticate
        $this->user = User::factory()->create();
    }

    /** @test */
    public function it_returns_projects_for_authenticated_user()
    {
        Project::factory()->count(3)->create(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)->getJson('/api/projects');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    /** @test */
    public function it_does_not_return_projects_for_guest()
    {
        $response = $this->getJson('/api/projects');

        $response->assertStatus(401); // unauthorized
    }

    /** @test */
    public function it_creates_project_successfully()
    {
        $payload = [
            'name' => 'New Project',
            'description' => 'Test description',
        ];

        $response = $this->actingAs($this->user)->postJson('/api/projects', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'New Project']);
    }

    /** @test */
    public function it_fails_to_create_project_with_invalid_data()
    {
        $response = $this->actingAs($this->user)->postJson('/api/projects', [
            'name' => '', // name is required
        ]);

        $response->assertStatus(422) // Unprocessable Entity
            ->assertJsonValidationErrors(['name']);
    }

    /** @test */
    public function it_shows_single_project()
    {
        $project = Project::factory()->create(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)->getJson("/api/projects/{$project->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $project->id]);
    }

    /** @test */
    public function it_returns_404_for_non_existing_project()
    {
        $response = $this->actingAs($this->user)->getJson('/api/projects/999');

        $response->assertStatus(404);
    }
}
