<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }

    public function addAdminScreen()
    {
        $show_username = true;
        $show_password = true;
        return view("admin.addAdmin", compact('show_username', 'show_password'));
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
            "confirmPassword" => "required"
        ]);

        $username = $request->username;
        $password = $request->password;

        $show_username = true;
        $show_password = true;
        if (DB::table('users')->where('username', $username)->exists()) {
            $show_username = false;
            return view("admin.addAdmin", compact('show_username', 'show_password'));
        }

        if ($password != $request->confirmPassword) {
            $show_password = false;
            return view("admin.addAdmin", compact('show_username', 'show_password'));
        }

        DB::table('users')->insert([
            "username" => $username,
            "password" => $password,
            "type" => 1
        ]);

        return redirect("viewAdmins");
    }

    public function viewAdmins()
    {
        $admins = DB::table('users')->where('type', '=', 1)->get();
        return view("admin.viewAdmins", compact('admins'));
    }

    public function addCandidateScreen()
    {
        return view('admin.addCandidate');
    }

    public function addCandidate(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $desc = $request->desc;

        $photo = $request->file('photo');
        $img_name = time() . $photo;
        $path = $photo->move('uploads', $img_name);
        $path = '\\' . $path;

        DB::table('candidates')->insert([
            "name" => $name,
            "phone" => $phone,
            "address" => $address,
            "photo" => $path,
            "description" => $desc
        ]);
        return redirect('viewCandidate');
    }

    public function viewCandidate()
    {
        $cans = DB::table('candidates')->get();
        return view('admin.viewCandidate', compact('cans'));
    }

    public function addElectionScreen()
    {
        $numOfCans = DB::table('candidates')->count();
        $cans = DB::table('candidates')->get();
        return view('admin.addNewElection', compact('numOfCans', 'cans'));
    }

    public function addElection(Request $request)
    {
        $topic = $request->topic;
        $numOfCans = $request->myVariable;

        $ElectionID = DB::table('elections')->insertGetId([
            "topic" => $topic,
            "numOfCandidates" => $numOfCans,
            "stillAvailable" => 1,
            "whoWon" => ""
        ]);

        for ($i = 1; $i <= $numOfCans; $i++) {
            $selectedOption = $request->input('select-' . $i);
            if ($selectedOption !== null) {
                DB::table('votes')->insert([
                    "electionID" => $ElectionID,
                    "candidateID" => $selectedOption,
                    "numOfVotes" => 0
                ]);
            }
        }
        return redirect("viewElections");
    }

    public function viewElections()
    {
        $elections = DB::table('elections')->get();
        return view('admin.viewElections', compact('elections'));
    }

    public function viewElection($id)
    {
        $election = DB::table('votes')
            ->join('elections', 'votes.electionID', '=', 'elections.id')
            ->join('candidates', 'votes.candidateID', '=', 'candidates.id')
            ->where('votes.electionID', '=', $id)
            ->selectRaw('*, elections.topic as election_topic, candidates.name as candidate_name')
            ->get();


        return view('admin.viewElection', compact('election'));
    }

    public function endElection($id)
    {
        DB::table('elections')->where('id', $id)->update([
            "stillAvailable" => 0,
        ]);
        return redirect('viewElections');
    }

    public function calcResultScreen()
    {
        $elecs = DB::table('elections')
            ->where('elections.stillAvailable', '=', 0)
            ->selectRaw('*, elections.topic as election_topic')
            ->get();
        return view('admin.CalculateResults', compact('elecs'));
    }

    public function calcResult($id)
    {
        $maxVotes = DB::table('votes')->where('electionID', '=', $id)
            ->max("numOfVotes");

        $can = DB::table('votes')->where('electionID', '=', $id)->where('numOfVotes', '=', $maxVotes)->first();
        $winner = DB::table('candidates')->where('id', $can->candidateID)->first();


        DB::table('elections')->where('id', $id)->update([
            "whoWon" => $winner->name
        ]);

        return redirect("calcResult");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
