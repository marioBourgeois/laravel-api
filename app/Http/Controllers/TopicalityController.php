<?php

namespace App\Http\Controllers;

use App\Models\Topicality;
use App\Htp\Resources\Topicality as ResourcesTopicality;
use Illuminate\Http\Request;


class TopicalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return Topicality::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if (Topicality::create($request->all())) {
            return response()->json([
                'success' => 'Actualité créer avec succès'
            ], 200);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    public function show(Topicality $topicality)
    {
        return new ResourcesTopicality($topicality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topicality $topicality)
    {
        

        if ($topicality -> update ($request -> all())) {
            return response()->json([
                'success' => 'Actualité modifié avec succès'
            ], 200);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topicality  $topicality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topicality $topicality)
    {
       
        if ( $topicality -> delete ()) {
            return response()->json([
                'success' => 'Actualité suprimé avec succès'
            ], 200);
       }
    }
}
