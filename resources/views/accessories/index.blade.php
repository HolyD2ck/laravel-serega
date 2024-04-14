<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite('resources/sass/table.scss')
<h1 class="t">Список Аксессуаров</h1>
@if ($accessories == null)
    <p><em>Загрузка...</em></p>
@else
    <button class="btn btn-secondary l">
        <a href="/accessories/create" style="color: inherit; text-decoration: none;">Создать Аксессуар</a>
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
                <th>Название</th>
                <th>Цена</th>
                <th>Фото</th>
                <th>Материал</th>
                <th>Цвет</th>
                <th>Гарантия</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accessories as $accessory)
                <tr>
                    <td>{{ $accessory->id }}</td>
                    <td>{{ $accessory->Название }}</td>
                    <td>{{ $accessory->Цена }} ₽</td>
                    <td><img class="db" src="{{ $accessory->Фото }}"></td>
                    <td>{{ $accessory->Материал }}</td>
                    <td>{{ $accessory->Цвет }}</td>
                    <td>{{ $accessory->Гарантия == 1 ? '✓' : '✕' }}</td>
                    <td>
                        <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;"
                                href="{{ url("accessories/{$accessory->id}/edit") }}">Изменить</a>
                        </button>
                        <br>
                        <br>
                        <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;"
                                href="{{ route('accessories.show', ['accessory' => $accessory]) }}">Подробности</a>
                        </button>
                        <form method="post" action="{{ route('accessories.destroy', $accessory->id) }}">
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
        {{ $accessories->links() }}
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
