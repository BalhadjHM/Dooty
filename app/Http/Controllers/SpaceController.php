<?php

namespace App\Http\Controllers;

use App\Models\Tag;
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
        $spaces = Space::where('user_id', $userId)->orderBy('pinned', 'desc')->get();

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
        return view('Spaces.create', ['userId' => $userId]);
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

        // store the space details
        $space = Space::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId
        ]);

        // store the tags in the tag table
        foreach($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'space_id' => $space->id
            ]);
        }

        // redirect to the user dashboard
        return redirect()->route('user.index', ['userId' => $userId])->with('success', 'Space created successfully');
    }

    // display the form to edit a space
    public function edit($userId, $spaceId){
        // retrieve the space
        $space = Space::find($spaceId);

        // retrieve the tags for the space
        $tags = Tag::where('space_id', $space->id)->get();

        // convert the tags to a JSON string
        $tagsJson = json_encode($tags->pluck('name'));

        // check if the space exists
        if(!$space){
            return redirect()->route('space.index', ['userId' => $userId])
                ->withErrors(['error' => 'Space not found']);
        }

        return view('Spaces.edit', ['space' => $space, 'tags' => $tagsJson, 'userId' => $userId, 'spaceId' => $spaceId]);
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
            Tag::create([
                'name' => $tag,
                'space_id' => $spaceId
            ]);
        }

        // redirect to the user dashboard
        return redirect()->route('user.index', ['userId' => $userId])->with('success', 'Space updated successfully');
    }

    // delete the space
    public function destroy($userId, $spaceId)
    {
        // retrieve the space and delete it
        Space::destroy($spaceId);

        // redirect to the user dashboard
        return redirect()->route('user.index', ['userId' => $userId])->with('success', 'Space deleted successfully');
    }

    // search for a space
    public function search($userId)
    {
        // retrieve the search term
        $searchTerm = request('search');
        $searchTermLower = strtolower(request('search'));
        $searchTermUpper = strtoupper(request('search'));
        $searchTermCapitalized = ucfirst(request('search'));

        // retrieve the user spaces
        $spaces = Space::where('user_id', $userId)
            ->where(function($query) use ($searchTermLower, $searchTermUpper, $searchTermCapitalized) {
                $query->where('title', 'like', '%' . $searchTermLower . '%')
                    ->orWhere('title', 'like', '%' . $searchTermUpper . '%')
                    ->orWhere('title', 'like', '%' . $searchTermCapitalized . '%')
                    ->orWhere('description', 'like', '%' . $searchTermLower . '%')
                    ->orWhere('description', 'like', '%' . $searchTermUpper . '%')
                    ->orWhere('description', 'like', '%' . $searchTermCapitalized . '%');
            })
            ->orderBy('pinned', 'desc')
            ->get();

        // retrieve the tags for each space
        foreach($spaces as $space) {
            $tags = Tag::where('space_id', $space->id)->get();
            $space->tags = $tags;
        }

        // return the user spaces
        return view('Spaces.index', ['spaces' => $spaces, 'searchTerm' => $searchTerm, 'searchTermLower' => $searchTermLower, 'searchTermUpper' => $searchTermUpper, 'searchTermCapitalized' => $searchTermCapitalized]);
    }

    // search for a tag name and return the spaces
    public function searchTag($userId, $tagId)
    {
        // retrieve the tag name
        $tagName = Tag::find($tagId)->name;

        // retrieve the user spaces
        $spaces = Space::where('user_id', $userId)
            ->whereHas('tags', function($query) use ($tagName) {
                $query->where('name', $tagName);
            })
            ->orderBy('pinned', 'desc')
            ->get();

        // retrieve the tags for each space
        foreach($spaces as $space) {
            $tags = Tag::where('space_id', $space->id)->get();
            $space->tags = $tags;
        }

        // return the user spaces
        return view('Spaces.index', ['spaces' => $spaces, 'tagName' => $tagName]);
    }

    // pin the spaces
    public function pin($userId, $spaceId)
    {
        // set the pinned status
        Space::where('user_id', $userId)
            ->where('id', $spaceId)
            ->where('pinned', 0)
            ->update(['pinned' => 1]);

        // retrieve the user spaces
        $spaces = Space::where('user_id', $userId)->orderBy('pinned', 'desc')
            ->get();

        // retrieve the tags for each space
        foreach($spaces as $space) {
            $tags = Tag::where('space_id', $space->id)->get();
            $space->tags = $tags;
        }

        // return the user spaces
        return view('Spaces.index', ['spaces' => $spaces]);
    }

    // unpin the spaces
    public function unpin($userId, $spaceId)
    {
        // set the pinned status
        Space::where('user_id', $userId)
            ->where('id', $spaceId)
            ->where('pinned', 1)
            ->update(['pinned' => 0]);

        // retrieve the user spaces
        $spaces = Space::where('user_id', $userId)->orderBy('pinned', 'desc')
            ->get();

        // retrieve the tags for each space
        foreach($spaces as $space) {
            $tags = Tag::where('space_id', $space->id)->get();
            $space->tags = $tags;
        }

        // return the user spaces
        return view('Spaces.index', ['spaces' => $spaces]);
    }
}

