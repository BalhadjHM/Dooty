<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Space;

class SpaceController extends Controller
{
    // display the user dashboard
    public function index()
    {
        // retrieve the user id
        $userId = Auth::id();

        // retrieve the user spaces
        $spaces = Space::where('user_id', $userId)->get();

        // retrieve the tags for each space
        foreach($spaces as $space) {
            $tags = Tag::where('space_id', $space->id)->get();
            $space->tags = $tags;
        }

        // return the user spaces
        return view('Spaces.index', ['spaces' => $spaces]);
    }

    // display the form to create a new space
    public function create($userId)
    {
        return view('Spaces.create');
    }

    // store the space details
public function store($userId)
    {
        // validate the space details
        request()->validate([
            'title' => ['required', 'string', 'max:70'],
            'description' => ['required', 'string', 'max:255'],
            'tagsArray' => ['required'],
        ],
        [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 70 characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'tagsArray.required' => 'The tags field is required.',
        ]);

        // Retrieve the space details
        $title = request('title');
        $description = request('description');
        $tags = json_decode(request('tagsArray'), true);
        $userId = Auth::id();

        // store the space details
        $space = Space::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId
        ]);

        // store the tags in the tag table
        foreach($tags as $tag) {
            $tag = Tag::create([
                'name' => $tag,
                'space_id' => $space->id
            ]);
        }

        // redirect to the user dashboard
        return redirect()->route('user.index', ['userId' => $userId]);
    }

    // display the edit form
    public function edit($userId, $spaceId)
    {
        return view('Spaces.edit', ['spaceId' => $spaceId, 'userId' => $userId]);
    }

    // update the space details
    public function update($userId, $spaceId)
    {
        // validate the space details
        request()->validate([
            'title' => ['required', 'string', 'max:70'],
            'description' => ['required', 'string', 'max:255'],
            'tagsArray' => ['required'],
        ],
        [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 70 characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'description.max' => 'The description may not be greater than 255 characters.',
            'tagsArray.required' => 'The tags field is required.',
        ]);

        // retrieve the space details
        $title = request('title');
        $description = request('description');
        $tags = json_decode(request('tagsArray'), true);

        // update the space details
        $space = Space::find($spaceId);
        $space->title = $title;
        $space->description = $description;
        $space->save();

        // delete the existing tags
        Tag::where('space_id', $spaceId)->delete();

        // store the tags in the tag table
        foreach($tags as $tag) {
            $tag = Tag::create([
                'name' => $tag,
                'space_id' => $spaceId
            ]);
        }

        // redirect to the user dashboard
        return redirect()->route('user.index', ['userId' => $userId]);
    }

    // delete the space
    public function destroy($userId, $spaceId)
    {
        // retrieve the space and delete it
        Space::destroy($spaceId);

        // redirect to the user dashboard
        return redirect()->route('user.index', ['userId' => $userId]);
    }

    // search for a space
    public function search($userId)
    {
        // retrieve the search term
        $searchTerm = request('search');

        // retrieve the user spaces
        $spaces = Space::where('user_id', $userId)
            ->where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->get();

        // retrieve the tags for each space
        foreach($spaces as $space) {
            $tags = Tag::where('space_id', $space->id)->get();
            $space->tags = $tags;
        }

        // return the user spaces
        return view('Spaces.index', ['spaces' => $spaces, 'searchTerm' => $searchTerm]);
    }
}

