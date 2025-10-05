<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InvestorContactSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class InvestorContactSectionController extends Controller
{
    private $rules = [
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:1000',
        'button1_text' => 'nullable|string|max:255',
        'button1_link' => 'nullable|string|max:500',
        'button2_text' => 'nullable|string|max:255',
        'button2_link' => 'nullable|string|max:500',
        'email' => 'nullable|email|max:255',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectionData = InvestorContactSection::first();
        return view('back.pages.investor-contact-section.index', compact('sectionData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingSection = InvestorContactSection::first();
        if ($existingSection) {
            return redirect()->route('admin.investor-contact-section.edit', $existingSection->id)
                           ->with('info', 'Artıq investor əlaqə bölməsi mövcuddur. Mövcud məlumatları redaktə edə bilərsiniz.');
        }
        return view('back.pages.investor-contact-section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (InvestorContactSection::exists()) {
            return redirect()->route('admin.investor-contact-section.index')
                           ->with('error', 'Artıq investor əlaqə bölməsi mövcuddur! Yalnız bir bölmə ola bilər.');
        }

        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        InvestorContactSection::create($data);

        return redirect()->route('admin.investor-contact-section.index')->with('success', 'İnvestor əlaqə bölməsi uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(InvestorContactSection $investorContactSection)
    {
        // Tək girişli resurs üçün show səhifəsinə ehtiyac yoxdur, index kifayətdir
        return redirect()->route('admin.investor-contact-section.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvestorContactSection $investorContactSection)
    {
        return view('back.pages.investor-contact-section.edit', compact('investorContactSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvestorContactSection $investorContactSection)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $investorContactSection->update($data);

        return redirect()->route('admin.investor-contact-section.index')->with('success', 'İnvestor əlaqə bölməsi uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Session::flash('error', 'İnvestor əlaqə bölməsi silinə bilməz. Zəhmət olmasa, deaktiv edin.');
        return redirect()->route('admin.investor-contact-section.index');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(InvestorContactSection $investorContactSection)
    {
        $investorContactSection->is_active = !$investorContactSection->is_active;
        $investorContactSection->save();

        $status = $investorContactSection->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "İnvestor əlaqə bölməsi {$status} edildi!");
    }
}
