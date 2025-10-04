<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatItem;
use Illuminate\Http\Request;

class StatItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statItems = StatItem::orderBy('order')->orderBy('created_at', 'desc')->paginate(10);
        return view('back.pages.stat-items.index', compact('statItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.stat-items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:100',
            'value' => 'required|integer|min:0',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        
        // Checkbox handling
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Order handling
        if ($data['order'] == 0) {
            $data['order'] = StatItem::max('order') + 1;
        }

        StatItem::create($data);

        return redirect()->route('admin.stat-items.index')->with('success', 'Statistika elementi uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(StatItem $statItem)
    {
        return view('back.pages.stat-items.show', compact('statItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatItem $statItem)
    {
        return view('back.pages.stat-items.edit', compact('statItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatItem $statItem)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:100',
            'value' => 'required|integer|min:0',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        
        // Checkbox handling
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $statItem->update($data);

        return redirect()->route('admin.stat-items.index')->with('success', 'Statistika elementi uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatItem $statItem)
    {
        try {
            $statItem->delete();

            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Statistika elementi uğurla silindi!']);
            }

            return redirect()->route('admin.stat-items.index')->with('success', 'Statistika elementi uğurla silindi!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => 'Xəta baş verdi!']);
            }

            return redirect()->route('admin.stat-items.index')->with('error', 'Xəta baş verdi!');
        }
    }

    /**
     * Toggle status of the specified resource.
     */
    public function toggleStatus(StatItem $statItem)
    {
        $statItem->is_active = !$statItem->is_active;
        $statItem->save();

        $status = $statItem->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Statistika elementi {$status} edildi!");
    }
}
