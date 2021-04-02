<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan_equipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class  PlanEquipmentController  extends Controller
{
    public function index(){

        $plan_equipment = Plan_equipment::withTrashed()->paginate(10);
        
        return view('admin.plan_equipment.index', compact('plan_equipment'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $Plan_equipment = new Plan_equipment();
           

          return view(
                'admin.Plan_equipment.create',
                compact('control','Plan_equipment')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $plan_equipment = new Plan_equipment();
         
          $this->add_or_update($request, $plan_equipment);
            
           return redirect('admin/plan_equipment');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $plan_equipment = Plan_equipment::withTrashed()->find($id);
           
             
             return view('admin.plan_equipment.create', compact(
                 'control',
                 'plan_equipment'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $plan_equipment = Plan_equipment::withTrashed()->find($id);
                $this->add_or_update($request, $plan_equipment);
                return Redirect('admin/plan_equipment');
            }
        
        
            public function add_or_update(Request $request, $plan_equipment)
            {
               
         
                $plan_equipment->week_num = $request->weekday_num;
             
         
               
                $plan_equipment->save();
        
                return redirect()->back();
            }
        
            public function destroy_undestroy($id)
            {
                $plan_equipment = Plan_equipment::find($id);
                if ($plan_equipment) {
                    Plan_equipment::destroy($id);
                    $new_value = 'Activate';
                } else {
                    Plan_equipment::withTrashed()->find($id)->restore();
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

