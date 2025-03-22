<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Interfaces\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
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

        return redirect()->route('product.create')->with('success', 'Product created successfully');
    }
}
