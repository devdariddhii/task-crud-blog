<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('user');

        // Only admin (id = 1) can see all blogs
        if (Auth::id() != 1) {
            $query->where('user_id', Auth::id());
        }

        if ($request->ajax()) {
            if ($request->user_id) {
                $query->where('user_id', $request->user_id);
            }
            if ($request->tags) {
                $query->whereJsonContains('tags', $request->tags);
            }
            return datatables()->of($query)->make(true);
        }

        $users = User::all();
        return view('blogs.index', compact('users'));
    }

    public function create()
    {
        $tags = ['Laravel', 'PHP', 'JavaScript', 'Vue', 'React'];
        return view('blogs.create', compact('tags'));
    }

    public function store(Request $request)
    {
        dd(Auth::id());
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tags'        => 'required|array',
            'tags.*'      => 'string',
            'links'       => 'nullable|array',
            'links.*.title' => 'nullable|string|max:255',
            'links.*.url'   => 'nullable|url',
        ]);

        $blog = new Blog();
        $blog->title = $validated['title'];
        $blog->description = $validated['description'];
        $blog->tags = json_encode($validated['tags']);
        $blog->links = json_encode($validated['links'] ?? []);
        $blog->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads', 'public');
                // Save image path to database if needed (depends on your schema)
            }
        }

        return redirect()->route('blogs.create')->with('success', 'Blog created successfully!');
    }
    public function show(Blog $blog)
    {
        $blog->load('user');
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $tags = ['Laravel', 'PHP', 'JavaScript', 'Vue', 'React'];
        return view('blogs.edit', compact('blog', 'tags'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:blogs,title,' . $blog->id,
            'description' => 'required|min:10',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'required|array|min:1',
            'links' => 'nullable|array',
            'links.*.title' => 'required_with:links.*.url',
            'links.*.url' => 'required_with:links.*.title|url',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $images = $blog->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('blogs', 'public');
            }
        }

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'images' => $images,
            'tags' => $request->tags,
            'links' => $request->links,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(['success' => true]);
    }
}


// class BlogController extends Controller
// {
//     public function index(Request $request)
//     {
//         $query = Blog::with('user');

//         if (Auth::id() != 1) {
//             $query->where('user_id', Auth::id());
//         }

//         if ($request->ajax()) {
//             if ($request->user_id) {
//                 $query->where('user_id', $request->user_id);
//             }
//             if ($request->tags) {
//                 $query->whereJsonContains('tags', $request->tags);
//             }
//             return datatables()->of($query)->make(true);
//         }

//         $users = User::all();
//         return view('blogs.index', compact('users'));
//     }

//     public function create()
//     {
//         $tags = ['Laravel', 'PHP', 'JavaScript', 'Vue', 'React'];
//         return view('blogs.create', compact('tags'));
//     }

//     public function store(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'title' => 'required|unique:blogs,title',
//             'description' => 'required|min:10',
//             'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
//             'tags' => 'required|array',
//             'links' => 'nullable|array',
//             'links.*.title' => 'required_with:links.*.url',
//             'links.*.url' => 'required_with:links.*.title|url',
//         ]);

//         if ($validator->fails()) {
//             return back()->withErrors($validator)->withInput();
//         }

//         $images = [];
//         if ($request->hasFile('images')) {
//             foreach ($request->file('images') as $image) {
//                 $images[] = $image->store('blogs', 'public');
//             }
//         }

//         $blog = Blog::create([
//             'title' => $request->title,
//             'description' => $request->description,
//             'images' => $images,
//             'tags' => $request->tags,
//             'user_id' => Auth::id(),
//             'links' => $request->links,
//         ]);

//         return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
//     }

//     public function show(Blog $blog)
//     {
//         $blog->load('user');
//         return view('blogs.show', compact('blog'));
//     }

//     public function edit(Blog $blog)
//     {
//         $tags = ['Laravel', 'PHP', 'JavaScript', 'Vue', 'React'];
//         return view('blogs.edit', compact('blog', 'tags'));
//     }

//     public function update(Request $request, Blog $blog)
//     {
//         $validator = Validator::make($request->all(), [
//             'title' => 'required|unique:blogs,title,' . $blog->id,
//             'description' => 'required|min:10',
//             'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
//             'tags' => 'required|array',
//             'links' => 'nullable|array',
//             'links.*.title' => 'required_with:links.*.url',
//             'links.*.url' => 'required_with:links.*.title|url',
//         ]);

//         if ($validator->fails()) {
//             return back()->withErrors($validator)->withInput();
//         }

//         $images = $blog->images ?? [];
//         if ($request->hasFile('images')) {
//             foreach ($request->file('images') as $image) {
//                 $images[] = $image->store('blogs', 'public');
//             }
//         }

//         $blog->update([
//             'title' => $request->title,
//             'description' => $request->description,
//             'images' => $images,
//             'tags' => $request->tags,
//             'links' => $request->links,
//         ]);

//         return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
//     }

//     public function destroy(Blog $blog)
//     {
//         $blog->delete();
//         return response()->json(['success' => true]);
//     }
// }
