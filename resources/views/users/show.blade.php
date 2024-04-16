@vite('resources/sass/show.scss')
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подробности Пользователя</title>
</head>

<body>
    <h1 class="t" style="margin-bottom:-50px;">Подробности Пользователя</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="user-info">
                    <p><strong>Имя: </strong>{{ $user->name }}</p>
                    <p><strong>Электронная почта:</strong> {{ $user->email }}</p>
                    <p><strong>Телефон:</strong> {{ $user->phone }}</p>
                    <p><strong>Пароль:</strong> {{ $user->password }}</p>
                    <p><strong>Роль:</strong> {{ $user->role }}</p>
                    <p><strong>Аватар:</strong> <img style="max-width: auto; max-height:250;"
                            src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" class="user-avatar"></p>
                    <div class="btn-group">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Назад</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
