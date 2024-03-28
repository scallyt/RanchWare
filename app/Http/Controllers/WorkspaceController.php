<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspaceOnUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

function generateCode()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < 5; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}
class WorkspaceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return view("users.login");
        }

        $user = Auth::user();

        // Munkaterületek, amelyekhez a felhasználó csatlakozott
        $joinedWorkspaces = $user->workspaces;

        // Munkaterületek, amelyeket a felhasználó tulajdonol
        $ownedWorkspaces = Workspace::where('ownerId', $user->id)->get();

        // Az összes munkaterület típus egyesítése
        $workspaces = $joinedWorkspaces->merge($ownedWorkspaces);

        // Az összes munkaterület tulajdonosának nevének beállítása
        foreach ($workspaces as $workspace) {
            if ($workspace->ownerId != $user->id) {
                $owner = User::find($workspace->ownerId);
                $workspace->ownerName = $owner->FirstName;
            } else {
                $workspace->ownerName = $user->FirstName;
            }
        }

        return view("workspaces.index", compact("workspaces"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workspaces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a workspace.');
        }

        $formFields = $request->validate([
            'name' => 'required', 'min:3', 'max:40',
        ]);
        $workspace = new Workspace();
        $workspace->ownerId = Auth::id();
        $workspace->code = generateCode();
        $workspace->name = $formFields['name'];

        $workspace->save();

        return redirect()->route('workspaces.index')->with('success', 'Workspace created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($code)
    {
        $workspace = Workspace::where('code', $code)->first();

        if (!$workspace) {
            abort(404);
        }

        $workspace_code = $code;

        return view('workspaces.show', compact('workspace', 'workspace_code'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }

    public function userJoinToWorkspace(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to join a workspace.');
        }

        $request->validate([
            'code' => 'required',
        ]);

        $workspace = Workspace::where('code', $request->code)->first();

        if (!$workspace) {
            return redirect()->back()->with('error', 'Invalid workspace code.');
        }

        try {
            $user = $request->user();
            $user->workspaces()->sync($workspace->id);
        } catch (Exception $e) {
            return redirect()->route('workspaces.index')->with('error', 'Failed to join the workspace.');
        }

        return redirect()->route('workspaces.index')->with('success', 'You have successfully joined the workspace.');
    }
}
