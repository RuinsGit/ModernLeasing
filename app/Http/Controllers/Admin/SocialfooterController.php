<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socialfooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class SocialfooterController extends Controller
{
    private $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path('uploads/socialfooters');
        
        // Upload qovluğu yoxdursa yarat
        if (!File::exists($this->uploadPath)) {
            File::makeDirectory($this->uploadPath, 0755, true);
        }
    }

    public function index()
    {
        // Artisan::call('migrate'); // Artıq bu lazım deyil
        $socialfooters = Socialfooter::orderBy('order')->get();
        return view('back.admin.socialfooter.index', compact('socialfooters'));
    }

    public function create()
    {
        return view('back.admin.socialfooter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'icon_class' => 'nullable|string|max:100',
            'link' => 'required|url',
            'order' => 'required|integer|min:0'
        ], [
            'image.image' => 'Fayl şəkil formatında olmalıdır',
            'link.required' => 'Link mütləq daxil edilməlidir',
            'link.url' => 'Düzgün link daxil edin',
            'order.required' => 'Sıra nömrəsi mütləq daxil edilməlidir',
            'order.integer' => 'Sıra nömrəsi tam ədəd olmalıdır',
            'order.min' => 'Sıra nömrəsi sıfırdan kiçik ola bilməz'
        ]);

        $data = $request->except(['_token']);
        
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(10) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($this->uploadPath, $imageName);
            $data['image'] = $imageName;
            $data['icon_class'] = null; // Şəkil yüklənibsə ikon class sıfırlanır
        } else {
            $data['image'] = null; // Şəkil yüklənməyibsə boş olur
        }

        if ($data['order'] == 0) {
            $data['order'] = Socialfooter::max('order') + 1;
        }

        Socialfooter::create($data);

        return redirect()->route('back.pages.socialfooter.index')->with('success', 'Sosial media uğurla əlavə edildi');
    }

    public function edit($id)
    {
        $socialfooter = Socialfooter::findOrFail($id);
        return view('back.admin.socialfooter.edit', compact('socialfooter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'icon_class' => 'nullable|string|max:100',
            'link' => 'required|url',
            'order' => 'required|integer|min:0'
        ], [
            'image.image' => 'Fayl şəkil formatında olmalıdır',
            'link.required' => 'Link mütləq daxil edilməlidir',
            'link.url' => 'Düzgün link daxil edin',
            'order.required' => 'Sıra nömrəsi mütləq daxil edilməlidir',
            'order.integer' => 'Sıra nömrəsi tam ədəd olmalıdır',
            'order.min' => 'Sıra nömrəsi sıfırdan kiçik ola bilməz'
        ]);

        $socialfooter = Socialfooter::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // Şəkil yüklənməsi
        if ($request->hasFile('image')) {
            // Köhnə şəkli sil
            if ($socialfooter->image && File::exists($this->uploadPath . '/' . $socialfooter->image)) {
                File::delete($this->uploadPath . '/' . $socialfooter->image);
            }

            $image = $request->file('image');
            $imageName = Str::random(10) . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($this->uploadPath, $imageName);
            $data['image'] = $imageName;
            $data['icon_class'] = null; // Şəkil yüklənibsə ikon class sıfırlanır
        } elseif ($request->input('clear_image')) {
            // Şəkli sil checkbox seçilibsə
            if ($socialfooter->image && File::exists($this->uploadPath . '/' . $socialfooter->image)) {
                File::delete($this->uploadPath . '/' . $socialfooter->image);
            }
            $data['image'] = null;
        } else {
            $data['image'] = $socialfooter->image; // Köhnə şəkli saxla
        }

        // Əgər icon_class boşdursa və şəkil yoxdursa, boş saxla
        if (!$request->hasFile('image') && empty($request->input('icon_class'))) {
            $data['icon_class'] = null;
        }
        
        $socialfooter->update($data);

        return redirect()->route('back.pages.socialfooter.index')->with('success', 'Sosial media uğurla yeniləndi');
    }

    public function destroy($id)
    {
        $socialfooter = Socialfooter::findOrFail($id);
        
        if ($socialfooter->image && File::exists(public_path($socialfooter->image))) {
            File::delete(public_path($socialfooter->image));
        }
        
        $socialfooter->delete();

        return redirect()->route('back.pages.socialfooter.index')->with('success', 'Sosial media uğurla silindi');
    }

    public function updateOrder(Request $request)
    {
        foreach ($request->order as $key => $order) {
            Socialfooter::where('id', $order['id'])->update(['order' => $order['position']]);
        }

        return response()->json(['status' => 'success', 'message' => 'Sıra uğurla yeniləndi.']);
    }

    public function toggleStatus($id)
    {
        $socialfooter = Socialfooter::findOrFail($id);
        $socialfooter->is_active = !$socialfooter->is_active;
        $socialfooter->save();

        return redirect()->back()->with('success', 'Status uğurla dəyişdirildi');
    }
}
