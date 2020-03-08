<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

/**
 * Class ContactUsController
 * @package App\Http\Controllers
 */
class ContactUsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactUs()
    {
        return view('contact');
    }

    /**
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContactRequest $request)
    {
        ContactUs::create($request->all());

        return redirect()
            ->back()
            ->with('success', 'Thanks for contacting us!');
    }
}
