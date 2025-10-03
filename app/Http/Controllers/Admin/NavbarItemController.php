<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavbarItem;
use Illuminate\Http\Request;

class NavbarItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $navbarItems = NavbarItem::orderBy('order')->paginate(10);
        return view('back.pages.navbar.index', compact('navbarItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.navbar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'route_name' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->only(['title', 'route_name', 'url', 'icon', 'order']);
        
        // Boolean değerler için checkbox kontrolü
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['show_desktop'] = $request->has('show_desktop') ? 1 : 0;
        $data['show_mobile'] = $request->has('show_mobile') ? 1 : 0;

        NavbarItem::create($data);

        return redirect()->route('admin.navbar.index')->with('success', 'Navbar elementi uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(NavbarItem $navbar)
    {
        return view('back.pages.navbar.show', compact('navbar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NavbarItem $navbar)
    {
        return view('back.pages.navbar.edit', compact('navbar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NavbarItem $navbar)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'route_name' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->only(['title', 'route_name', 'url', 'icon', 'order']);
        
        // Boolean değerler için checkbox kontrolü
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['show_desktop'] = $request->has('show_desktop') ? 1 : 0;
        $data['show_mobile'] = $request->has('show_mobile') ? 1 : 0;

        $navbar->update($data);

        return redirect()->route('admin.navbar.index')->with('success', 'Navbar elementi uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     * Silmə funksiyası deaktiv edilmişdir.
     */
    public function destroy(NavbarItem $navbar)
    {
        return redirect()->route('admin.navbar.index')->with('error', 'Navbar elementlərini silmək icazə verilmir!');
    }

    /**
     * Toggle the active status of the navbar item.
     */
    public function toggleStatus(NavbarItem $navbar)
    {
        $navbar->is_active = !$navbar->is_active;
        $navbar->save();

        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi!');
    }
}