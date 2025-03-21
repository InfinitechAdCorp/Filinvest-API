<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Uploadable;

use App\Models\Career as Model;

class CareerController extends Controller
{
    use Uploadable;

    public $model = "Career";
    public $relations = [];
    public $directory = "";

    public $rules = [
        'position' => 'required|max:255',
        'category' => 'required|max:255',
        'location' => 'required|max:255',
        'responsibilities' => 'required|array',
        'requirements' => 'required|array',
    ];

    public function getAll()
    {
        $records = Model::with($this->relations)->get();
        $response = ['message' => "Fetched $this->model" . "s", 'records' => $records];
        $code = 200;
        return response()->json($response, $code);
    }

    public function get($id)
    {
        $record = Model::with($this->relations)->where('id', $id)->first();
        if ($record) {
            $response = ['message' => "Fetched $this->model", 'record' => $record];
            $code = 200;
        } else {
            $response = ['message' => "$this->model Not Found"];
            $code = 404;
        }
        return response()->json($response, $code);
    }

    public function create(Request $request)
    {
        $validated = $request->validate($this->rules);

        $keys = ["responsibilities", "requirements"];
        foreach ($keys as $key) {
            $validated[$key] = json_encode($validated[$key]);
        }

        $record = Model::create($validated);

        $response = [
            'message' => "Created $this->model",
            'record' => $record,
        ];
        $code = 201;
        return response()->json($response, $code);
    }

    public function update(Request $request)
    {
        $this->rules['id'] = 'required|exists:careers,id';
        $validated = $request->validate($this->rules);

        $record = Model::find($validated['id']);

        $keys = ["responsibilities", "requirements"];
        foreach ($keys as $key) {
            $validated[$key] = json_encode($validated[$key]);
        }

        $record->update($validated);

        $response = ['message' => "Updated $this->model", 'record' => $record];
        $code = 200;
        return response()->json($response, $code);
    }

    public function delete($id)
    {
        $record = Model::find($id);
        if ($record) {
            $record->delete();
            $response = ['message' => "Deleted $this->model"];
            $code = 200;
        } else {
            $response = ['message' => "$this->model Not Found"];
            $code = 404;
        }
        return response()->json($response, $code);
    }
}
