<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteLogoController extends Controller
{
    private $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path('uploads/logos');
        
        // Upload qovluğu yoxdursa yarat
        if (!File::exists($this->uploadPath)) {
            File::makeDirectory($this->uploadPath, 0755, true);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logos = SiteLogo::latest()->paginate(10);
        return view('back.pages.site-logo.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Əgər artıq logo varsa, edit səhifəsinə yönləndir
        $existingLogo = SiteLogo::first();
        if ($existingLogo) {
            return redirect()->route('admin.site-logo.edit', $existingLogo->id)
                           ->with('info', 'Artıq logo mövcuddur. Mövcud logoyu redaktə edə bilərsiniz.');
        }
        
        return view('back.pages.site-logo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Əgər artıq logo varsa, error ver
        if (SiteLogo::exists()) {
            return redirect()->route('admin.site-logo.index')
                           ->with('error', 'Artıq logo mövcuddur! Yalnız bir logo ola bilər.');
        }

        $request->validate([
            'site_name' => 'required|string|max:255',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,ico|max:1024'
        ]);

        $data = $request->only(['site_name']);
        
        // Boolean sahələr
        $data['show_text'] = $request->has('show_text') ? 1 : 0;
        $data['is_active'] = 1; // İlk logo həmişə aktiv olsun

        // Logo şəkil yükləmə
        if ($request->hasFile('logo_image')) {
            $logoFile = $request->file('logo_image');
            $logoName = 'logo_' . time() . '.' . $logoFile->getClientOriginalExtension();
            $logoFile->move($this->uploadPath, $logoName);
            $data['logo_image'] = $logoName;
        }

        // Favicon yükləmə
        if ($request->hasFile('favicon')) {
            $faviconFile = $request->file('favicon');
            $faviconName = 'favicon_' . time() . '.' . $faviconFile->getClientOriginalExtension();
            $faviconFile->move($this->uploadPath, $faviconName);
            $data['favicon'] = $faviconName;
        }

        SiteLogo::create($data);

        return redirect()->route('admin.site-logo.index')->with('success', 'Logo uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteLogo $siteLogo)
    {
        return view('back.pages.site-logo.show', compact('siteLogo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteLogo $siteLogo)
    {
        return view('back.pages.site-logo.edit', compact('siteLogo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteLogo $siteLogo)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,ico|max:1024'
        ]);

        $data = $request->only(['site_name']);
        
        // Boolean sahələr
        $data['show_text'] = $request->has('show_text') ? 1 : 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // Logo şəkil yükləmə
        if ($request->hasFile('logo_image')) {
            // Köhnə şəkli sil
            if ($siteLogo->logo_image && File::exists($this->uploadPath . '/' . $siteLogo->logo_image)) {
                File::delete($this->uploadPath . '/' . $siteLogo->logo_image);
            }
            
            $logoFile = $request->file('logo_image');
            $logoName = 'logo_' . time() . '.' . $logoFile->getClientOriginalExtension();
            $logoFile->move($this->uploadPath, $logoName);
            $data['logo_image'] = $logoName;
        }

        // Favicon yükləmə
        if ($request->hasFile('favicon')) {
            // Köhnə favicon'u sil
            if ($siteLogo->favicon && File::exists($this->uploadPath . '/' . $siteLogo->favicon)) {
                File::delete($this->uploadPath . '/' . $siteLogo->favicon);
            }
            
            $faviconFile = $request->file('favicon');
            $faviconName = 'favicon_' . time() . '.' . $faviconFile->getClientOriginalExtension();
            $faviconFile->move($this->uploadPath, $faviconName);
            $data['favicon'] = $faviconName;
        }

        // Əgər yeni logo aktiv edilərsə, digərlərini deaktiv et
        if ($data['is_active'] && !$siteLogo->is_active) {
            SiteLogo::where('is_active', true)->where('id', '!=', $siteLogo->id)->update(['is_active' => false]);
        }

        $siteLogo->update($data);

        return redirect()->route('admin.site-logo.index')->with('success', 'Logo uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteLogo $siteLogo)
    {
        // Şəkilləri sil
        if ($siteLogo->logo_image && File::exists($this->uploadPath . '/' . $siteLogo->logo_image)) {
            File::delete($this->uploadPath . '/' . $siteLogo->logo_image);
        }
        
        if ($siteLogo->favicon && File::exists($this->uploadPath . '/' . $siteLogo->favicon)) {
            File::delete($this->uploadPath . '/' . $siteLogo->favicon);
        }

        $siteLogo->delete();

        return redirect()->route('admin.site-logo.index')->with('success', 'Logo uğurla silindi! İndi yeni logo əlavə edə bilərsiniz.');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(SiteLogo $siteLogo)
    {
        // Yalnız bir logo olduğu üçün həmişə aktiv olmalıdır
        if (!$siteLogo->is_active) {
            $siteLogo->is_active = true;
            $siteLogo->save();
            return redirect()->back()->with('success', 'Logo aktiv edildi!');
        } else {
            return redirect()->back()->with('warning', 'Logo deaktiv edilə bilməz! Ən azı bir aktiv logo olmalıdır.');
        }
    }
}