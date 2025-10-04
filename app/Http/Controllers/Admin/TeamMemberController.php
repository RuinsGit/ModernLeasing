<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class TeamMemberController extends Controller
{
    private $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path('uploads/team-members');

        if (!File::exists($this->uploadPath)) {
            File::makeDirectory($this->uploadPath, 0755, true);
        }
    }

    public function index()
    {
        $teamMembers = TeamMember::orderBy('order')->get();
        return view('back.pages.team-member.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('back.pages.team-member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($data['order'] == 0) {
            $data['order'] = TeamMember::max('order') + 1;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move($this->uploadPath, $imageName);
            $data['image'] = $imageName;
        }

        TeamMember::create($data);

        return redirect()->route('admin.team-members.index')->with('success', 'Komanda üzvü uğurla yaradıldı!');
    }

    public function show(TeamMember $teamMember)
    {
        return view('back.pages.team-member.show', compact('teamMember'));
    }

    public function edit(TeamMember $teamMember)
    {
        return view('back.pages.team-member.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            if ($teamMember->image && File::exists($this->uploadPath . '/' . $teamMember->image)) {
                File::delete($this->uploadPath . '/' . $teamMember->image);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move($this->uploadPath, $imageName);
            $data['image'] = $imageName;
        } elseif ($request->boolean('clear_image')) {
            if ($teamMember->image && File::exists($this->uploadPath . '/' . $teamMember->image)) {
                File::delete($this->uploadPath . '/' . $teamMember->image);
            }
            $data['image'] = null;
        }

        $teamMember->update($data);

        return redirect()->route('admin.team-members.index')->with('success', 'Komanda üzvü uğurla yeniləndi!');
    }

    public function destroy(TeamMember $teamMember)
    {
        try {
            if ($teamMember->image && File::exists($this->uploadPath . '/' . $teamMember->image)) {
                File::delete($this->uploadPath . '/' . $teamMember->image);
            }
            $teamMember->delete();
            return redirect()->route('admin.team-members.index')->with('success', 'Komanda üzvü uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.team-members.index')->with('error', 'Xəta baş verdi!');
        }
    }

    public function toggleStatus(TeamMember $teamMember)
    {
        $teamMember->is_active = !$teamMember->is_active;
        $teamMember->save();

        $status = $teamMember->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Komanda üzvü {$status} edildi!");
    }
}
