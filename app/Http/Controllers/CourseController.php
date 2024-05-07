<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function getData()
    {
        $course = Course::all();
        $data = [
            'status' => 200,
            'user' => $course
        ];
        return response()->json($data, 200);
    }
    public function delete($id)
    {
        $course = Course::find($id);
        $course->delete();
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
                'close time' => 'required',
                'open time' => 'required',
                'content' => 'required',
            ]
        );
        if ($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $course = new Course();

            $course->name = $request->name;
            $course->open = $request->email;
            $course->close = $request->birthday;
            $course->content = $request->address;

            $course->save();

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
                'close time' => 'required',
                'open time' => 'required',
                'content' => 'required',
            ]
        );
        if ($validator->fails()) {
            $data = [
                "status" => 422,
                "message" => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $course = Course::find($id);

            $course->name = $request->name;
            $course->open = $request->email;
            $course->close = $request->birthday;
            $course->content = $request->address;

            $course->save();

            $data = [
                'status' => 200,
                'message' => 'data updated successfully'
            ];

            return response()->json($data, 200);
        }
    }
}
