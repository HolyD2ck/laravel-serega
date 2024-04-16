<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite('resources/sass/table.scss')
<h1 class="t">Список Пользователей</h1>
@if ($users == null)
    <p><em>Загрузка...</em></p>
@else
    <button class="btn btn-secondary l">
        <a href="/users/create" style="color: inherit; text-decoration: none;">Создать Пользователя</a>
    </button>
    <button class="btn btn-secondary l">
        <a href="/admin" style="color: inherit; text-decoration: none;">Вернуться Назад</a>
    </button>
    <br>
    <br>
    <hr>
    <br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Пароль</th>
                <th>Телефон</th>
                <th>Аватар</th>
                <th>Роль</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>**************************</td>
                    <td>{{ $user->phone }}</td>
                    <td><img style="min-width:150px; min-height:150px;" src="{{ $user->avatar }}"></td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;"
                                href="{{ url("users/{$user->id}/edit") }}">Изменить</a>
                        </button>
                        <br>
                        <br>
                        <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;"
                                href="{{ route('users.show', ['user' => $user]) }}">Подробности</a>
                        </button>
                        <form method="post" action="{{ route('users.destroy', $user->id) }}">
                            <br>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="deleteConfirm(event, this.closest('form'))">
                                <a style="color: inherit; text-decoration: none;">Удалить</a>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-nav">
        {{ $users->links() }}
    </div>
@endif
<script>
    window.deleteConfirm = function(e, form) {
        e.preventDefault();
        Swal.fire({
            title: 'Вы уверены?',
            text: 'Что хотите удалить запись?!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да!',
            cancelButtonText: 'Нет!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
