<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request) {
        print_r($request->input());
        echo json_encode($request->input());
        die();
        if($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:191',
                'fname' => 'required|alpha',
                'lname' => 'required|alpha',
                'confpassword' => 'required|min:6|max:191|same:password'
            ]);
            $names = array('email'=>"Email",
                'password'=>"Password", 
                'fname'=>"First Name", 
                'lname'=>"Last Name", 
                'confpassword'=>"Confirm Password");

            $validator->setAttributeNames($names);

            if ($validator->fails()) return response()->json(["status"=>2,"errors"=>$validator->errors()]);

            $user = new User;
            $user->name = $request->input("fname") . ' ' . $request->input("lname");
            $user->email = $request->input("email");
            $user->password = password_hash($request->input("password"), PASSWORD_DEFAULT);
            $user->status = 1;
            $user->ipaddress = $request->ip();
            
            try {
                if($user->save()) return response()->json(["status"=>1]);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            return ['status' => 0, 'message' => "Wrong Method!"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request) {
        try {
            $user = User::where('email', $request->input("email"))->firstOrFail();
            
            return ["status"=>1, "token"=>$user];
        } catch(ModelNotFoundException $e) {
            return ["status"=>0];
        }
    }
}
