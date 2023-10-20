<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\PDF;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('seller_id', auth()->user()->id)
            ->latest() // Ordena de manera DESC por el campo "created_at"
            ->get(); // Convierte los datos extraidos de la BD en un Array
        // Retornamos una vista y enviamos la variable "productos"
        return view('panel.seller.product_list.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Creamos un Producto nuevo para cargarle datos
        $product = new Product();

        // Recuperamos todas las categorias de la BD
        $categories = Category::get(); // Recordar importar el modelo Categoria!!
        // Retornamos la vista de creacion de productos, enviamos el producto y las categorias
        return view('panel.seller.product_list.create', compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category_id');
        $product->seller_id = auth()->user()->id;
        if ($request->hasFile('image')) {
        // Subida de image al servidor (public > storage)
        $image_url = $request->file('image')->store('public/product');
        $product->image = asset(str_replace('public', 'storage', $image_url));
        } else {
        $product->image = '';
        }
        if (!$request->active){
            $product->active = 0;
            dd('El producto NO ESTA activo');
        }
        else{
            if ($request->get('active') == 'on'){
                $product->active = 1;
                dd('El producto ESTA activo');
            }
            else {
                $product->active = 0;
                dd('El producto NO ESTA activo');
            }
            
        }
        // Almacena la info del product en la BD
        $product->save();
        return redirect()
        ->route('product.index')
->with('alert', 'Producto "' . $product->name . '" agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('panel.seller.product_list.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('panel.seller.product_list.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category_id');
        if ($request->hasFile('image')) {
        // Subida de la image nueva al servidor
        $image_url = $request->file('image')->store('public/product');
        $product->image = asset(str_replace('public', 'storage', $image_url));
        }
        if ($request->active == 'on'){
            $product->active = 1;
        }
        else {
            $product->active = 0;
        }

        // Actualiza la info del product en la BD
        $product->update();
        return redirect()
        ->route('product.index')
        ->with('alert', 'Producto "' .$product->name. '" actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // $product->delete();
        $product->active = False;
        $product->save();
        return redirect()
        ->route('product.index')
        ->with('alert', 'Producto eliminado exitosamente.');
    }

    /**
     * Generate PDF file, wich contains all products of the Data Base
     */
    public function generatePDF(Product $product){
        $products = Product::get();

        $data = [
            'title' => 'Productos de la Base de Datos',
            'date' => date('d/m/Y'),
            'content' => $products
        ];

        $pdf = PDF::loadView('panel.seller.product_list.productsPDF', $data);

        return $pdf->download('lista de productos.pdf');

    }

    public function exportExcel(){
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
}
