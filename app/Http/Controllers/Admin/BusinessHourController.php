<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BusinessHourController extends Controller
{
    private $rules = [
        'weekday_hours' => 'nullable|string|max:255',
        'weekend_hours' => 'nullable|string|max:255',
    ];

    public function index()
    {
        $businessHour = BusinessHour::first(); // Tək giriş olduğundan ilkini alırıq
        return view('back.pages.business-hour.index', compact('businessHour'));
    }

    public function create()
    {
        // Əgər artıq bir qeyd varsa, yenisini yaratmağa icazə vermə
        if (BusinessHour::count() > 0) {
            Session::flash('info', 'Artıq bir iş saatı qeydi mövcuddur. Zəhmət olmasa, mövcud qeydi redaktə edin.');
            return redirect()->route('admin.business-hours.index');
        }
        return view('back.pages.business-hour.create');
    }

    public function store(Request $request)
    {
        // Əgər artıq bir qeyd varsa, yenisini yaratmağa icazə vermə
        if (BusinessHour::count() > 0) {
            Session::flash('info', 'Artıq bir iş saatı qeydi mövcuddur. Zəhmət olmasa, mövcud qeydi redaktə edin.');
            return redirect()->route('admin.business-hours.index');
        }

        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        BusinessHour::create($data);

        return redirect()->route('admin.business-hours.index')->with('success', 'İş saatları uğurla əlavə edildi!');
    }

    public function show(BusinessHour $businessHour)
    {
        return view('back.pages.business-hour.show', compact('businessHour'));
    }

    public function edit(BusinessHour $businessHour)
    {
        return view('back.pages.business-hour.edit', compact('businessHour'));
    }

    public function update(Request $request, BusinessHour $businessHour)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $businessHour->update($data);

        return redirect()->route('admin.business-hours.index')->with('success', 'İş saatları uğurla yeniləndi!');
    }

    // Silmə funksiyasını ləğv edirik, çünki bu tək girişli bir resursdur.
    // Bunun əvəzinə, deaktiv etmək kifayətdir.
    public function destroy()
    {
        Session::flash('error', 'İş saatları qeydi silinə bilməz. Zəhmət olmasa, deaktiv edin.');
        return redirect()->route('admin.business-hours.index');
    }

    public function toggleStatus(BusinessHour $businessHour)
    {
        $businessHour->is_active = !$businessHour->is_active;
        $businessHour->save();

        $status = $businessHour->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "İş saatları {$status} edildi!");
    }
}
