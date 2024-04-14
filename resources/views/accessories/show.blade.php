@vite('resources/sass/show.scss')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подробности</title>
</head>

<body>
    <h1 class="t">Подробности Аксессуара</h1>
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="camera-info">
                    <p><strong>Название: </strong>{{ $accessories->Название }}</p>
                    <p><strong>Производитель:</strong> {{ $accessories->Производитель }}</p>
                    <p><strong>Дата Выпуска:</strong> {{ $accessories->Дата_Выпуска }}</p>
                    <p><strong>Цена:</strong> {{ $accessories->Цена }} ₽</p>
                    <p><strong>Описание:</strong> {{ $accessories->Описание }}</p>
                    <p><strong>Материал:</strong> {{ $accessories->Материал }}</p>
                    <p><strong>Цвет:</strong> {{ $accessories->Цвет }}</p>
                    <p><strong>Страна Производства:</strong> {{ $accessories->Страна_Производства }}</p>
                    <p><strong>Гарантия:</strong> {{ $accessories->Гарантия ? 'Да' : 'Нет' }}</p>
                    <div class="btn-group">
                        <a href="{{ route('accessories.index') }}" class="btn btn-secondary">Назад</a>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset($accessories->Фото) }}" alt="{{ $accessories->Название }}" class="camera-image">
            </div>

        </div>
    </div>
</body>

</html>
