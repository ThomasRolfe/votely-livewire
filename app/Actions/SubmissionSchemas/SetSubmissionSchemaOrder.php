<?php

namespace App\Actions\SubmissionSchemas;

use App\Models\SubmissionSchema;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\LaravelData\DataCollection;

class SetSubmissionSchemaOrder
{
    use AsAction;

    public function handle(DataCollection $schemaOrders): Collection
    {
        $updatedSchemas = new Collection;

        foreach ($schemaOrders as $schemaOrder) {
            /** @var SubmissionSchema $schema */
            $schema = SubmissionSchema::find($schemaOrder->value);

            $schema->update([
                'order' => $schemaOrder->order,
            ]);

            $updatedSchemas->push($schema);
        }

        return $updatedSchemas->sortBy('order');
    }
}
