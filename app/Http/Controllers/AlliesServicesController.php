<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AlliesServicesController extends Controller
{
    public function index(): View
    {
        $url = 'http://34.226.108.75/api/recipe';

        try {
            $response = Http::get($url);

            if (! $response->successful()) {
                abort(500, __('messages.serviceError'));
            }

            $payload = $response->json();
            $products = $payload['data'] ?? $payload;
            $additionalData = $payload['additionalData'];

            if (! is_array($products)) {
                abort(500, __('messsages.dataFormatError'));
            }

            $viewData['products'] = $products;
            $viewData['additionalData'] = $additionalData;

            return view('allies.index')->with('viewData', $viewData);

        } catch (\Exception $e) {
            abort(500, __('messages.unableConnect').$e->getMessage());
        }
    }
}
