<?php

namespace App\Http\Controllers\Admin\Psicologies;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Psicologies\PsicologiesCreateRequest;
use App\Models\Psicology\Psicology;
use Illuminate\Http\Request;

class PsicologiesController extends Controller
{
    public function store(PsicologiesCreateRequest $request, string $id)
    {
        $nutrition= Psicology::where('user_id', $id)->first();
        if($nutrition ){
            $nutrition->update($request->all());
            return redirect()->route('admin.users.show',$id)->with('success','La descripcion de la Psicología fue editada');
        }else{
            Psicology::create($request->all());
            return redirect()->route('admin.users.show',$id)->with('success','La descripcion de la Psicología fue creada');

        }
    }
}
