<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;

class SearchController extends Controller
{
    /**
     * Search for specific student or school
     * 
     * @return results
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:191'
        ]);
        // gets the search name from user input
        $name = $request->input('name');
        // searches students
        $st = (new Search())->search_student($name);
        // searches schools
        $sc = (new Search())->search_school($name);

        if (empty($st) && empty($sc)) {
            return redirect('/dashboard')->with('error_message', 'no results are found');
        }

        if (!empty($st)) {
            return view('pages.search.student_results')->with('st', $st);
        }

        if (!empty($sc)) {
            return view('pages.search.school_results')->with('sc', $sc);
        }

    }
}
