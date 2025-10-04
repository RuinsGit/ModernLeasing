<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMissionSection;
use Illuminate\Http\Request;

class AboutMissionSectionController extends Controller
{
    public function index()
    {
        $aboutMissionSection = AboutMissionSection::first();
        return view('back.pages.about-mission-section.index', compact('aboutMissionSection'));
    }

    public function create()
    {
        $existingSection = AboutMissionSection::first();
        if ($existingSection) {
            return redirect()->route('admin.about-mission-section.edit', $existingSection->id)
                           ->with('info', 'Artıq bir Missiya Bölməsi mövcuddur. Mövcud olanı redaktə edə bilərsiniz.');
        }
        return view('back.pages.about-mission-section.create');
    }

    public function store(Request $request)
    {
        if (AboutMissionSection::exists()) {
            return redirect()->route('admin.about-mission-section.index')
                           ->with('error', 'Artıq bir Missiya Bölməsi mövcuddur! Yalnız bir bölmə ola bilər.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:1000',
        ]);

        AboutMissionSection::create($request->all());

        return redirect()->route('admin.about-mission-section.index')->with('success', 'Missiya Bölməsi uğurla yaradıldı!');
    }

    public function show(AboutMissionSection $aboutMissionSection)
    {
        return view('back.pages.about-mission-section.show', compact('aboutMissionSection'));
    }

    public function edit(AboutMissionSection $aboutMissionSection)
    {
        return view('back.pages.about-mission-section.edit', compact('aboutMissionSection'));
    }

    public function update(Request $request, AboutMissionSection $aboutMissionSection)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:1000',
        ]);

        $aboutMissionSection->update($request->all());

        return redirect()->route('admin.about-mission-section.index')->with('success', 'Missiya Bölməsi uğurla yeniləndi!');
    }

    public function destroy(AboutMissionSection $aboutMissionSection)
    {
        // Bu bölməni silməyə ehtiyac yoxdur, çünki həmişə bir giriş olmalıdır.
        return redirect()->route('admin.about-mission-section.index')->with('warning', 'Missiya Bölməsi silinə bilməz!');
    }
}
