<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite('resources/sass/table.scss')
<h1 class="t">Список Видеокамер</h1>
@if ($videocameras == null)
    <p><em>Загрузка...</em></p>
@else
    <button class="btn btn-secondary l">
        <a href="/videocameras/create" style="color: inherit; text-decoration: none;">Создать Видеокамеру</a>
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
                <th>Цена</th>
                <th>Фото</th>
                <th>Разрешение</th>
                <th>Wi-Fi поддержка</th>
                <th>Bluetooth поддержка</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videocameras as $videocamera)
                <tr>
                    <td>{{ $videocamera->id }}</td>
                    <td>{{ $videocamera->Модель }}</td>
                    <td>{{ $videocamera->Производитель }}</td>
                    <td>{{ $videocamera->Цена }} ₽</td>
                    <td><img class="db" src="{{ $videocamera->Фото }}"></td>
                    <td>{{ $videocamera->Разрешение }}</td>
                    <td>{{ $videocamera->Wi_Fi_поддержка == 1 ? '✓' : '✕' }}</td>
                    <td>{{ $videocamera->Bluetooth_поддержка == 1 ? '✓' : '✕' }}</td>
                    <td>
                        <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;"
                                href="{{ url("videocameras/{$videocamera->id}/edit") }}">Изменить</a>
                        </button>
                        <br>
                        <br>
                        <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;"
                                href="{{ route('videocameras.show', ['videocamera' => $videocamera]) }}">Подробности</a>
                        </button>
                        <form method="post" action="{{ route('videocameras.destroy', $videocamera->id) }}">
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
        {{ $videocameras->links() }}
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
