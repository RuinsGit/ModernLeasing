<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInfo = ContactInfo::first();
        return view('back.pages.contact-info.index', compact('contactInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingContactInfo = ContactInfo::first();
        if ($existingContactInfo) {
            return redirect()->route('admin.contact-info.edit', $existingContactInfo->id)
                           ->with('info', 'Artıq əlaqə məlumatları mövcuddur. Mövcud məlumatları redaktə edə bilərsiniz.');
        }
        
        return view('back.pages.contact-info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (ContactInfo::exists()) {
            return redirect()->route('admin.contact-info.index')
                           ->with('error', 'Artıq əlaqə məlumatları mövcuddur! Yalnız bir əlaqə məlumatı ola bilər.');
        }

        $request->validate([
            'address' => 'nullable|string|max:500',
            'phone1' => 'nullable|string|max:50',
            'phone2' => 'nullable|string|max:50',
            'email1' => 'nullable|email|max:255',
            'email2' => 'nullable|email|max:255',
            'working_hours_weekdays' => 'nullable|string|max:500',
            'working_hours_weekends' => 'nullable|string|max:500',
            'map_iframe' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        ContactInfo::create($data);

        return redirect()->route('admin.contact-info.index')->with('success', 'Əlaqə məlumatları uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactInfo $contactInfo)
    {
        return view('back.pages.contact-info.show', compact('contactInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactInfo $contactInfo)
    {
        return view('back.pages.contact-info.edit', compact('contactInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactInfo $contactInfo)
    {
        $request->validate([
            'address' => 'nullable|string|max:500',
            'phone1' => 'nullable|string|max:50',
            'phone2' => 'nullable|string|max:50',
            'email1' => 'nullable|email|max:255',
            'email2' => 'nullable|email|max:255',
            'working_hours_weekdays' => 'nullable|string|max:500',
            'working_hours_weekends' => 'nullable|string|max:500',
            'map_iframe' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $contactInfo->update($data);

        return redirect()->route('admin.contact-info.index')->with('success', 'Əlaqə məlumatları uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactInfo $contactInfo)
    {
        try {
            $contactInfo->delete();
            return redirect()->route('admin.contact-info.index')->with('success', 'Əlaqə məlumatları uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.contact-info.index')->with('error', 'Xəta baş verdi!');
        }
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(ContactInfo $contactInfo)
    {
        $contactInfo->is_active = !$contactInfo->is_active;
        $contactInfo->save();

        $status = $contactInfo->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Əlaqə məlumatları {$status} edildi!");
    }
}
