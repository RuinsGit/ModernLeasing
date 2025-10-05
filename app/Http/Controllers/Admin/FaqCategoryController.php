<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FaqCategoryController extends Controller
{
    protected $rules = [
        'name' => 'required|string|max:255|unique:faq_categories,name',
        'order' => 'nullable|integer|min:0',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FaqCategory::getOrderedCategories();
        return view('back.pages.faq-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pages.faq-category.create');
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

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['slug'] = Str::slug($data['name']);

        if (empty($data['order']) || $data['order'] == 0) {
            $data['order'] = FaqCategory::max('order') + 1;
        }

        FaqCategory::create($data);

        return redirect()->route('admin.faq-categories.index')->with('success', 'FAQ kateqoriyası uğurla əlavə edildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FaqCategory $faqCategory)
    {
        return view('back.pages.faq-category.show', compact('faqCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FaqCategory $faqCategory)
    {
        return view('back.pages.faq-category.edit', compact('faqCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqCategory $faqCategory)
    {
        $rules = $this->rules;
        $rules['name'] = 'required|string|max:255|unique:faq_categories,name,' . $faqCategory->id;
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['slug'] = Str::slug($data['name']);

        $faqCategory->update($data);

        return redirect()->route('admin.faq-categories.index')->with('success', 'FAQ kateqoriyası uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqCategory $faqCategory)
    {
        try {
            if ($faqCategory->faqItems()->count() > 0) {
                return redirect()->back()->with('error', 'Bu kateqoriyaya aid suallar var. Əvvəlcə sualları silin.');
            }
            $faqCategory->delete();
            return redirect()->route('admin.faq-categories.index')->with('success', 'FAQ kateqoriyası uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(FaqCategory $faqCategory)
    {
        $faqCategory->is_active = !$faqCategory->is_active;
        $faqCategory->save();

        $status = $faqCategory->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "FAQ kateqoriyası {$status} edildi!");
    }

    /**
     * Update the order of resources.
     */
    public function order(Request $request)
    {
        $orderData = $request->input('order');

        foreach ($orderData as $id => $order) {
            FaqCategory::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['status' => 'success', 'message' => 'Sıralama uğurla yeniləndi.']);
    }
}
