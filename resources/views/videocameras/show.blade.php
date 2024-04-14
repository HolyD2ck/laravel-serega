@vite('resources/sass/show.scss')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подробности</title>
</head>

<body>
    <h1 class="t">Подробности Видеокамеры</h1>
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="camera-info">
                    <p><strong>Модель: </strong>{{ $videocameras->Модель }}</p>
                    <p><strong>Производитель:</strong> {{ $videocameras->Производитель }}</p>
                    <p><strong>Дата Выпуска:</strong> {{ $videocameras->Дата_Выпуска }}</p>
                    <p><strong>Цена:</strong> {{ $videocameras->Цена }} ₽</p>
                    <p><strong>Описание:</strong> {{ $videocameras->Описание }}</p>
                    <p><strong>Разрешение:</strong> {{ $videocameras->Разрешение }}</p>
                    <p><img src="https://www.svgrepo.com/show/61290/wifi-logo.svg" alt="Wi-Fi" class="feature-icon">
                        <strong>Поддержка Wi-Fi: </strong>
                        {{ $videocameras->Wi_Fi_поддержка ? 'Да' : 'Нет' }}
                    </p>
                    <p><img src="https://cdn-icons-png.flaticon.com/512/660/660354.png" alt="Bluetooth"
                            class="feature-icon">

                        <strong>Поддержка Bluetooth: </strong> {{ $videocameras->Bluetooth_поддержка ? 'Да' : 'Нет' }}
                    </p>
                    <div class="btn-group">
                        <a href="{{ route('videocameras.index') }}" class="btn btn-secondary">Назад</a>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset($videocameras->Фото) }}" alt="{{ $videocameras->Модель }}" class="camera-image">
            </div>

        </div>
    </div>
</body>

</html>
