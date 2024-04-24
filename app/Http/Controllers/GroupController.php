<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\GroupShell;
use Illuminate\Http\Request;
use App\Models\ProductShell;



class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $group = GroupShell::orderBy('id','DESC')->paginate();

        return view('backend.group.index')->with('groups',$group);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        

        return view('backend.group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


$savegruop = GroupShell::create([
    "name_en" => $request->name_en,
    "name_th" => $request->name_th,
    "image" => $request->photo,
    "sequence" => 1,
    "status" => $request->status,
]);

$save= ProductShell::create([
    "product_id" => '[]',
    "group_shell_id" => $savegruop->id
]);



   
        return redirect()->route('group.index')
        ->with('success','Group  created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = GroupShell::find($id);
        return view('backend.group.edit')->with('brand',$group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

   

        $group= GroupShell::find($id);
        $group->name_en = $request->name_en;
        $group->name_th = $request->name_th;
        $group->image = $request->photo;
        $group->status = $request->status;
        $group->save();

        return redirect()->route('group.index')
            ->with('success','Group  Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $order= GroupShell::find($id);
   
            $status=$order->delete();
            return redirect()->route('group.index')
            ->with('success','Group  delete successfully');
    }
}
