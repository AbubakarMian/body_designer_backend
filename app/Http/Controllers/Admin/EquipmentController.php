<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Plan;
use App\Models\Plan_equipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class EquipmentController extends Controller
{
    public function index(){

        $equipment = Equipment::withTrashed()->paginate(10);
        
        return view('admin.equipment.index', compact('equipment'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $equipment = new Equipment();
           

          return view(
                'admin.equipment.create',
                compact('control','equipment')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $equipment = new Equipment();
         
          $this->add_or_update($request, $equipment);
            
           return redirect('admin/equipment');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $equipment = Equipment::withTrashed()->find($id);
           
             
             return view('admin.equipment.create', compact(
                 'control',
                 'equipment'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $equipment = Equipment::withTrashed()->find($id);
                $this->add_or_update($request, $equipment);
                return Redirect('admin/equipment');
            }
        
        
            public function add_or_update(Request $request, $equipment)
            {
               
                $equipment->name = $request->name;
             
             
                if ($request->hasFile('image')) {
                    $image = $request->image;
                    $root = $request->root();
                    $equipment->avatar = $this->move_img_get_path($image, $root, 'image');
                } else if (strcmp($request->avatar_visible, "")  !== 0) {
                    $equipment->avatar = $request->avatar_visible;
                }
               
                $equipment->save();
        
                return redirect()->back();
            }
        
            public function destroy_undestroy($id)
            {
                $equipment = Equipment::find($id);
                if ($equipment) {
                    Equipment::destroy($id);
                    $new_value = 'Activate';
                } else {
                    Equipment::withTrashed()->find($id)->restore();
                    $new_value = 'Deactivate';
                }
                $response = Response::json([
                    "status" => true,
                    'action' => Config::get('constants.ajax_action.update'),
                    'new_value' => $new_value
                ]);
                return $response;
            }
            
            
            public function addequipment($plan_id)
            {
        
                $plan = Plan::find($plan_id);
                $equipment = Equipment::pluck('name', 'id')->toArray();
                //  dd($videos);
                return view('admin.add_equipment.create', compact('plan', 'equipment', 'plan_id'));
            }
        
       
            public function equipmentsave(Request $request, $plan_id)
    {


// dd($request->all());

        $day_nums = $request->day_num;
        $equipment = [];

        foreach ($request->equipment as $key => $equipment) {

            $videos[] = [
                'plan_id' => $plan_id,
                 'week_num' => $day_nums[$key],
            ];
        }

        Plan_equipment::insert($equipment);
    }




}

