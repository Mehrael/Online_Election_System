<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Member extends Controller
{
    public function registerScreen()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
            "confirmPassword" => "required"
        ]);

        $username = $request->username;
        $password = $request->password;

        $userID = DB::table('users')->insert([
            "username" => $username,
            "password" => $password,
            "type" => 0
        ]);
        $request->session()->put('userID', $userID);
        return redirect('home');
    }

    public function homeScreen()
    {
        return view('member.home');
    }

    public function newElectionScreen()
    {
        $userID = session('userID');

        $elecs = DB::table('elections')
            ->leftJoin('user_votes', function ($join) use ($userID) {
                $join->on('elections.id', '=', 'user_votes.electionID')
                    ->where('user_votes.userID', '=', $userID);
            })
            ->select('elections.*')
            ->where('stillAvailable', '=', 1)
            ->whereNull('user_votes.userID')
            ->get();
        return view('member.newElection', compact('elecs'));
    }

    public function results()
    {
        $res = DB::table('elections')->where('stillAvailable', 0)->get();
        return view('member.results', compact('res'));
    }

    public function voteScreen($id)
    {
        $election = DB::table('votes')
            ->join('elections', 'votes.electionID', '=', 'elections.id')
            ->join('candidates', 'votes.candidateID', '=', 'candidates.id')
            ->where('votes.electionID', '=', $id)
            ->selectRaw('*, elections.topic as election_topic, candidates.name as candidate_name')
            ->get();

        return view('member.vote', compact('election'));
    }

    public function vote(Request $request, $id)
    {
        $electionID = $request->query('electionID');
        $candidateID = $id;
        $userID = session('userID');

        DB::table('user_votes')->insert([
            "electionID" => $electionID,
            "userID" => $userID
        ]);

        DB::table('votes')->where("electionID", "=", $electionID)->where("candidateID", "=", $candidateID)->increment("numOfVotes");

        return redirect("newElection");
    }
}
