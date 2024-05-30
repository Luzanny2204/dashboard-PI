<?php

namespace App\Http\Controllers\Admin\Nutritionists;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Nutritionists\NutritionistsCreateRequest;
use App\Models\Nutritionist\nutritionist;
use Illuminate\Http\Request;

class NutritionistsController extends Controller
{

    public function store(NutritionistsCreateRequest $request, string $id)
    {
        $nutrition= nutritionist::where('user_id', $id)->first();
        if($nutrition ){
            $nutrition->update($request->all());
            return redirect()->route('admin.users.show',$id)->with('success','La descripcion de la Nutricion fue editada');
        }else{
            nutritionist::create($request->all());
            return redirect()->route('admin.users.show',$id)->with('success','La descripcion de la Nutricion fue creada');

        }
    }

}
