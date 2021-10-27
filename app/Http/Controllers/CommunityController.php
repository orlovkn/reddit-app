<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\Community;
use App\Models\Topic;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::query()
            ->where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();

        return view('communities.index', compact('communities'));
    }

    public function create()
    {
        $topics = Topic::all();

        return view('communities.create', compact('topics'));
    }

    public function store(StoreCommunityRequest $request)
    {
        $data = array_merge(
            ['user_id' => auth()->id()],
            $request->validated(),
        );

        $community = Community::create($data);
        $community->topics()->attach($request->topics);

        return redirect()->route('communities.show', $community);
    }

    public function show(Community $community)
    {
        $posts = $community->posts()->latest('id')->paginate(10);

        return view('communities.show', compact('community', 'posts'));
    }

    public function edit(Community $community)
    {
        if ($community->user_id !== auth()->id()) {
            abort(403);
        }

        $topics = Topic::all();
        $community->load('topics');

        return view('communities.edit', compact('community', 'topics'));
    }

    public function update(UpdateCommunityRequest $request, Community $community)
    {
        if ($community->user_id !== auth()->id()) {
            abort(403);
        }

        $community->update($request->validated());
        $community->topics()->sync($request->topics);

        return redirect()->route('communities.index')->with('message', 'successfully updated');
    }

    public function destroy(Community $community)
    {
        if ($community->user_id !== auth()->id()) {
            abort(403);
        }

        $community->delete();

        return redirect()->route('communities.index')->with('message', 'successfully deleted');
    }
}
