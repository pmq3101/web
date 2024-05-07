<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class UserController extends Controller
{
    public function getData()
    {
        $user = User::all();
        $data = [
            'status' => 200,
            'user' => $user
        ];
        return response()->json($data, 200);
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        $data = [
            'status' => 200,
            'message' => 'data deleted successfully'
        ];
        return response()->json($data, 200);
    }

    public function upload(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'birthday' => 'required',
                'address' => 'required',
                'password' => 'required'
            ]
        );
        if ($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->birthday = $request->birthday;
            $user->address = $request->address;
            $user->password = $request->password;

            $user->save();

            $data = [
                'status' => 200,
                'message' => 'data uploaded successfully'
            ];


            return response()->json($data, 200);
        }
    }
    public function editInfo(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'birthday' => 'required',
                'address' => 'required',
            ]
        );
        if ($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->birthday = $request->birthday;
            $user->address = $request->address;

            $user->save();

            $data = [
                'status' => 200,
                'message' => 'data updated successfully'
            ];

            return response()->json($data, 200);
        }
    }
}
