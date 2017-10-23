<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        //dd($products);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->lists('name', 'id');
        //dd($categories);
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SaveProductRequest $request)
    {
        //$imageName = $data->id . '.' . 
        //$request->file('image')->getClientOriginalExtension();

        $path = '/images/product/';
        $image = time().'.'.$request->file('image')->getClientOriginalExtension();
        $data = [
            'name'          => $request->get('name'),
            'slug'          => str_slug($request->get('name')),
            'description'   => $request->get('description'),
            'extract'       => $request->get('extract'),
            'price'         => $request->get('price'),
            //'image'         => $request->get('image'),
            'image'         => $path.$image,
            'visible'       => $request->has('visible') ? 1 : 0,
            'category_id'   => $request->get('category_id')
        ];

        //dd($data['image'].$request->file('image')->getClientOriginalExtension());

        $product = Product::create($data);

        $message = $product ? 'Producto agregado correctamente!' : 'El producto NO pudo agregarse!';


        //dd($request->file('image'));
        //dd($request->file('image')->getClientOriginalExtension());

        $request->file('image')->move(
            public_path() . $path, $image
            //base_path() . '/public/images/product/', $product->id . '.' . $request->file('image')->getClientOriginalExtension(
        );
      
        return redirect()->route('admin.product.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('id', 'desc')->lists('name', 'id');

        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    //public function update(SaveProductRequest $request, Product $product)
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->slug = str_slug($request->get('name'));
        $product->visible = $request->has('visible') ? 1 : 0;
        
        if ($request->hasFile('image'))
        {
            $path = '/images/product/';
            $image = time().'.'.$request->file('image')->getClientOriginalExtension();
            $product->image = $path.$image;
        }

        $updated = $product->save();
        
        $message = $updated ? 'Producto actualizado correctamente!' : 'El Producto NO pudo actualizarse!';

        if ($request->hasFile('image'))
        {
            $request->file('image')->move(
                public_path() . $path, $image
            );
        }

        return redirect()->route('admin.product.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        $deleted = $product->delete();
        
        $message = $deleted ? 'Producto eliminado correctamente!' : 'El producto NO pudo eliminarse!';
        
        return redirect()->route('admin.product.index')->with('message', $message);
    }
}
