<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Capturar el término de búsqueda si existe
        $search = $request->input('search');

        // Filtrar los clientes según el término de búsqueda
        $clients = Client::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('due', 'like', "%{$search}%")
                ->orWhere('moments', 'like', "%{$search}%");
        })->paginate(5); // Paginación de 5 resultados por página

        // Retornar la vista con los clientes filtrados
        return view('client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'due' => 'required',
            'moments' => 'required'
        ]);

        Client::create($request->only('name', 'due', 'moments'));

        session::flash('mensaje', 'El archivo se guardó correctamente');
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('client.form')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
    
     
        
        $request->validate([
            'name' => 'required',
            'due' => 'required',
            'moments' => 'required'
        ]);
    
        $client->update($request->only('name', 'due', 'moments'));
    
        session::flash('mensaje', 'El archivo se editó correctamente');
        return redirect()->route('client.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        session::flash('mensaje', 'El archivo se eliminó correctamente');
        return redirect()->route('client.index');
    }
}
