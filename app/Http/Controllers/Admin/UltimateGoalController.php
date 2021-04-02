<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ultimate_goal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class UltimateGoalController extends Controller


{
    public function index(){

        $ultimate_goal = Ultimate_goal::withTrashed()->paginate(10);
        
        return view('admin.ultimate_goal.index', compact('ultimate_goal'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $ultimate_goal = new Ultimate_goal();
           

          return view(
                'admin.ultimate_goal.create',
                compact('control','ultimate_goal')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $ultimate_goal = new Ultimate_goal();
         
          $this->add_or_update($request, $ultimate_goal);
            
           return redirect('admin/ultimate_goal');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $ultimate_goal = Ultimate_goal::withTrashed()->find($id);
           
             
             return view('admin.ultimate_goal.create', compact(
                 'control',
                 'ultimate_goal'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $ultimate_goal = Ultimate_goal::withTrashed()->find($id);
                $this->add_or_update($request, $ultimate_goal);
                return Redirect('admin/ultimate_goal');
            }
        
        
            public function add_or_update(Request $request, $ultimate_goal)
            {
               
                $ultimate_goal->goal = $request->goal;
            
             
                if ($request->hasFile('image')) {
                    $image = $request->image;
                    $root = $request->root();
                    $ultimate_goal->avatar = $this->move_img_get_path($image, $root, 'image');
                } else if (strcmp($request->avatar_visible, "")  !== 0) {
                    $ultimate_goal->avatar = $request->avatar_visible;
                }
               
                $ultimate_goal->save();
        
                return redirect()->back();
            }
        
            public function destroy_undestroy($id)
            {
                $ultimate_goal = Ultimate_goal::find($id);
                if ($ultimate_goal) {
                    Ultimate_goal::destroy($id);
                    $new_value = 'Activate';
                } else {
                    Ultimate_goal::withTrashed()->find($id)->restore();
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


