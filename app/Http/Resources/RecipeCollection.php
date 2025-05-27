<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'additionalData' => [
                'storeName' => 'Baristopia',
                'storeProductsLink' => 'http://34.226.108.75/product',
            ],
        ];
    }
}
