<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class PlanVideoController extends Controller

{
    public function index(){

        $product = Product::withTrashed()->paginate(10);
        
        return view('admin.product.index', compact('product'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $product = new Product();
           

          return view(
                'admin.product.create',
                compact('control','product')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $product = new Product();
         
          $this->add_or_update($request, $product);
            
           return redirect('admin/product');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $product = Product::withTrashed()->find($id);
           
             
             return view('admin.product.create', compact(
                 'control',
                 'product'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $product = Product::withTrashed()->find($id);
                $this->add_or_update($request, $product);
                return Redirect('admin/product');
            }
        
        
            public function add_or_update(Request $request, $product)
            {
               
                $product->name = $request->name;
                $product->price = $request->price;
             
                if ($request->hasFile('image')) {
                    $image = $request->image;
                    $root = $request->root();
                    $product->avatar = $this->move_img_get_path($image, $root, 'image');
                } else if (strcmp($request->avatar_visible, "")  !== 0) {
                    $product->avatar = $request->avatar_visible;
                }
               
                $product->save();
        
                return redirect()->back();
            }
        
            public function destroy_undestroy($id)
            {
                $product = Product::find($id);
                if ($product) {
                    Product::destroy($id);
                    $new_value = 'Activate';
                } else {
                    Product::withTrashed()->find($id)->restore();
                    $new_value = 'Deactivate';
                }
                $response = Response::json([
                    "status" => true,
                    'action' => Config::get('constants.ajax_action.update'),
                    'new_value' => $new_value
                ]);
                return $response;
            } 
}


