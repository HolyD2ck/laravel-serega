@vite('resources/sass/show.scss')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подробности</title>
</head>

<body>
    <h1 class="t">Подробности Фотоаппарата</h1>
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="camera-info">
                    <p><strong>Модель: </strong>{{ $cameras->Модель }}</p>
                    <p><strong>Производитель:</strong> {{ $cameras->Производитель }}</p>
                    <p><strong>Дата Выпуска:</strong> {{ $cameras->Дата_Выпуска }}</p>
                    <p><strong>Цена:</strong> {{ $cameras->Цена }} ₽</p>
                    <p><strong>Описание:</strong> {{ $cameras->Описание }}</p>
                    <p><strong>Разрешение:</strong> {{ $cameras->Разрешение }}</p>
                    <p><img src="https://www.svgrepo.com/show/61290/wifi-logo.svg" alt="Wi-Fi" class="feature-icon">
                        <strong>Поддержка Wi-Fi: </strong>
                        {{ $cameras->Wi_Fi_поддержка ? 'Да' : 'Нет' }}
                    </p>
                    <p><img src="https://cdn-icons-png.flaticon.com/512/660/660354.png" alt="Bluetooth"
                            class="feature-icon">

                        <strong>Поддержка Bluetooth: </strong> {{ $cameras->Bluetooth_поддержка ? 'Да' : 'Нет' }}
                    </p>
                    <div class="btn-group">
                        <a href="{{ route('cameras.index') }}" class="btn btn-secondary">Назад</a>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset($cameras->Фото) }}" alt="{{ $cameras->Модель }}" class="camera-image">
            </div>

        </div>
    </div>
</body>

</html>
