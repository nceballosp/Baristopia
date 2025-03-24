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
        $viewData['title'] = 'Recipes - Online Store';
        $viewData['subtitle'] = 'List of Recipes';
        $viewData['recipes'] = Recipe::all();
        $viewData['message'] = '';

        if (session('message')) {
            $message = session('message');
            $viewData['message'] = $message;
        }

        return view('recipe.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $recipe = Recipe::findOrFail($id);
        $viewData['title'] = $recipe['name'].' - Online Store';
        $viewData['subtitle'] = $recipe['name'].' - Recipe information';
        $viewData['recipe'] = $recipe;

        return view('recipe.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create recipe';

        return view('recipe.create')->with('viewData', $viewData);
    }

    public function delete($id): RedirectResponse
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
