<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        return view('tags')->with(['tags' => Auth::user()->tags]);
    }

    public function store(StoreTagRequest $request)
    {
        $tag = Auth::user()->tags()->create($request->validated());

        return TagResource::make($tag);
    }

    public function update(Request $request, Tag $tag)
    {
        //
    }

    public function destroy(Tag $tag)
    {
        //
    }
}
