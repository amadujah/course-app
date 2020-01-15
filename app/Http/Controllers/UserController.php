<?php

namespace App\Http\Controllers;

use App\Course;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedUser = User::where('id', Auth::user()->getAuthIdentifier())->first();
        if ($loggedUser->isAdmin()) {
            $users = User::all();
            $messagesCount = Message::count();
            return view('admin.users', compact('users', 'messagesCount'));
        } else {
            return view('auth.login');
        }

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $courseNumber = Course::where(['user_id' => $id])->get()->count();
        return view('profile', compact('user', 'courseNumber'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        $user = User::find($id);
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->name = $request->name;
        $user->adresse = $request->adresse;

        $user->save();
        $courseNumber = Course::where(['user_id' => $user->getAuthIdentifier()])->get()->count();
        return view('profile', compact('user', 'courseNumber'))->with('success', 'Profil mis à jour avec succès');

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            try {
                $user->delete();
            } catch (\Exception $e) {

            }
        }
        return redirect('profile');
    }
}
