<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMissionCard;
use Illuminate\Http\Request;

class AboutMissionCardController extends Controller
{
    public function index()
    {
        $missionCards = AboutMissionCard::orderBy('order')->get();
        return view('back.pages.about-mission-card.index', compact('missionCards'));
    }

    public function create()
    {
        return view('back.pages.about-mission-card.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'icon_class' => 'nullable|string|max:100',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($data['order'] == 0) {
            $data['order'] = AboutMissionCard::max('order') + 1;
        }

        AboutMissionCard::create($data);

        return redirect()->route('admin.about-mission-card.index')->with('success', 'Missiya Kartı uğurla yaradıldı!');
    }

    public function show(AboutMissionCard $aboutMissionCard)
    {
        return view('back.pages.about-mission-card.show', compact('aboutMissionCard'));
    }

    public function edit(AboutMissionCard $aboutMissionCard)
    {
        return view('back.pages.about-mission-card.edit', compact('aboutMissionCard'));
    }

    public function update(Request $request, AboutMissionCard $aboutMissionCard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'icon_class' => 'nullable|string|max:100',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $aboutMissionCard->update($data);

        return redirect()->route('admin.about-mission-card.index')->with('success', 'Missiya Kartı uğurla yeniləndi!');
    }

    public function destroy(AboutMissionCard $aboutMissionCard)
    {
        try {
            $aboutMissionCard->delete();
            return redirect()->route('admin.about-mission-card.index')->with('success', 'Missiya Kartı uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.about-mission-card.index')->with('error', 'Xəta baş verdi!');
        }
    }

    public function toggleStatus(AboutMissionCard $aboutMissionCard)
    {
        $aboutMissionCard->is_active = !$aboutMissionCard->is_active;
        $aboutMissionCard->save();

        $status = $aboutMissionCard->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Missiya Kartı {$status} edildi!");
    }
}
