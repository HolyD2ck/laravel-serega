<?php

namespace App\Http\Controllers;

use App\Models\Cameras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CamerasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cameras = Cameras::paginate(10);
        return view('cameras.index', compact('cameras'));
    }

    /**
     * Validate the request.
     */
    public function valid(Request $request)
    {
        return $request->validate([
            'Модель' => 'required',
            'Производитель' => 'required',
            'Дата_Выпуска' => 'required|date_format:Y-m-d',
            'Цена' => 'required',
            'Описание' => 'required',
            'Фото' => 'sometimes|image',
            'Разрешение' => 'required',
            'Wi_Fi_поддержка' => 'required',
            'Bluetooth_поддержка' => 'required',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cameras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $this->valid($request);

            if ($request->hasFile('Фото')) {
                $file = $request->file('Фото');
                $file_name = '/img/cameras/' . time() . $file->getClientOriginalName();
                $file->move(public_path('img/cameras'), $file_name);
                $validatedData['Фото'] = $file_name;
            }

            $cameras = Cameras::create($validatedData);
            $cameras->save();

            return redirect()->route('cameras.index')->with('success', 'Данные успешно сохранены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при сохранении: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cameras $cameras, $id)
    {
        $cameras = Cameras::find($id);
        return view('cameras.show', compact('cameras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cameras $cameras, $id)
    {
        $cameras = Cameras::find($id);
        return view('cameras.edit', compact('cameras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->valid($request);

            $cameras = Cameras::findOrFail($id);

            if ($request->hasFile('Фото')) {
                $file = $request->file('Фото');
                $file_name = '/img/cameras/' . time() . $file->getClientOriginalName();
                $file->move(public_path('img/cameras'), $file_name);
                $validatedData['Фото'] = $file_name;
            }

            $cameras->update($validatedData);

            return redirect()->back()->with('success', 'Данные успешно обновлены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при обновлении данных: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cameras $cameras, $id)
    {
        try {
            $cameras = Cameras::find($id);

            $cameras->delete();
            if ($cameras->Фото != '/img/user.jpg') {
                unlink($cameras->Фото);
            }
            return redirect()->back()->with('success', 'Данные успешно удалены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при удалении: ' . $e->getMessage()]);
        }
    }
}