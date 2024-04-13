<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite('resources/sass/table.scss')
<h1 class="t">Список Фотоаппаратов</h1>
<br />
@if ($cameras == null)
    <p><em>Загрузка...</em></p>
@else
    <button class="btn btn-secondary l">
        <a href="/products/create" style="color: inherit; text-decoration: none;">Создать Фотоаппарат</a>
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
                <th>Модель</th>
                <th>Производитель</th>
                <th>Дата_Выпуска</th>
                <th>Цена</th>
                <th>Описание</th>
                <th>Фото</th>
                <th>Разрешение</th>
                <th>Wi-Fi поддержка</th>
                <th>Bluetooth поддержка</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cameras as $camera)
                <tr>
                    <td>{{ $camera->id }}</td>
                    <td>{{ $camera->Модель }}</td>
                    <td>{{ $camera->Производитель }}</td>
                    <td>{{ $camera->Дата_Выпуска }}</td>
                    <td>{{ $camera->Цена }}</td>
                    <td>{{ $camera->Описание }}</td>
                    <td><img class="db" src="{{ $camera->Фото }}"></td>
                    <td>{{ $camera->Разрешение }}</td>
                    <td>{{ $camera->Wi_Fi_поддержка == 1 ? '✓' : '✕' }}</td>
                    <td>{{ $camera->Bluetooth_поддержка == 1 ? '✓' : '✕' }}</td>
                    <td>
                        <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;"
                                href="{{ url("cameras/{$camera->id}/edit") }}">Изменить</a>
                        </button>
                        <br>
                        <br>
                        <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;"
                                href="{{ url("cameras/{$camera->id}/show") }}">Подробности</a>
                        </button>
                        <form method="post" action="{{ route('cameras.destroy', $camera->id) }}">
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
        {{ $cameras->links() }}
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
