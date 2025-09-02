<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductsContrller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::with(['category', 'store'])->paginate(7);

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        return view('dashboard.products.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'status' => 'required|in:active,draft,archived',
            'category_id' => 'required|exists:categories,id',
             'quantity' => 'required|integer|min:0',
        ]);

        $data = $request->all();

        // slug
        $data['slug'] = Str::slug($request->post('name'));

        // store_id (علشان الـ global scope)
        $data['store_id'] = Auth::user()->store_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');
            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('dashboard.products.index')
            ->with('success', 'Product created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
         $categories = Category::all();
        $tags = implode(',', $product->tags()->pluck('name')->toArray());
        return view('dashboard.products.edit', compact('product', 'tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    // نفس الفالديشن بتاع الإنشاء
    $request->validate([
        'name'        => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'status'      => 'required|in:active,draft,archived',
        'category_id' => 'required|exists:categories,id',
        'quantity'    => 'required|integer|min:0',
    ]);

    $data = $request->except('tags');

    // slug
    $data['slug'] = Str::slug($request->post('name'));

    // store_id (ممكن تخليه ثابت زي الـ create لو محتاج)
    $data['store_id'] = Auth::user()->store_id;

    // لو فيه صورة جديدة
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $file->store('uploads', 'public');
        $data['image'] = $path;
    }

    // تحديث المنتج
    $product->update($data);

    // tags
    $tags = explode(',', $request->post('tags', ''));
    $tag_ids = [];

    $saved_tags = Tag::all();
    foreach ($tags as $t_name) {
        $t_name = trim($t_name);
        if ($t_name == '') continue;

        $slug = Str::slug($t_name);
        $tag = $saved_tags->where('slug', $slug)->first();
        if (!$tag) {
            $tag = Tag::create([
                'name' => $t_name,
                'slug' => $slug,
            ]);
        }
        $tag_ids[] = $tag->id;
    }

    $product->tags()->sync($tag_ids);

    return redirect()->route('dashboard.products.index')
        ->with('success', 'Product updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
            ->route('dashboard.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
