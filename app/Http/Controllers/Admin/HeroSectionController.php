<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSections = HeroSection::orderBy('created_at', 'desc')->paginate(10);
        return view('back.pages.hero.index', compact('heroSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Əgər artıq hero section varsa, create səhifəsinə icazə vermə
        $existingHero = HeroSection::first();
        if ($existingHero) {
            return redirect()->route('admin.hero.edit', $existingHero->id)
                ->with('info', 'Artıq hero section mövcuddur. Yalnız redaktə edə bilərsiniz.');
        }
        
        return view('back.pages.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Əgər artıq hero section varsa, yenisini yaratmağa icazə vermə
        $existingHero = HeroSection::first();
        if ($existingHero) {
            return redirect()->route('admin.hero.edit', $existingHero->id)
                ->with('error', 'Artıq hero section mövcuddur. Yalnız redaktə edə bilərsiniz.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'primary_button_text' => 'required|string|max:255',
            'primary_button_link' => 'required|string|max:255',
            'secondary_button_text' => 'required|string|max:255',
            'secondary_button_link' => 'required|string|max:255',
            'happy_customers' => 'required|integer|min:0',
            'delivered_equipment' => 'required|integer|min:0',
            'international_partners' => 'required|integer|min:0',
            'years_experience' => 'required|integer|min:0'
        ]);

        HeroSection::create($request->all());

        return redirect()->route('admin.hero.index')->with('success', 'Hero section uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroSection $hero)
    {
        return view('back.pages.hero.show', compact('hero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $hero)
    {
        return view('back.pages.hero.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeroSection $hero)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'primary_button_text' => 'required|string|max:255',
            'primary_button_link' => 'required|string|max:255',
            'secondary_button_text' => 'required|string|max:255',
            'secondary_button_link' => 'required|string|max:255',
            'happy_customers' => 'required|integer|min:0',
            'delivered_equipment' => 'required|integer|min:0',
            'international_partners' => 'required|integer|min:0',
            'years_experience' => 'required|integer|min:0'
        ]);

        $hero->update($request->all());

        return redirect()->route('admin.hero.index')->with('success', 'Hero section uğurla yeniləndi!');
    }
}