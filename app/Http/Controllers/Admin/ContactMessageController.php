<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->get();
        return view('back.pages.contact-message.index', compact('messages'));
    }

    public function create()
    {
        // Mesajlar front-end-dən gəldiyi üçün bu metod boş qalacaq
        return redirect()->route('admin.contact-messages.index');
    }

    public function store(Request $request)
    {
        // Mesajlar front-end-dən gəldiyi üçün bu metod boş qalacaq
        return redirect()->route('admin.contact-messages.index');
    }

    public function show(ContactMessage $contactMessage)
    {
        $contactMessage->is_read = true;
        $contactMessage->save();
        return view('back.pages.contact-message.show', compact('contactMessage'));
    }

    public function edit(ContactMessage $contactMessage)
    {
        // Mesajlar redaktə edilmədiyi üçün bu metod boş qalacaq
        return redirect()->route('admin.contact-messages.show', $contactMessage->id);
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        // Mesajlar redaktə edilmədiyi üçün bu metod boş qalacaq
        return redirect()->route('admin.contact-messages.show', $contactMessage->id);
    }

    public function destroy(ContactMessage $contactMessage)
    {
        try {
            $contactMessage->delete();
            return redirect()->route('admin.contact-messages.index')->with('success', 'Mesaj uğurla silindi!');
        } catch (\Exception $e) {
            return redirect()->route('admin.contact-messages.index')->with('error', 'Xəta baş verdi!');
        }
    }

    public function markAsRead(ContactMessage $contactMessage)
    {
        $contactMessage->is_read = true;
        $contactMessage->save();
        return redirect()->back()->with('success', 'Mesaj oxundu kimi qeyd edildi!');
    }

    public function markAsUnread(ContactMessage $contactMessage)
    {
        $contactMessage->is_read = false;
        $contactMessage->save();
        return redirect()->back()->with('success', 'Mesaj oxunmamış kimi qeyd edildi!');
    }
}
