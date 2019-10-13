<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
    public function index()
    {
      if (isset($_GET['orderBy'])) {
          switch ($_GET['orderBy']) {
              case 'bestSelling':
                  $products= Product::orderBy('rating', 'DESC')->get();
                  break;
              case 'latest':
                  $products=Product::orderBy('created_at','ASC')->get();
                  break;
              case 'cheapest':
                  $products=Product::orderBy('price','ASC')->get();
                  break;
              case 'mostExpensive':
                  $products=Product::orderBy('price','DESC')->get();
                  break;
              case 'name-asc':
                  $products=Product::orderBy('name','ASC')->get();
                  break;
              case 'name-desc':
                  $products=Product::orderBy('name','DESC')->get();
                  break;
          }

      } else {
         $products = Product::all();
      }
         return view('product.index', compact($products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = Category::all();
        $product= new Product();
        $product->price = $request['price'];
        $product->name = $request['name'];
        $product->stock = $request['stock'];
        $product->description = $request['description'];
        $product->rating = $request['rating'];
        $image = $request->file('image');
        $finalImage = uniqid("img_") . "." . $image->extension();
        $saveImage = $image->storeAs('/public/products',$finalImage);
        $product->image= $finalImage;
        $product->save();
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request['name']!== null ? $request['name'] : $product['name'];
        $product->price = $request['price']!== null ? $request['price'] : $product['price'];
        $product->stock = $request['stock']!== null ? $request['stock'] : $product['stock'];
        $product->description = $request['description']!== null ? $request['description'] : $product['description'];
        $product->rating = $request['rating']!== null ? $request['rating'] : $product['rating'];
        if($request->file('image')!==null){
        $image = $request->file('image');
        $finalImage = uniqid("img_") . "." . $image->extension();
        $saveImage = $image->storeAs($finalImage, '/public/products');
        $product->image= $finalImage;
        }
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
