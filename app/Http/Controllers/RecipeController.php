<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
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

    public function show(string $id): View
    {
        $viewData = [];
        $recipe = Recipe::findOrFail($id);
        $viewData['recipe'] = $recipe;

        return view('recipe.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];

        return view('recipe.create')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        $deletionMessage = 'Element deleted succesfully';

        return redirect()->route('recipe.index')->with('message', $deletionMessage);
    }

    public function save(Request $request): RedirectResponse
    {
        Recipe::validate($request);

        Recipe::create($request->only(['name', 'ingredients', 'description', 'image']));
        $successMessage = 'Element created succesfully';

        return redirect()->route('recipe.create')->with('message', $successMessage);
    }
}
