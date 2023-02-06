<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowSubmissionSchemaRequest;
use App\Http\Requests\StoreSubmissionSchemaRequest;
use App\Http\Resources\SubmissionSchemaResource;
use App\Models\Contest;
use App\Models\SubmissionSchema;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubmissionSchemaController extends Controller
{
    public function index(ShowSubmissionSchemaRequest $request, Contest $contest)
    {
        return SubmissionSchemaResource::collection($contest->submissionSchemas);
    }

    public function store(StoreSubmissionSchemaRequest $request, Contest $contest)
    {
        $submissionSchema = SubmissionSchema::make($request->validated());

        $contest->submissionSchemas()->save($submissionSchema);

        if ($request->has('options') && is_array($request->options)) {
            $submissionSchema->options()->createMany($request->options);
        }

        if ($request->has('meta') && is_array($request->meta)) {
            $submissionSchema->meta()->createMany($request->meta);
        }

        return SubmissionSchemaResource::make($submissionSchema);
    }

    public function setOrder(Request $request)
    {
        $schemas = $request->schemas;

        foreach ($schemas as $schema) {
            SubmissionSchema::find($schema['id'])->update([
                'order' => $schema['order'],
            ]);
        }

        return response()->json([], Response::HTTP_CREATED);
    }
}
