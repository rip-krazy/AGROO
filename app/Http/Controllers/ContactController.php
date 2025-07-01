<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:2000',
        ]);

        // Simpan ke database
        $message = ContactMessage::create($validated);

        // Kirim email
        Mail::to('info@agrowisatagm.com')->send(new ContactFormMail($message));

        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.'
        ]);
    }
}