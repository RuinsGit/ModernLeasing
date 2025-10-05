<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnershipFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnershipFeatureController extends Controller
{
    private $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'icon_class' => 'nullable|string|max:100',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'stat_number_1' => 'nullable|string|max:50',
        'stat_text_1' => 'nullable|string|max:255',
        'stat_number_2' => 'nullable|string|max:50',
        'stat_text_2' => 'nullable|string|max:255',
        'order' => 'nullable|integer|min:0',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partnershipFeatures = PartnershipFeature::getOrdered();
        return view('back.pages.partnership-feature.index', compact('partnershipFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.partnership-feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('partnership_features', 'public');
        }

        if (empty($data['order']) || $data['order'] == 0) {
            $data['order'] = PartnershipFeature::max('order') + 1;
        }

        PartnershipFeature::create($data);

        return redirect()->route('admin.partnership-features.index')->with('success', 'Tərəfdaşlıq xüsusiyyəti uğurla əlavə edildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PartnershipFeature $partnershipFeature)
    {
        return view('back.pages.partnership-feature.show', compact('partnershipFeature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartnershipFeature $partnershipFeature)
    {
        return view('back.pages.partnership-feature.edit', compact('partnershipFeature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartnershipFeature $partnershipFeature)
    {
        $request->validate($this->rules);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            // Köhnə şəkli sil
            if ($partnershipFeature->image) {
                Storage::disk('public')->delete($partnershipFeature->image);
            }
            $data['image'] = $request->file('image')->store('partnership_features', 'public');
        } elseif ($request->input('remove_image')) {
            // Şəkli silmək istənirsə
            if ($partnershipFeature->image) {
                Storage::disk('public')->delete($partnershipFeature->image);
            }
            $data['image'] = null;
        }

        $partnershipFeature->update($data);

        return redirect()->route('admin.partnership-features.index')->with('success', 'Tərəfdaşlıq xüsusiyyəti uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartnershipFeature $partnershipFeature)
    {
        try {
            if ($partnershipFeature->image) {
                Storage::disk('public')->delete($partnershipFeature->image);
            }
            $partnershipFeature->delete();
            return redirect()->route('admin.partnership-features.index')->with('success', 'Tərəfdaşlıq xüsusiyyəti uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.partnership-features.index')->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(PartnershipFeature $partnershipFeature)
    {
        $partnershipFeature->is_active = !$partnershipFeature->is_active;
        $partnershipFeature->save();

        $status = $partnershipFeature->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Tərəfdaşlıq xüsusiyyəti {$status} edildi!");
    }

    /**
     * Update the order of resources.
     */
    public function order(Request $request)
    {
        $orderData = $request->input('order');

        foreach ($orderData as $id => $order) {
            PartnershipFeature::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['status' => 'success', 'message' => 'Sıralama uğurla yeniləndi.']);
    }
}
