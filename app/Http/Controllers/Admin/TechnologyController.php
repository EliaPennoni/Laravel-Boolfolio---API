<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $data = $request->validate([
                'name' => 'required|max:64',

            ]);

            $technology = technology::create($data);


            return redirect()->route('admin.technologies.show', ['technology' => $technology->id]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $technology = technology::findOrFail($id);
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $technology = technology::findOrFail($id);
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|max:64',

        ]);
        $technology = technology::findOrFail($id);
        $technology->update($data);


        return redirect()->route('admin.technologies.show', ['technology' => $technology->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technology = technology::findOrFail($id);
        $technology->delete();
        return redirect()->route('admin.technologies.index');
    }
}
