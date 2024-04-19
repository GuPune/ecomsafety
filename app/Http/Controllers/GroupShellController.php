<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupShell;

class GroupShellController extends Controller
{
    //

    public function index()
    {
        $group = GroupShell::orderBy('id','DESC')->paginate();
        return view('backend.groupshell.index')->with('groups',$group);

    }

    public function edit($id)
    {
        $group = GroupShell::find($id);
        return view('backend.groupshell.edit');
    }

}
