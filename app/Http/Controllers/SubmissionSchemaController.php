<?php

namespace App\Http\Controllers;

use App\Http\Livewire\App\SubmissionSchemas\AppSubmissionSchemasEdit;
use App\Http\Requests\ShowSubmissionSchemaRequest;
use App\Http\Requests\StoreSubmissionSchemaRequest;
use App\Http\Resources\SubmissionSchemaResource;
use App\Models\Contest;
use App\Models\SubmissionSchema;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

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

    public function edit(Request $request, Contest $contest)
    {
        $breadcrumbs = [
            [
                'name' => 'Contests',
                'href' => route('contests.index'),
            ],
            [
                'name' => $contest->name,
                'href' => route('contests.show', $contest),
            ],
            [
                'name' => 'Submission Schema',
                'href' => $request->path(),
            ],
        ];

        return App::make(AppSubmissionSchemasEdit::class);

        return view('app.contests.submission_schema.edit')->with(['breadcrumbs' => $breadcrumbs, 'contest' => $contest]);
    }
}
