<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Areas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class AreasController extends Controller
{
    public function index(){

        $areas = Areas::withTrashed()->paginate(10);
        
        return view('admin.areas.index', compact('areas'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $areas = new Areas();
           

          return view(
                'admin.areas.create',
                compact('control','areas')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $areas = new Areas();
         
          $this->add_or_update($request, $areas);
            
           return redirect('admin/areas');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $areas = Areas::withTrashed()->find($id);
           
             
             return view('admin.areas.create', compact(
                 'control',
                 'areas'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $areas = Areas::withTrashed()->find($id);
                $this->add_or_update($request, $areas);
                return Redirect('admin/areas');
            }
        
        
            public function add_or_update(Request $request, $areas)
            {
               
                $areas->name = $request->name;
               
             
                if ($request->hasFile('image')) {
                    $image = $request->image;
                    $root = $request->root();
                    $areas->avatar = $this->move_img_get_path($image, $root, 'image');
                } else if (strcmp($request->avatar_visible, "")  !== 0) {
                    $areas->avatar = $request->avatar_visible;
                }
               
                $areas->save();
        
                return redirect()->back();
            }
        
            public function destroy_undestroy($id)
            {
                $areas = Areas::find($id);
                if ($areas) {
                    Areas::destroy($id);
                    $new_value = 'Activate';
                } else {
                    Areas::withTrashed()->find($id)->restore();
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

