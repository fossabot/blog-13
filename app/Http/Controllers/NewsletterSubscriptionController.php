<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterSubscriptionRequest;
use App\Jobs\UnsubscribeNewsletter;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

/**
 * Class NewsletterSubscriptionController
 * @package App\Http\Controllers
 */
class NewsletterSubscriptionController extends Controller
{
    /**
     * @param NewsletterSubscriptionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsletterSubscriptionRequest $request)
    {
        $newsletterSubscription = NewsletterSubscription::create($request->validated());

        return back()
            ->with('success', __('newsletter.created'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function unsubscribe(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|exists:newsletter_subscriptions,email'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $route = 'login';

            if (\Auth::check()) {
                $route = 'home';
            }

            return redirect()->route($route)->withErrors($errors);
        }

        UnsubscribeNewsletter::dispatch($request->input('email'));

        \Session::flash('success', __('newsletter.unsubscribed'));

        return view('newsletters.unsubscribed');
    }
}
