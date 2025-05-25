<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeCollection;
use App\Models\Recipe;
use Illuminate\Http\JsonResponse;

class RecipeApiController extends Controller
{
    public function index(): JsonResponse
    {
        $recipes = new RecipeCollection(Recipe::all());
        return response()->json($recipes, 200);
    }

    public function paginate(): JsonResponse
    {
        $recipes = new RecipeCollection(Recipe::paginate(5));
        return response()->json($recipes, 200);
    }
}

