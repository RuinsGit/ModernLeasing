<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    private $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path('uploads/services');
        
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
        $services = Service::orderBy('order', 'asc')->orderBy('id', 'asc')->paginate(10);
        return view('back.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.services.create');
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
            'features' => 'nullable|string',
            'order' => 'nullable|integer|min:0'
        ]);

        $data = $request->only(['title', 'description', 'icon', 'order']);
        
        // Boolean sahələr
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Order təyin et
        if (!$data['order']) {
            $data['order'] = Service::max('order') + 1;
        }

        // Features'ı JSON formatında saxla
        if ($request->features) {
            $featuresArray = array_filter(array_map('trim', explode("\n", $request->features)));
            $data['features'] = json_encode($featuresArray);
        }

        // Şəkil yükləmə
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = 'service_' . time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($this->uploadPath, $imageName);
            $data['image'] = $imageName;
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Xidmət uğurla yaradıldı!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('back.pages.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('back.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' => 'nullable|string',
            'order' => 'nullable|integer|min:0'
        ]);

        $data = $request->only(['title', 'description', 'icon', 'order']);
        
        // Boolean sahələr
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Order təyin et
        if (!$data['order']) {
            $data['order'] = $service->order;
        }

        // Features'ı JSON formatında saxla
        if ($request->features) {
            $featuresArray = array_filter(array_map('trim', explode("\n", $request->features)));
            $data['features'] = json_encode($featuresArray);
        } else {
            $data['features'] = null;
        }

        // Şəkil yükləmə
        if ($request->hasFile('image')) {
            // Köhnə şəkli sil
            if ($service->image && File::exists($this->uploadPath . '/' . $service->image)) {
                File::delete($this->uploadPath . '/' . $service->image);
            }
            
            $imageFile = $request->file('image');
            $imageName = 'service_' . time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($this->uploadPath, $imageName);
            $data['image'] = $imageName;
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Xidmət uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Şəkli sil
        if ($service->image && File::exists($this->uploadPath . '/' . $service->image)) {
            File::delete($this->uploadPath . '/' . $service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Xidmət uğurla silindi!');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(Service $service)
    {
        $service->is_active = !$service->is_active;
        $service->save();

        $status = $service->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Xidmət {$status} edildi!");
    }
}