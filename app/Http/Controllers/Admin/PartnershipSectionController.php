<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnershipSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PartnershipSectionController extends Controller
{
    private $rules = [
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partnershipSection = PartnershipSection::getSectionData();
        return view('back.pages.partnership-section.index', compact('partnershipSection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingSection = PartnershipSection::first();
        if ($existingSection) {
            Session::flash('info', 'Artıq tərəfdaşlıq bölməsi mövcuddur. Zəhmət olmasa, mövcud məlumatları redaktə edin.');
            return redirect()->route('admin.partnership-section.edit', $existingSection->id);
        }
        return view('back.pages.partnership-section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (PartnershipSection::exists()) {
            Session::flash('error', 'Artıq tərəfdaşlıq bölməsi mövcuddur! Yalnız bir bölmə ola bilər.');
            return redirect()->route('admin.partnership-section.index');
        }

        $request->validate($this->rules);

        PartnershipSection::create($request->all());

        return redirect()->route('admin.partnership-section.index')->with('success', 'Tərəfdaşlıq bölməsi uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PartnershipSection $partnershipSection)
    {
        // Tək resurs olduğu üçün show səhifəsinə ehtiyac yoxdur, index-ə yönləndiririk.
        return redirect()->route('admin.partnership-section.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartnershipSection $partnershipSection)
    {
        return view('back.pages.partnership-section.edit', compact('partnershipSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartnershipSection $partnershipSection)
    {
        $request->validate($this->rules);

        $partnershipSection->update($request->all());

        return redirect()->route('admin.partnership-section.index')->with('success', 'Tərəfdaşlıq bölməsi uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartnershipSection $partnershipSection)
    {
        Session::flash('error', 'Tərəfdaşlıq bölməsi silinə bilməz. Yalnız yenilənə bilər.');
        return redirect()->route('admin.partnership-section.index');
    }
}
