<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsItemController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::orderBy('order')->orderBy('news_date', 'desc')->get();
        return view('back.pages.news-item.index', compact('newsItems'));
    }

    public function create()
    {
        return view('back.pages.news-item.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'news_date' => 'required|date',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $data['image'] = $imagePath;
        }

        if ($data['order'] == 0) {
            $data['order'] = NewsItem::max('order') + 1;
        }

        NewsItem::create($data);

        return redirect()->route('admin.news-items.index')->with('success', 'Xəbər uğurla yaradıldı!');
    }

    public function show(NewsItem $newsItem)
    {
        return view('back.pages.news-item.show', compact('newsItem'));
    }

    public function edit(NewsItem $newsItem)
    {
        return view('back.pages.news-item.edit', compact('newsItem'));
    }

    public function update(Request $request, NewsItem $newsItem)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'news_date' => 'required|date',
            'order' => 'required|integer|min:0'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            if ($newsItem->image) {
                Storage::disk('public')->delete($newsItem->image);
            }
            $imagePath = $request->file('image')->store('news_images', 'public');
            $data['image'] = $imagePath;
        } else if ($request->input('remove_image')) { // Şəkil silmə funksiyası üçün əlavə yoxlama
            if ($newsItem->image) {
                Storage::disk('public')->delete($newsItem->image);
            }
            $data['image'] = null;
        }

        $newsItem->update($data);

        return redirect()->route('admin.news-items.index')->with('success', 'Xəbər uğurla yeniləndi!');
    }

    public function destroy(NewsItem $newsItem)
    {
        try {
            if ($newsItem->image) {
                Storage::disk('public')->delete($newsItem->image);
            }
            $newsItem->delete();
            return redirect()->route('admin.news-items.index')->with('success', 'Xəbər uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.news-items.index')->with('error', 'Xəta baş verdi!');
        }
    }

    public function toggleStatus(NewsItem $newsItem)
    {
        $newsItem->is_active = !$newsItem->is_active;
        $newsItem->save();

        $status = $newsItem->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "Xəbər {$status} edildi!");
    }
}
