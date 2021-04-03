<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;

class PlanController extends Controller
{
    public function index(){

        $plan = Plan::withTrashed()->paginate(10);
        
        return view('admin.plan.index', compact('plan'));
        
            }
        
        
        public function create(){
        
            $control = 'create';
            $plan = new Plan();
           

          return view(
                'admin.plan.create',
                compact('control','plan')
            );
            
                }
        
        
         public function save(Request $request)
        
          {
           $plan = new Plan();
         
          $this->add_or_update($request, $plan);
            
           return redirect('admin/plan');
        
         }
        
         public function edit($id)
         {
             $control = 'edit';
             $plan = Plan::withTrashed()->find($id);
           
             
             return view('admin.plan.create', compact(
                 'control',
                 'plan'
                
                
             ));
         }
        
        
         public function update(Request $request, $id)
            {
        
                $plan = Plan::withTrashed()->find($id);
                $this->add_or_update($request, $plan);
                return Redirect('admin/plan');
            }
        
        
            public function add_or_update(Request $request, $plan)
            {
               
                $plan->name = $request->name;
                $plan->weeks = $request->weeks;
             
               
               
                $plan->save();
        
                return redirect()->back();
            }
        
            public function destroy_undestroy($id)
            {
                $plan = Plan::find($id);
                if ($plan) {
                    Plan::destroy($id);
                    $new_value = 'Activate';
                } else {
                    Plan::withTrashed()->find($id)->restore();
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


