<?php

namespace Database\Seeders;

use App\Models\Contest;
use App\Models\SubmissionSchema;
use App\Models\SubmissionSchemaMeta;
use Illuminate\Database\Seeder;

class SubmissionSchemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all contests, add set schemas
        // For schemas with extra meta, add them as "has" entries with their specific states
        $contests = Contest::all();

        foreach ($contests as $contest) {
            $this->createSchemas($contest);
        }
    }

    private function createSchemas(Contest $contest)
    {
        $contest->submissionSchemas()->saveMany([
            SubmissionSchema::factory()->name()->make(),
            SubmissionSchema::factory()->description()->make(),
            SubmissionSchema::factory()->email()->make(),
        ]);

        $imageSchema = $contest->submissionSchemas()->save(
            SubmissionSchema::factory()->image()->make()
        );

        $imageSchema->meta()->save(
            SubmissionSchemaMeta::factory()->imageFile()->make()
        );
    }
}
