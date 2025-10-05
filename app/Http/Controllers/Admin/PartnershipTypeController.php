<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnershipType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PartnershipTypeController extends Controller
{
    private $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'icon_class' => 'nullable|string|max:100',
        'benefits.*' => 'nullable|string|max:255',
        'order' => 'nullable|integer|min:0',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partnershipTypes = PartnershipType::getOrdered();
        return view('back.pages.partnership-type.index', compact('partnershipTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.partnership-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', 'benefits']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['benefits'] = array_filter($request->input('benefits', [])); // Boş faydaları sil

        if (empty($data['order']) || $data['order'] == 0) {
            $data['order'] = PartnershipType::max('order') + 1;
        }

        PartnershipType::create($data);

        return redirect()->route('admin.partnership-types.index')->with('success', 'Tərəfdaşlıq növü uğurla əlavə edildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PartnershipType $partnershipType)
    {
        return view('back.pages.partnership-type.show', compact('partnershipType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartnershipType $partnershipType)
    {
        return view('back.pages.partnership-type.edit', compact('partnershipType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PartnershipType $partnershipType)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', '_method', 'benefits']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['benefits'] = array_filter($request->input('benefits', [])); // Boş faydaları sil

        $partnershipType->update($data);

        return redirect()->route('admin.partnership-types.index')->with('success', 'Tərəfdaşlıq növü uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartnershipType $partnershipType)
    {
        try {
            $partnershipType->delete();
            return redirect()->route('admin.partnership-types.index')->with('success', 'Tərəfdaşlıq növü uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.partnership-types.index')->with('error', 'Xəta baş verdi!');
        }
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(PartnershipType $partnershipType)
    {
        $partnershipType->is_active = !$partnershipType->is_active;
        $partnershipType->save();

        $status = $partnershipType->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Tərəfdaşlıq növü {$status} edildi!");
    }

    /**
     * Update the order of resources.
     */
    public function order(Request $request)
    {
        $orderData = $request->input('order');

        foreach ($orderData as $id => $order) {
            PartnershipType::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['status' => 'success', 'message' => 'Sıralama uğurla yeniləndi.']);
    }
}
