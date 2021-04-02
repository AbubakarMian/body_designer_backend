<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity_level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class Activity_LevelController extends Controller
{
    public function index(){

        $activity_level = Activity_level::withTrashed()->paginate(10);
        
        return view('admin.activity_level.index', compact('activity_level'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $activity_level = new Activity_level();
           

          return view(
                'admin.activity_level.create',
                compact('control','activity_level')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $activity_level = new Activity_level();
         
          $this->add_or_update($request, $activity_level);
            
           return redirect('admin/activity_level');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $activity_level = Activity_level::withTrashed()->find($id);
           
             
             return view('admin.activity_level.create', compact(
                 'control',
                 'activity_level'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $activity_level = Activity_level::withTrashed()->find($id);
                $this->add_or_update($request, $activity_level);
                return Redirect('admin/activity_level');
            }
        
        
            public function add_or_update(Request $request, $activity_level)
            {
               
                $activity_level->name = $request->name;
                $activity_level->detail = $request->detail;
             
                if ($request->hasFile('image')) {
                    $image = $request->image;
                    $root = $request->root();
                    $activity_level->avatar = $this->move_img_get_path($image, $root, 'image');
                } else if (strcmp($request->avatar_visible, "")  !== 0) {
                    $activity_level->avatar = $request->avatar_visible;
                }
               
                $activity_level->save();
        
                return redirect()->back();
            }
        
            public function destroy_undestroy($id)
            {
                $activity_level = Activity_level::find($id);
                if ($activity_level) {
                    Activity_level::destroy($id);
                    $new_value = 'Activate';
                } else {
                    Activity_level::withTrashed()->find($id)->restore();
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
