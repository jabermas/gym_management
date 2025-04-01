<?php

namespace App\Http\Controllers;

use App\Models\memberModel;
use Illuminate\Http\Request;

class memberController extends Controller
{
    public function index()
    {
        $members = memberModel::all();
        return view('member', compact('members'));
    }

    public function update(Request $request, $id)
    {
        $member = memberModel::findOrFail($id);
        $member->name = $request->input('name');
        $member->date_of_joined = $request->input('date_of_joined');
        $member->plan = $request->input('plan');
        $member->price = $request->input('price');
        $member->save();

        return redirect('/members');
    }

    public function destroy($id)
    {
        $member = memberModel::findOrFail($id);
        $member->delete();

        return redirect('/members');
    }
}
 