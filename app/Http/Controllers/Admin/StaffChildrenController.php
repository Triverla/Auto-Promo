<?php
/**
 * Created by PhpStorm.
 * User: Cranium
 * Date: 11/15/2018
 * Time: 8:31 AM
 */

namespace App\Http\Controllers\Admin;

use App\StaffChildren;
use Illuminate\Http\Request;

class StaffChildrenController
{
public function create(Request $request){
    $this->validate($request, [
        'staff_id' => 'required|unique:staff_children',
        'child_name' => 'required',
        'position' => 'required',
        'age' => 'required'
        ]);
    if($request->ajax())
    {
        return response(StaffChildren::create($request->all()));
    }
}
}