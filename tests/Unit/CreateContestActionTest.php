<?php

namespace Tests\Unit;

use App\Actions\Contests\CreateContest;
use App\Models\Contest;
use App\Models\User;
use Database\Factories\ContestFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class CreateContestActionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_contest_can_be_created_and_attached_to_a_user()
    {
        $contestFactory = App::make(ContestFactory::class);
        $contestData = $contestFactory->definition();

        $user = User::factory()->create();

        $contest = CreateContest::run($user, $contestData);

        $this->assertTrue($contest->name === $contestData['name']);
        $this->assertTrue($user->contests->contains($contest));
    }
}
