<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::all();
        $equipes = Equipe::all();

        $horsEurope = $equipes->where('continent_id', '!==', 1);
        $Europe = $equipes->where('continent_id', '==', 1);

        $femmeRandom = $joueurs->where("genre", "=", "Femme")->random(5);
        $femmeTeam = $femmeRandom->where('team_id', '!=', null);

        $hommeRandom = $joueurs->where("genre", "=", "Homme")->random(5);
        $hommeTeam = $hommeRandom->where('team_id', '!=', null);

        $noTeam = $joueurs->where('team_id', '=', null);
        if (count($noTeam) > 4) {
            $withTeamRandon = $noTeam->random(4);
        } else {
            $noTeamRandom = $noTeam;
        }

        $withTeam = $joueurs->where('team_id', '!=', null);
        if (count($withTeam) > 4) {
            $withTeamRandom = $withTeam->random(4);
        } else{
            $withTeamRandom = $withTeam;
        }



        return view('welcome', compact('joueurs', 'equipes', 'horsEurope', 'Europe', 'femmeRandom', 'femmeTeam', 'hommeRandom', 'hommeTeam', 'withTeam', 'noTeam', 'withTeamRandom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function show(Welcome $welcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function edit(Welcome $welcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Welcome $welcome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Welcome  $welcome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Welcome $welcome)
    {
        //
    }
}
