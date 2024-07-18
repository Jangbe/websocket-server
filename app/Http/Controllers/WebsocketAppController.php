<?php

namespace App\Http\Controllers;

use App\Models\WebsocketApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class WebsocketAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websocketApps = WebsocketApp::orderBy('name', 'asc')->get();
        return view('websocket-apps.index', compact('websocketApps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('websocket-apps.form', [
            'action' => route('websocket-apps.store'),
            'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'key' => 'required|unique:websocket_apps,key',
            'secret' => 'required|unique:websocket_apps,secret'
        ]);
        WebsocketApp::create($validate);
        Artisan::call('websockets:restart');
        return to_route('websocket-apps.index')->withSuccess('App created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WebsocketApp $websocketApp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebsocketApp $websocketApp)
    {
        return view('websocket-apps.form', [
            'action' => route('websocket-apps.update', $websocketApp),
            'method' => 'PUT',
            'data' => $websocketApp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebsocketApp $websocketApp)
    {
        $validate = $request->validate([
            'name' => 'required',
            'key' => 'required|unique:websocket_apps,key,' . $websocketApp->id,
            'secret' => 'required|unique:websocket_apps,secret,' . $websocketApp->id
        ]);
        $websocketApp->update($validate);
        Artisan::call('websockets:restart');
        return to_route('websocket-apps.index')->withSuccess('App updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebsocketApp $websocketApp)
    {
        $websocketApp->delete();
        Artisan::call('websockets:restart');
        return to_route('websocket-apps.index')->withSuccess('App deleted successfully!');
    }
}
