<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource, and the contact of each client.
     * with pagination, order by and limit
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10);
        $order = $request->query('order', 'id');
        $direction = $request->query('direction', 'asc');
        $clients = Client::with('contacts')->orderBy($order, $direction)->paginate($limit);
        return response()->json([
            'clients' => $clients
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();
        $Client = Client::create($data);
        if (!$Client) {
            return response()->json([
                'message' => 'Error to create the client'
            ], 500);
        }
        return response()->json([
            'message' => 'Client created successfully',
            'Client' => $Client
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $Client)
    {
        return response()->json([
            'Client' => $Client
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function showContacts(Client $Client)
    {
        return response()->json([
            'Client' => $Client->contacts
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $Client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $Client)
    {
        //
    }
}
