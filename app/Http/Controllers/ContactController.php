<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactAdminMail;
use Illuminate\View\View;


class ContactController extends Controller
{
    public function index(): View
    {
        return view('contact.index');
    }

    public function complete(): View
    {
        return view('contact.complete');
    }

    public function sendMail(ContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Mail::to('admin@example.com')->send(new ContactAdminMail($validated));
        return to_route('contact.complete');
    }
}
