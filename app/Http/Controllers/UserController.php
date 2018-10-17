<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            print_r($validator);
        }
        die();
        if($request->isMethod('post')) {
            $data = array("name"=>$request->input("fname") . ' ' . $request->input("lname"),
            "email"=>$request->input("email"),
            "password"=>password_hash($request->input("password"), PASSWORD_DEFAULT));  
            $user = new User;
            $user->content = $data;
            try {
                if($user->save()) {
                    return response()->json(["status"=>1]);
                }
            } catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    return response()->json(["status"=>1062]);
                }
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
        if($request->isMethod('post')) {
            if($request->input('email') == "ken@gmail.com" && $request->input('password') == "kencosca329")
                return ['status' => 1];
            else
                return ['status' => 0];
        }
    }
}
