<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessories = Accessories::paginate(10);
        return view('accessories.index', compact('accessories'));
    }

    /**
     * Validate the request.
     */
    public function valid(Request $request)
    {
        return $request->validate([
            "Название" => "required",
            "Цена" => "required",
            "Описание" => "required",
            "Фото" => "sometimes|image",
            "Производитель" => "required",
            "Материал" => "required",
            "Цвет" => "required",
            "Страна_Производства" => "required",
            "Гарантия" => "sometimes|boolean|in:0,1",
            "Дата_Выпуска" => "required|date_format:Y-m-d",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accessories.create');
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
                $file_name = '/img/accessories/' . time() . $file->getClientOriginalName();
                $file->move(public_path('img/accessories'), $file_name);
                $validatedData['Фото'] = $file_name;
                $validatedData['Гарантия'] = $validatedData['Гарантия'] ?? 0;
            }

            $accessories = Accessories::create($validatedData);
            $accessories->save();

            return redirect()->route('accessories.index')->with('success', 'Данные успешно сохранены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при сохранении: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Accessories $accessories, $id)
    {
        $accessories = Accessories::find($id);
        return view('accessories.show', compact('accessories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accessories $accessories, $id)
    {
        $accessories = Accessories::find($id);
        return view('accessories.edit', compact('accessories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->valid($request);

            $accessories = Accessories::findOrFail($id);

            $file_name = $accessories->Фото;

            if ($request->hasFile('Фото')) {
                try {
                    if ($accessories->Фото != '/img/user.jpg' && !str_contains($accessories->Фото, '/faker/')) {
                        unlink(public_path($file_name));
                    }
                } catch (\Exception $e) {
                }
                $file_name = '/img/accessories/' . time() . '.' . $request->Фото->getClientOriginalExtension();
                $request->Фото->move(public_path('img/accessories'), $file_name);

            }

            $accessories->update([
                'Название' => $validatedData['Название'],
                'Цена' => $validatedData['Цена'],
                'Описание' => $validatedData['Описание'],
                'Производитель' => $validatedData['Производитель'],
                'Материал' => $validatedData['Материал'],
                'Цвет' => $validatedData['Цвет'],
                'Страна_Производства' => $validatedData['Страна_Производства'],
                'Гарантия' => ($validatedData['Гарантия'] ?? 0) == 1,
                'Фото' => $file_name,
                'Дата_Выпуска' => $validatedData['Дата_Выпуска'],
            ]);

            return redirect()->route('accessories.index')->with('success', 'Данные успешно обновлены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при обновлении данных: ' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accessories $accessories, $id)
    {
        try {
            $accessories = Accessories::find($id);

            $accessories->delete();
            if ($accessories->Фото != '/img/user.jpg' && !str_contains($accessories->Фото, '/faker/')) {
                unlink(public_path($accessories->Фото));
            }
            return redirect()->back()->with('success', 'Данные успешно удалены');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ошибка при удалении: ' . $e->getMessage()]);
        }
    }
    public function shop(Request $request)
    {
        session()->put('shop_url', $request->url());
        $products = Accessories::paginate(6);
        return view('accessories.shop', compact('products'));
    }
}