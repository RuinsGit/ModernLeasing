<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::orderBy('order')->orderBy('created_at', 'desc')->paginate(10);
        return view('back.pages.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        
        // Checkbox handling
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Order handling
        if ($data['order'] == 0) {
            $data['order'] = Partner::max('order') + 1;
        }

        // Logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . Str::random(10) . '.' . $logo->getClientOriginalExtension();
            
            if (!file_exists(public_path('uploads/partners'))) {
                mkdir(public_path('uploads/partners'), 0755, true);
            }
            
            $logo->move(public_path('uploads/partners'), $logoName);
            $data['logo'] = $logoName;
        }

        Partner::create($data);

        return redirect()->route('admin.partners.index')->with('success', 'Tərəfdaş uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        return view('back.pages.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('back.pages.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        
        // Checkbox handling
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // Logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($partner->logo && file_exists(public_path('uploads/partners/' . $partner->logo))) {
                unlink(public_path('uploads/partners/' . $partner->logo));
            }

            $logo = $request->file('logo');
            $logoName = time() . '_' . Str::random(10) . '.' . $logo->getClientOriginalExtension();
            
            if (!file_exists(public_path('uploads/partners'))) {
                mkdir(public_path('uploads/partners'), 0755, true);
            }
            
            $logo->move(public_path('uploads/partners'), $logoName);
            $data['logo'] = $logoName;
        } else if ($request->boolean('clear_logo')) {
             if ($partner->logo && file_exists(public_path('uploads/partners/' . $partner->logo))) {
                unlink(public_path('uploads/partners/' . $partner->logo));
            }
            $data['logo'] = null;
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Tərəfdaş uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        try {
            // Delete logo if exists
            if ($partner->logo && file_exists(public_path('uploads/partners/' . $partner->logo))) {
                unlink(public_path('uploads/partners/' . $partner->logo));
            }

            $partner->delete();

            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Tərəfdaş uğurla silindi!']);
            }

            return redirect()->route('admin.partners.index')->with('success', 'Tərəfdaş uğurla silindi!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => 'Xəta baş verdi!']);
            }

            return redirect()->route('admin.partners.index')->with('error', 'Xəta baş verdi!');
        }
    }

    /**
     * Toggle status of the specified resource.
     */
    public function toggleStatus(Partner $partner)
    {
        $partner->is_active = !$partner->is_active;
        $partner->save();

        $status = $partner->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Tərəfdaş {$status} edildi!");
    }
}
