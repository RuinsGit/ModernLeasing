<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqItemController extends Controller
{
    protected $rules = [
        'faq_category_id' => 'required|exists:faq_categories,id',
        'question' => 'required|string|max:1000',
        'order' => 'nullable|integer|min:0',
        'answer_type.*' => 'required|string',
        'answer_content.*' => 'nullable|string',
        'answer_list.*.*' => 'nullable|string', // List items
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqItems = FaqItem::with('faqCategory')->orderBy('order')->get();
        return view('back.pages.faq-item.index', compact('faqItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = FaqCategory::getOrderedCategories();
        return view('back.pages.faq-item.create', compact('categories'));
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

        $data = $request->except(['_token', 'answer_type', 'answer_content', 'answer_list', 'answer_table_headers', 'answer_table_rows', 'answer_alert_style', 'answer_alert_icon', 'answer_alert_message']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if (empty($data['order']) || $data['order'] == 0) {
            $data['order'] = FaqItem::max('order') + 1;
        }

        $answer = $this->processAnswerData($request);
        $data['answer'] = $answer;

        FaqItem::create($data);

        return redirect()->route('admin.faq-items.index')->with('success', 'FAQ sualı uğurla əlavə edildi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FaqItem $faqItem)
    {
        return view('back.pages.faq-item.show', compact('faqItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FaqItem $faqItem)
    {
        $categories = FaqCategory::getOrderedCategories();
        return view('back.pages.faq-item.edit', compact('faqItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqItem $faqItem)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', '_method', 'answer_type', 'answer_content', 'answer_list', 'answer_table_headers', 'answer_table_rows', 'answer_alert_style', 'answer_alert_icon', 'answer_alert_message']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $answer = $this->processAnswerData($request);
        $data['answer'] = $answer;

        $faqItem->update($data);

        return redirect()->route('admin.faq-items.index')->with('success', 'FAQ sualı uğurla yeniləndi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqItem $faqItem)
    {
        try {
            $faqItem->delete();
            return redirect()->route('admin.faq-items.index')->with('success', 'FAQ sualı uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(FaqItem $faqItem)
    {
        $faqItem->is_active = !$faqItem->is_active;
        $faqItem->save();

        $status = $faqItem->is_active ? 'aktiv' : 'deaktiv';
        return redirect()->back()->with('success', "FAQ sualı {$status} edildi!");
    }

    /**
     * Update the order of resources.
     */
    public function order(Request $request)
    {
        $orderData = $request->input('order');

        foreach ($orderData as $id => $order) {
            FaqItem::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['status' => 'success', 'message' => 'Sıralama uğurla yeniləndi.']);
    }

    /**
     * Process the dynamic answer data from the request.
     */
    protected function processAnswerData(Request $request)
    {
        $answerBlocks = [];
        $answerTypes = $request->input('answer_type');

        if (is_array($answerTypes)) {
            foreach ($answerTypes as $key => $type) {
                $block = ['type' => $type];
                switch ($type) {
                    case 'paragraph':
                    case 'custom_html':
                    case 'heading': // Başlıqlar üçün də content istifadə edirik
                        $block['content'] = $request->input("answer_content." . $key);
                        if ($type === 'heading') {
                            $block['level'] = $request->input("answer_heading_level." . $key, 5); // Default h5
                        }
                        break;
                    case 'list_ordered':
                    case 'list_unordered':
                        $listItems = array_filter($request->input("answer_list." . $key, []));
                        $block['content'] = array_values($listItems); // Yenidən indeksləmək üçün
                        break;
                }
                $answerBlocks[] = $block;
            }
        }
        return $answerBlocks;
    }
}
