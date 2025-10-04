<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advantages = Advantage::orderBy('order')->orderBy('created_at', 'desc')->paginate(10);
        return view('back.pages.advantages.index', compact('advantages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.advantages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        
        // Checkbox handling
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Order handling
        if ($data['order'] == 0) {
            $data['order'] = Advantage::max('order') + 1;
        }

        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            
            if (!file_exists(public_path('uploads/advantages'))) {
                mkdir(public_path('uploads/advantages'), 0755, true);
            }
            
            $image->move(public_path('uploads/advantages'), $imageName);
            $data['image'] = $imageName;
        }

        Advantage::create($data);

        return redirect()->route('admin.advantages.index')->with('success', 'Üstünlük uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Advantage $advantage)
    {
        return view('back.pages.advantages.show', compact('advantage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advantage $advantage)
    {
        return view('back.pages.advantages.edit', compact('advantage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advantage $advantage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        
        // Checkbox handling
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // Image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($advantage->image && file_exists(public_path('uploads/advantages/' . $advantage->image))) {
                unlink(public_path('uploads/advantages/' . $advantage->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            
            if (!file_exists(public_path('uploads/advantages'))) {
                mkdir(public_path('uploads/advantages'), 0755, true);
            }
            
            $image->move(public_path('uploads/advantages'), $imageName);
            $data['image'] = $imageName;
        }

        $advantage->update($data);

        return redirect()->route('admin.advantages.index')->with('success', 'Üstünlük uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advantage $advantage)
    {
        try {
            // Delete image if exists
            if ($advantage->image && file_exists(public_path('uploads/advantages/' . $advantage->image))) {
                unlink(public_path('uploads/advantages/' . $advantage->image));
            }

            $advantage->delete();

            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Üstünlük uğurla silindi!']);
            }

            return redirect()->route('admin.advantages.index')->with('success', 'Üstünlük uğurla silindi!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => 'Xəta baş verdi!']);
            }

            return redirect()->route('admin.advantages.index')->with('error', 'Xəta baş verdi!');
        }
    }

    /**
     * Toggle status of the specified resource.
     */
    public function toggleStatus(Advantage $advantage)
    {
        $advantage->is_active = !$advantage->is_active;
        $advantage->save();

        $status = $advantage->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Üstünlük {$status} edildi!");
    }
}
