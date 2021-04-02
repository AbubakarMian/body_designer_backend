<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training_plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class TrainingPlanController extends Controller

{
    public function index(){

        $training_plan = Training_plan::withTrashed()->paginate(10);
        
        return view('admin.training_plan.index', compact('training_plan'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $training_plan = new Training_plan();
           

          return view(
                'admin.training_plan.create',
                compact('control','training_plan')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $training_plan = new Training_plan();
         
          $this->add_or_update($request, $training_plan);
            
           return redirect('admin/training_plan');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $training_plan = Training_plan::withTrashed()->find($id);
           
             
             return view('admin.training_plan.create', compact(
                 'control',
                 'training_plan'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $training_plan = Training_plan::withTrashed()->find($id);
                $this->add_or_update($request, $training_plan);
                return Redirect('admin/training_plan');
            }
        
        
            public function add_or_update(Request $request, $training_plan)
            {
               
                $training_plan->name = $request->name;
                $training_plan->duration = $request->duration;
             
              
               
                $training_plan->save();
        
                return redirect()->back();
            }
        
            public function destroy_undestroy($id)
            {
                $training_plan = Training_plan::find($id);
                if ($training_plan) {
                    Training_plan::destroy($id);
                    $new_value = 'Activate';
                } else {
                    Training_plan::withTrashed()->find($id)->restore();
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


