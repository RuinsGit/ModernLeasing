<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeroFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroFeatures = HeroFeature::orderBy('order')->paginate(10);
        return view('back.pages.hero-features.index', compact('heroFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.hero-features.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();

        // Şəkil yükləmə (məcburi)
        $image = $request->file('image');
        $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
        
        // uploads/hero-features qovluğunu yarat
        if (!file_exists(public_path('uploads/hero-features'))) {
            mkdir(public_path('uploads/hero-features'), 0755, true);
        }
        
        $image->move(public_path('uploads/hero-features'), $imageName);
        $data['image'] = $imageName;

        HeroFeature::create($data);

        return redirect()->route('admin.hero-features.index')->with('success', 'Hero feature uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroFeature $heroFeature)
    {
        return view('back.pages.hero-features.show', compact('heroFeature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroFeature $heroFeature)
    {
        return view('back.pages.hero-features.edit', compact('heroFeature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroFeature $heroFeature)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();

        // Yeni şəkil yükləndisə
        if ($request->hasFile('image')) {
            // Köhnə şəkli sil
            if ($heroFeature->image && file_exists(public_path('uploads/hero-features/' . $heroFeature->image))) {
                unlink(public_path('uploads/hero-features/' . $heroFeature->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            
            // uploads/hero-features qovluğunu yarat
            if (!file_exists(public_path('uploads/hero-features'))) {
                mkdir(public_path('uploads/hero-features'), 0755, true);
            }
            
            $image->move(public_path('uploads/hero-features'), $imageName);
            $data['image'] = $imageName;
        }

        $heroFeature->update($data);

        return redirect()->route('admin.hero-features.index')->with('success', 'Hero feature uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroFeature $heroFeature)
    {
        // Şəkli sil
        if ($heroFeature->image && file_exists(public_path('uploads/hero-features/' . $heroFeature->image))) {
            unlink(public_path('uploads/hero-features/' . $heroFeature->image));
        }

        $heroFeature->delete();

        return redirect()->route('admin.hero-features.index')->with('success', 'Hero feature uğurla silindi!');
    }
}