<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Department;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index() {
        //Route = /members/
        //$members = Members::all();        //Get all Members Record From database
        //$members = Members::orderBy('created_at', 'desc')->get();

        //To make a pagination
        //with(relation name) - to avoid lazy loading (para sabay na i fetch ang mga data)
        $members = Member::with('department')->orderBy('created_at', 'desc')->paginate(10);

        return view('members.index',  ["members" => $members]);
    }

    public function show(Member $member) {
        $member->load('department');
        
        return view('members.show',  ["member" => $member]);
    }

    
    public function create() {
        $departments = Department::all();

        return view('members.create', ["departments" => $departments]);
    }

    
    public function store(Request $request) {
        //Validated all the input fields
        //Gawin same ang table column name at input field name para magamit ang paraan na ito
        $validated = $request->validate([
            'name' => 'required|string|max:25',
            'age' => 'required|integer|min:0|max:100',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:100',
            'department_id' => 'required|exists:departments,id'
        ]);

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Member Created!');
    }

    public function destroy(Member $member){
        $member->delete();

        // with() - to make a success flashcard
        return redirect(route('members.index'))->with('success', 'Member Deleted!');;
    }
}
