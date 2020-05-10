<?php
/**
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 *  @author         Nur Wachid
 *  @copyright      Copyright (c) Turahe 2020.
 */

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\ContactUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class ContactUsController
 * @package App\Http\Controllers
 */
final class ContactUsController extends Controller
{
    /**
     * @return View
     */
    public function contactUs(): View
    {
        return view('blog.contact');
    }

    /**
     * Save request from Contact Us Form
     *
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        ContactUs::create($request->all());

        return redirect()
            ->back()
            ->with('success', 'Thanks for contacting us!');
    }
}
