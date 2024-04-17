<?php

namespace App\Http\Controllers;

use App\Models\Videocameras;
use Illuminate\Http\Request;

class VideocamerasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videocameras = Videocameras::paginate(10);
        return view('videocameras.index', compact('videocameras'));
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
            'Wi_Fi_поддержка' => 'sometimes|boolean|in:0,1',
            'Bluetooth_поддержка' => 'sometimes|boolean|in:0,1',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videocameras.create');
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
                $file_name = '/img/videocameras/' . time() . $file->getClientOriginalName();
                $file->move(public_path('img/videocameras'), $file_name);
                $validatedData['Фото'] = $file_name;
                $validatedData['Wi_Fi_поддержка'] = $validatedData['Wi_Fi_поддержка'] ?? 0;
                $validatedData['Bluetooth_поддержка'] = $validatedData['Bluetooth_поддержка'] ?? 0;
            }

            $videocameras = Videocameras::create($validatedData);
            $videocameras->save();

            return redirect()->route('videocameras.index')->with('success', 'Данные успешно сохранены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при сохранении: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Videocameras $videocameras, $id)
    {
        $videocameras = Videocameras::find($id);
        return view('videocameras.show', compact('videocameras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videocameras $videocameras, $id)
    {
        $videocameras = Videocameras::find($id);
        return view('videocameras.edit', compact('videocameras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->valid($request);

            $videocameras = Videocameras::findOrFail($id);

            $file_name = $videocameras->Фото;

            if ($request->hasFile('Фото')) {
                try {
                    if ($videocameras->Фото != '/img/user.jpg' && !str_contains($videocameras->Фото, '/faker/')) {
                        unlink(public_path($file_name));
                    }
                } catch (\Exception $e) {
                }
                $file_name = '/img/videocameras/' . time() . '.' . $request->Фото->getClientOriginalExtension();
                $request->Фото->move(public_path('img/videocameras'), $file_name);

            }

            $videocameras->update([
                'Модель' => $validatedData['Модель'],
                'Производитель' => $validatedData['Производитель'],
                'Дата_Выпуска' => $validatedData['Дата_Выпуска'],
                'Цена' => $validatedData['Цена'],
                'Описание' => $validatedData['Описание'],
                'Разрешение' => $validatedData['Разрешение'],
                'Wi_Fi_поддержка' => ($validatedData['Wi_Fi_поддержка'] ?? 0) == 1,
                'Bluetooth_поддержка' => ($validatedData['Bluetooth_поддержка'] ?? 0) == 1,
                'Фото' => $file_name,
            ]);

            return redirect()->route('videocameras.index')->with('success', 'Данные успешно обновлены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при обновлении данных: ' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videocameras $videocameras, $id)
    {
        try {
            $videocameras = Videocameras::find($id);

            $videocameras->delete();
            if ($videocameras->Фото != '/img/user.jpg' && !str_contains($videocameras->Фото, '/faker/')) {
                unlink(public_path($videocameras->Фото));
            }
            return redirect()->back()->with('success', 'Данные успешно удалены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при удалении: ' . $e->getMessage()]);
        }
    }
    public function shop(Request $request)
    {
        session()->put('shop_url', $request->url());
        $products = Videocameras::paginate(6);
        return view('videocameras.shop', compact('products'));
    }
}