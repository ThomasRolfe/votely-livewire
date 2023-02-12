<?php

namespace Tests\Unit;

use App\Actions\Contests\RegenerateContestPublicKey;
use App\Models\Contest;
use App\Services\UniqueKeyGeneratorService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UniqueKeyGeneratorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_generated_key_is_unique()
    {
        $contest = Contest::factory()->create();

        $stringLength = fake()->numberBetween(4, 10);
        $generatedKey = UniqueKeyGeneratorService::generateShortKey($contest::class, 'public_key', $stringLength);

        $this->assertTrue(strlen($generatedKey) === $stringLength);
        $this->assertTrue($contest->public_key !== $generatedKey);

        // Ensure nothing in the database has this key
        $this->assertTrue(Contest::where('public_key', $generatedKey)->first() === null);
    }

    public function test_regenerates_contest_public_key()
    {
        $contests = Contest::factory()->count(10)->create();
        $originalKey = $contests[0]->public_key;

        $refreshedKeyContest = RegenerateContestPublicKey::run($contests[0]);
        $refreshedKeyContest->refresh();

        $this->assertNotEquals($originalKey, $refreshedKeyContest->public_key);
        $this->assertCount(1, Contest::where('public_key', $refreshedKeyContest->public_key)->get());
        $this->assertCount(0, Contest::where('public_key', $originalKey)->get());
    }
}
