<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Community;
use Illuminate\Http\Request;

class CommunityPostsController extends Controller
{
    public function index(Community $community)
    {
        $posts = $community->posts()->latest('id')->paginate(10);
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
dd($data);
        $community->posts()->create($data);

        return redirect()->route('communities.show', $community);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
