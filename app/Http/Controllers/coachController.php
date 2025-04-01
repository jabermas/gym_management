<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;
use App\Models\coachModel;

class CoachController extends Controller {
    // Display the list of coaches
    public function index() {
        $coaches = coachModel::all();
        return view('coach', compact('coaches'));
    }

    // Store a new coach
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:coaches,email',
            'specialty' => 'required|string|max:255',
        ]);

        coachModel::create($request->all());

        return redirect()->back()->with('success', 'Coach added successfully!');
    }

    // Update coach details
    public function update(Request $request, $id) {
        $coach = coachModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:coaches,email,' . $coach->id,
            'specialty' => 'required|string|max:255',
        ]);

        $coach->update($request->all());

        return redirect()->back()->with('success', 'Coach updated successfully!');
    }

    // Delete a coach
    public function destroy($id) {
        $coach = coachModel::findOrFail($id);
        $coach->delete();

        return redirect()->back()->with('success', 'Coach deleted successfully!');
    }
}
