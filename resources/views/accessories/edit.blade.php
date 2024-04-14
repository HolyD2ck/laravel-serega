@vite('resources/sass/create.scss')
<h1 class="t">Изменить Аксессуар</h1>
<hr />
<div class="row">

    <div class="col-md-4">
        <button class="btn btn-secondary l" style="max-width:200px">
            <a href="/accessories/" style="color: inherit; text-decoration: none;">Вернуться Назад</a>
        </button>
        <form method="POST" enctype="multipart/form-data" action="{{ route('accessories.update', $accessories->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Название" class="control-label">Название</label>
                <input id="Название" name="Название" class="form-control" value="{{ $accessories->Название }}">
            </div>
            <div class="form-group">
                <label for="Цена" class="control-label">Цена</label>
                <input id="Цена" type="number" name="Цена" class="form-control"
                    value="{{ $accessories->Цена }}" step="0.01">
            </div>
            <div class="form-group">
                <label for="Описание" class="control-label">Описание</label>
                <textarea class="form-control" id="Описание" name="Описание">{{ $accessories->Описание }}</textarea>
            </div>
            <div class="form-group">
                <label for="Фото" class="control-label">Фото</label>
                <img src="{{ $accessories->Фото }}" alt="" class="db control-label bu" id="file-preview">
                <input id="Фото" type="file" name="Фото" class="form-control" accept="image/*"
                    @if ($accessories->Фото) value="{{ $accessories->Фото }}" @endif
                    onchange="showFile(event)" />
            </div>
            <div class="form-group">
                <label for="Производитель" class="control-label">Производитель</label>
                <input id="Производитель" name="Производитель" class="form-control"
                    value="{{ $accessories->Производитель }}">
            </div>
            <div class="form-group">
                <label for="Материал" class="control-label">Материал</label>
                <input id="Материал" name="Материал" class="form-control" value="{{ $accessories->Материал }}">
            </div>
            <div class="form-group">
                <label for="Цвет" class="control-label">Цвет</label>
                <input id="Цвет" name="Цвет" class="form-control" value="{{ $accessories->Цвет }}">
            </div>
            <div class="form-group">
                <label for="Страна_Производства" class="control-label">Страна Производства</label>
                <input id="Страна_Производства" name="Страна_Производства" class="form-control"
                    value="{{ $accessories->Страна_Производства }}">
            </div>
            <div class="form-group">
                <label for="Гарантия" class="control-label">Гарантия</label>
                <input id="Гарантия" name="Гарантия" class="form-control" type="checkbox" value="1"
                    @if ($accessories->Гарантия) checked @endif>
            </div>
            <div class="form-group">
                <label for="Дата_Выпуска" class="control-label">Дата Выпуска</label>
                <input id="Дата_Выпуска" type="date" name="Дата_Выпуска" class="form-control"
                    value="{{ $accessories->Дата_Выпуска }}">
            </div>
            <br>
            <div class="form-group">
                <input type="submit" value="Изменить" class="btn btn-primary" />
            </div>

        </form>
        <script>
            function showFile(event) {
                var input = event.target;
                var reader = new FileReader();
                reader.onload = function() {
                    var dataURL = reader.result;
                    var output = document.getElementById('file-preview');
                    output.src = dataURL;
                };
                reader.readAsDataURL(input.files[0]);
            }

            window.onload = function() {
                var preview = document.getElementById('file-preview');
                preview.src = '{{ $accessories->Фото }}';
            };
        </script>
    </div>
</div>
