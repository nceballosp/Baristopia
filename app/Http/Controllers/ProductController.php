<?php

// NCP, JJVG, SCL

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['products'] = Product::all();

        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query = '%'.$searchQuery.'%';
            $viewData['products'] = Product::whereLike('name', $query)->get();
        }

        $sortQuery = $request->input('sort');

        if ($sortQuery) {
            $viewData['products'] = Product::orderBy('price', 'desc')->get();
        }

        return view('product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('product.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Product::validate($request);

        $storeInterface = app(ImageStorage::class);
        $fileName = $storeInterface->store($request);
        $productData = $request->only(['name', 'price', 'description', 'stock']);
        $productData['image'] = $fileName;

        Product::create($productData);

        return redirect()->route('product.create')->with('success', __('messages.prodSuccess'));
    }

    public function random(): RedirectResponse
    {
        $product = Product::inRandomOrder()->first();

        if ($product) {
            return redirect()->route('product.show', ['id' => $product->getId()]);
        }

        return redirect()->route('product.index')->with('error', __('messages.noProds'));
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function delete(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        Product::destroy($id);

        return redirect()->route('product.index');
    }
}
