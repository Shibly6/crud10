<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::get();
        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048', // Assuming image is uploaded as a file
            'name' => 'required|string|max:255',
            'nid' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female,Other',
        ]);

        $resource = new Resource();
        $resource->name = $request->name;
        $resource->nid = $request->nid;
        $resource->age = $request->age;
        $resource->address = $request->address;
        $resource->gender = $request->gender;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $resource->image = $imageName;
        }

        $resource->save();

        return redirect()->route('resources.index')->with('success', 'Resource created successfully.');
    }

    public function show(Resource $resource)
    {
        return view('resources.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nid' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female,Other',
        ]);

        $resource->name = $request->name;
        $resource->nid = $request->nid;
        $resource->age = $request->age;
        $resource->address = $request->address;
        $resource->gender = $request->gender;

        if ($request->hasFile('image')) {
            // Handle image update logic here if needed
        }

        $resource->save();

        return redirect()->route('resources.index')->with('success', 'Resource updated successfully.');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully.');
    }
}
