<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_areas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class UserAreasController extends Controller



{
    public function index(){

        $user_areas = User_areas::withTrashed()->paginate(10);
        
        return view('admin.user_areas.index', compact('user_areas'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $user_areas = new User_areas();
           

          return view(
                'admin.user_areas.create',
                compact('control','user_areas')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $user_areas = new User_areas();
         
          $this->add_or_update($request, $user_areas);
            
           return redirect('admin/user_areas');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $user_areas = User_areas::withTrashed()->find($id);
           
             
             return view('admin.user_areas.create', compact(
                 'control',
                 'user_areas'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $user_areas = User_areas::withTrashed()->find($id);
                $this->add_or_update($request, $user_areas);
                return Redirect('admin/user_areas');
            }
        
        
            public function add_or_update(Request $request, $user_areas)
            {
               
                $user_areas->user_id = $request->user_id;
                $user_areas->area_id = $request->area_id;
             
                if ($request->hasFile('image')) {
                    $image = $request->image;
                    $root = $request->root();
                    $user_areas->avatar = $this->move_img_get_path($image, $root, 'image');
                } else if (strcmp($request->avatar_visible, "")  !== 0) {
                    $user_areas->avatar = $request->avatar_visible;
                }
               
                $user_areas->save();
        
                return redirect()->back();
            }
        
            public function destroy_undestroy($id)
            {
                $product = User_areas::find($id);
                if ($product) {
                    User_areas::destroy($id);
                    $new_value = 'Activate';
                } else {
                    User_areas::withTrashed()->find($id)->restore();
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


