<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Uploadable;

use App\Models\Article as Model;

class ArticleController extends Controller
{
    use Uploadable;

    public $model = "Article";
    public $relations = [];
    public $directory = "articles";

    public $rules = [
        'name' => 'required|max:255',
        'type' => 'required|max:255',
        'date' => 'required|date',
        'description' => 'required',
        'image' => 'required|file',
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

        $key = 'image';
        if ($request[$key]) {
            $validated[$key] = $this->upload($this->directory, $request[$key]);
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
        $this->rules['id'] = 'required|exists:articles,id';
        $this->rules['image'] = 'nullable|file';
        $validated = $request->validate($this->rules);

        $record = Model::find($validated['id']);

        $key = 'image';
        if ($request[$key]) {
            $validated[$key] = $this->upload($this->directory, $request[$key]);
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
