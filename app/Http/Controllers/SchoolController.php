<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use DB;

class SchoolController extends Controller
{

        /**
         * Display a listing of the resource.
         */
        public function index()
        {

                $schools = DB::table('schools')->orderBy('created_at', 'desc')->paginate(50);
                return view('pages.school.school')->with('schools', $schools);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
                return view('pages.school.add_school');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
                $this->validate($request, [
                        'name' => 'required|min:3|max:191|unique:schools',
                        'location' => 'required|min:3|max:191'
                ]);

                $name = $request->input('name');
                $location = $request->input('location');
                $created_at = now();
                $updated_at = now();

                \DB::table('schools')->insert([
                        'name' => $name,
                        'location' => $location,
                        'created_at' => $created_at,
                        'updated_at' => $updated_at
                ]);

                return redirect('/schools')->with('success_message', 'school was created successfully');
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
                $st = DB::table('schools')
                        ->where('id', '=', $id)
                        ->get();
                return view('pages.school.show_school')->with('st', $st);
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
                $st = DB::table('schools')
                        ->where('id', '=', $id)
                        ->get();
                return view('pages.school.edit_school')->with('st', $st);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
                $this->validate($request, [
                        'name' => 'required|min:3|max:191',
                        'location' => 'required|min:3|max:191'
                ]);

                $name = $request->input('name');
                $location = $request->input('location');
                $created_at = now();
                $updated_at = now();

                \DB::table('schools')
                        ->where('id', '=', $id)
                        ->update([
                                'name' => $name,
                                'location' => $location,

                        ]);
                return redirect('/schools')->with('success_message', 'data was updated successfully');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
                \DB::table('schools')->where('id', '=', $id)->delete();
                return redirect('/schools')->with('success_message', 'schools was successfully deleted');
        }


}
