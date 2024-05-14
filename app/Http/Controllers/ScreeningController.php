<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class ScreeningController extends Controller
{
    public $msg = "Participant %name% is assigned to ";
    public $med = "Cohort B";

    public function screening(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
                'first_name' => 'required|min:3',
                'dob' => 'required|before:-18 years',
                'frequency' => 'required',
                'daily_frequency' => 'required_if:frequency,==,daily'

            ],[
                'first_name.required' => 'Please provide First Name',
                'first_name.min' => 'Invalid First Name',
                'dob.required' => 'Please provide Date of birth',
                'dob.before' => 'You should be above 18 years old',
                'frequency.required' => 'Please let us know how often problem is persisting',
                'daily_frequency.required' => 'Please let us know how often problem is persisting',
            ]
        );
        
        // Assign Cohort
        if (in_array($request->frequency, ['weekly', 'monthly'])) {
            $this->med = "Cohort A";
        }
        $result = str_replace('%name%', $request->first_name, $this->msg) . $this->med;

        // store subject information
        Subject::create([
            'first_name' => $request->first_name,
            'dob' => $request->dob,
            'frequency' => $request->frequency,
            'daily_frequency' => $request->daily_frequency,
            'med' => $this->med
        ]);

        // result is sent back to the same view
        return response()->view('subject_screening', [
            'result' => $result,
        ]);
    }

    public function getAll()
    {
        // Fetch all subjects
        $subjects = Subject::get()->toArray();

        return response()->view('subjects', [
            'subjects' => $subjects,
        ]);
    }
}
