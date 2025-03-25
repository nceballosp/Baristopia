<?php

// JJVG

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Interfaces\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['recipes'] = Recipe::all();

        return view('recipe.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];

        return view('recipe.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Recipe::validate($request);

        $storeInterface = app(ImageStorage::class);
        $fileName = $storeInterface->store($request);
        $productData = $request->only(['name', 'price', 'description', 'ingredients']);
        $productData['image'] = $fileName;

        Recipe::create($productData);

        return redirect()->route('recipe.create')->with('success', 'Recipe created successfully');
    }

    public function show(string $id): View
    {
        $viewData = [];
        $recipe = Recipe::findOrFail($id);
        $viewData['recipe'] = $recipe;

        return view('recipe.show')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipe.index')->with('success', 'Recipe created successfully');
    }
}
