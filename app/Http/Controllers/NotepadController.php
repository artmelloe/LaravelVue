<?php

namespace App\Http\Controllers;

use App\Models\Notepad;
use App\Http\Requests\NotepadStoreRequest;
use App\Http\Requests\NotepadUpdateRequest;
use App\Http\Resources\NotepadResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NotepadController extends Controller
{
    public function index()
    {
        $notepads = Notepad::all();

        return NotepadResource::collection($notepads);
    }

    public function show($param)
    {
        try{
            $notepad = Notepad::find($param);
        }catch(QueryException $e){
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }catch(ModelNotFoundException $e){
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        return new NotepadResource($notepad);
    }

    public function store(NotepadStoreRequest $request)
    {
        try{
            $notepad = Notepad::create($request->all());
        }catch(QueryException $e){
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }catch(ModelNotFoundException $e){
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        return response(new NotepadResource($notepad), Response::HTTP_CREATED);
    }

    public function update(NotepadUpdateRequest $request, $id)
    {
        try{
            $notepad = Notepad::findOrFail($id);

            $notepad->update($request->only('title', 'description'));
        }catch(QueryException $e){
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }catch(ModelNotFoundException $e){
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        return response(new NotepadResource($notepad), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        try{
            Notepad::findOrFail($id)->delete();
        }catch(QueryException $e){
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }catch(ModelNotFoundException $e){
            return new JsonResponse(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
