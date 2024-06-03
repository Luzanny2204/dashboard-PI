<?php

namespace App\Http\Controllers\Admin\MenstrualCalendars;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenstrualCalendars\MenstrualcalendarsCreateRequest;
use App\Models\MenstrualCalendar\Menstrualcalendar;
use App\Models\User;
use Illuminate\Http\Request;

class MenstrualcalendarsController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.menstrualcalendars.index')->only('index');
        $this->middleware('can:admin.menstrualcalendars.edit')->only('edit', 'update');
        $this->middleware('can:admin.menstrualcalendars.create')->only('create', 'store');
        $this->middleware('can:admin.menstrualcalendars.destroy')->only('destroy');
    }
 
    public function index()
    {
        $menstrualcalendars = Menstrualcalendar::all();
        return view('admin.menstrualcalendars.index',compact('menstrualcalendars'));
    }


    public function create()
    {
        $users = User::all();
        return view('admin.menstrualcalendars.create',compact('users'));
    }


    public function store(MenstrualcalendarsCreateRequest $request)
    {
        Menstrualcalendar::create($request->all());
        return redirect()->route('admin.menstrualcalendars.index')->with('success', 'Calendario Menstrual criado');
    }


    public function show(Menstrualcalendar $menstrualcalendar)
    {
        return view('admin.menstrualcalendars.show',compact('menstrualcalendar'));
    }

    public function edit(Menstrualcalendar $menstrualcalendar)
    {
        $users = User::all();
        return view('admin.menstrualcalendars.edit',compact('menstrualcalendar','users'));
    }

    public function update(MenstrualcalendarsCreateRequest $request, Menstrualcalendar $menstrualcalendar)
    {
        $menstrualcalendar->update($request->all());
        return redirect()->route('admin.menstrualcalendars.index')->with('edit', 'Calendario Menstrual editado');
    }

    public function destroy(Menstrualcalendar $menstrualcalendar)
    {
        $menstrualcalendar->delete();
        return redirect()->route('admin.menstrualcalendars.index')->with('delete', 'Calendario Menstrual deletado');
    }
}
