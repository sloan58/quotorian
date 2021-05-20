<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PasswordRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return View
     */
    public function edit()
    {
        try {
            $response = json_decode(Http::get('https://goquotes-api.herokuapp.com/api/v1/random?count=1')->body());
            $randomQuote = [
                'quote' => $response->quotes[0]->text,
                'author' => $response->quotes[0]->author
            ];
        } catch (Exception $e) {
            logger()->error('error getting qod: ' . $e->getMessage());
            $randomQuote = [
                'quote' => '',
                'author' => ''
            ];
        }

        $latestQuotes = auth()->user()->quotes()
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('profile.edit', [
            'randomQuote' => $randomQuote,
            'latestQuotes' => $latestQuotes
        ]);
    }

    /**
     * Update the profile
     *
     * @param ProfileRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        info('request', [
            $request->all()
        ]);
        $request->merge(
            $request->has('profile_is_public') ? ['profile_is_public' => true]: ['profile_is_public' => false]
        );
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param PasswordRequest $request
     * @return RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
