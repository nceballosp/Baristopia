<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class AlliesServicesController extends Controller
{
    public function index(): View
    {
        $url = 'http://127.0.0.1:8000/api/recipes';

        try {
            $response = Http::get($url);

            if (! $response->successful()) {
                abort(500, 'Error al consumir el servicio externo.');
            }

            echo 'entre';

            $payload = $response->json();
            $products = $payload['data'] ?? $payload;

            if (! is_array($products)) {
                abort(500, 'Formato de datos inválido.');
            }

            $viewData['products'] = $products;

            return view('products.index')->with('viewData', $viewData);

        } catch (\Exception $e) {
            // Manejo de errores de red o formato
            abort(500, 'No se pudo conectar al servicio externo: '.$e->getMessage());
        }
    }
}
