<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $faqs = [
            (object) ['question' => 'What payment methods do you accept?', 'answer' => 'We accept all major debit and credit cards (Visa, Mastercard, American Express), PayPal, Apple Pay, Google Pay, Klarna, and ClearPay. All payments are processed securely.'],
            (object) ['question' => 'How long does delivery take?', 'answer' => 'We offer next-day delivery across mainland UK for orders placed before 3:30 PM Monday to Thursday. Standard delivery is 2-3 working days. We also offer Saturday delivery on request.'],
            (object) ['question' => 'Can I return a part if it doesn\'t fit?', 'answer' => 'Yes. If a part is unsuitable, you can return it within 30 days in its original packaging for a full refund or exchange. Please contact our support team to arrange the return.'],
            (object) ['question' => 'Do you offer a warranty on parts?', 'answer' => 'Absolutely. Every part we sell comes with a minimum 12-month manufacturer-backed warranty. Premium and OE parts carry up to 24 months warranty.'],
            (object) ['question' => 'How do I find the right part for my vehicle?', 'answer' => 'Use our search bar to enter your registration number or filter by make, model, and year. You can also email our technical team at support@auto-part-uk.service-etranger.fr for expert assistance.'],
        ];

        return view('pages.contact', compact('faqs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Send email or store inquiry...

        return back()->with('success', 'Thank you for your message. Our team will get back to you within 24 hours.');
    }
}
