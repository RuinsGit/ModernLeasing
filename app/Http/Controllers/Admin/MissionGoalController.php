<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MissionGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MissionGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $missionGoals = MissionGoal::orderBy('order')->orderBy('created_at', 'desc')->paginate(10);
        return view('back.pages.mission-goals.index', compact('missionGoals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.mission-goals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        
        // Checkbox handling
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Order handling
        if ($data['order'] == 0) {
            $data['order'] = MissionGoal::max('order') + 1;
        }

        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            
            if (!file_exists(public_path('uploads/mission-goals'))) {
                mkdir(public_path('uploads/mission-goals'), 0755, true);
            }
            
            $image->move(public_path('uploads/mission-goals'), $imageName);
            $data['image'] = $imageName;
        }

        MissionGoal::create($data);

        return redirect()->route('admin.mission-goals.index')->with('success', 'Missiya/Məqsəd uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MissionGoal $missionGoal)
    {
        return view('back.pages.mission-goals.show', compact('missionGoal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MissionGoal $missionGoal)
    {
        return view('back.pages.mission-goals.edit', compact('missionGoal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MissionGoal $missionGoal)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        
        // Checkbox handling
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // Image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($missionGoal->image && file_exists(public_path('uploads/mission-goals/' . $missionGoal->image))) {
                unlink(public_path('uploads/mission-goals/' . $missionGoal->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            
            if (!file_exists(public_path('uploads/mission-goals'))) {
                mkdir(public_path('uploads/mission-goals'), 0755, true);
            }
            
            $image->move(public_path('uploads/mission-goals'), $imageName);
            $data['image'] = $imageName;
        } else if ($request->boolean('clear_image')) {
             if ($missionGoal->image && file_exists(public_path('uploads/mission-goals/' . $missionGoal->image))) {
                unlink(public_path('uploads/mission-goals/' . $missionGoal->image));
            }
            $data['image'] = null;
        }

        $missionGoal->update($data);

        return redirect()->route('admin.mission-goals.index')->with('success', 'Missiya/Məqsəd uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MissionGoal $missionGoal)
    {
        try {
            // Delete image if exists
            if ($missionGoal->image && file_exists(public_path('uploads/mission-goals/' . $missionGoal->image))) {
                unlink(public_path('uploads/mission-goals/' . $missionGoal->image));
            }

            $missionGoal->delete();

            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Missiya/Məqsəd uğurla silindi!']);
            }

            return redirect()->route('admin.mission-goals.index')->with('success', 'Missiya/Məqsəd uğurla silindi!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => 'Xəta baş verdi!']);
            }

            return redirect()->route('admin.mission-goals.index')->with('error', 'Xəta baş verdi!');
        }
    }

    /**
     * Toggle status of the specified resource.
     */
    public function toggleStatus(MissionGoal $missionGoal)
    {
        $missionGoal->is_active = !$missionGoal->is_active;
        $missionGoal->save();

        $status = $missionGoal->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Missiya/Məqsəd {$status} edildi!");
    }
}
