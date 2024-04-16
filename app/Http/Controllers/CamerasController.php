<?php

namespace App\Http\Controllers;

use App\Models\Cameras;
use Illuminate\Http\Request;

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
            'Wi_Fi_поддержка' => 'sometimes|boolean|in:0,1',
            'Bluetooth_поддержка' => 'sometimes|boolean|in:0,1',
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
                $validatedData['Wi_Fi_поддержка'] = $validatedData['Wi_Fi_поддержка'] ?? 0;
                $validatedData['Bluetooth_поддержка'] = $validatedData['Bluetooth_поддержка'] ?? 0;
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

            $file_name = $cameras->Фото;

            if ($request->hasFile('Фото')) {
                try {
                    if ($cameras->Фото != '/img/user.jpg' && !str_contains($cameras->Фото, '/faker/')) {
                        unlink(public_path($file_name));
                    }
                } catch (\Exception $e) {
                }
                $file_name = '/img/cameras/' . time() . '.' . $request->Фото->getClientOriginalExtension();
                $request->Фото->move(public_path('img/cameras'), $file_name);

            }

            $cameras->update([
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

            return redirect()->route('cameras.index')->with('success', 'Данные успешно обновлены');
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

            if ($cameras->Фото != '/img/user.jpg' && !str_contains($cameras->Фото, '/faker/')) {
                unlink(public_path($cameras->Фото));
            }
            return redirect()->back()->with('success', 'Данные успешно удалены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при удалении: ' . $e->getMessage()]);
        }
    }

    public function shop(Request $request)
    {
        session()->put('shop_url', $request->url());
        $products = Cameras::paginate(6);
        return view('cameras.shop', compact('products'));
    }
}