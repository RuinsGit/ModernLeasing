<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyHistoryItem;
use Illuminate\Http\Request;

class CompanyHistoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historyItems = CompanyHistoryItem::orderBy('order')->orderBy('year', 'desc')->get();
        return view('back.pages.company-history-items.index', compact('historyItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.company-history-items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer|min:1900|max:2100',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'icon_class' => 'nullable|string|max:100',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($data['order'] == 0) {
            $data['order'] = CompanyHistoryItem::max('order') + 1;
        }

        CompanyHistoryItem::create($data);

        return redirect()->route('admin.company-history-items.index')->with('success', 'Tarix elementi uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyHistoryItem $companyHistoryItem)
    {
        return view('back.pages.company-history-items.show', compact('companyHistoryItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyHistoryItem $companyHistoryItem)
    {
        return view('back.pages.company-history-items.edit', compact('companyHistoryItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CompanyHistoryItem $companyHistoryItem)
    {
        $request->validate([
            'year' => 'required|integer|min:1900|max:2100',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'icon_class' => 'nullable|string|max:100',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $companyHistoryItem->update($data);

        return redirect()->route('admin.company-history-items.index')->with('success', 'Tarix elementi uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyHistoryItem $companyHistoryItem)
    {
        try {
            $companyHistoryItem->delete();
            return redirect()->route('admin.company-history-items.index')->with('success', 'Tarix elementi uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.company-history-items.index')->with('error', 'Xəta baş verdi!');
        }
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(CompanyHistoryItem $companyHistoryItem)
    {
        $companyHistoryItem->is_active = !$companyHistoryItem->is_active;
        $companyHistoryItem->save();

        $status = $companyHistoryItem->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Tarix elementi {$status} edildi!");
    }

    /**
     * Update the order of resources.
     */
    public function order(Request $request)
    {
        $orderData = $request->input('order');

        foreach ($orderData as $id => $order) {
            CompanyHistoryItem::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['status' => 'success', 'message' => 'Sıralama uğurla yeniləndi.']);
    }
}
