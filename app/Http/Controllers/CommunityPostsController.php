<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class CommunityPostsController extends Controller
{
    public function index(Community $community)
    {

    }

    public function create(Community $community)
    {
        return view('posts.create', compact('community'));
    }

    public function store(StorePostRequest $request, Community $community)
    {
        $data = array_merge(
            ['user_id' => auth()->id()],
            $request->validated(),
        );

        $community->posts()->create($data);

        return redirect()->route('communities.show', $community);
    }

    public function show(Community $community, Post $post)
    {
        return view('posts.show', compact('community', 'post'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
