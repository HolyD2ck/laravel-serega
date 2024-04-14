@vite('resources/sass/create.scss')
<h1 class="t">Изменить Видеокамеру</h1>
<hr />
<div class="row">

    <div class="col-md-4">
        <button class="btn btn-secondary l" style="max-width:200px">
            <a href="/videocameras/" style="color: inherit; text-decoration: none;">Вернуться Назад</a>
        </button>
        <form method="POST" enctype="multipart/form-data" action="{{ route('videocameras.update', $videocameras->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Модель" class="control-label">Модель</label>
                <input id="Модель" name="Модель" class="form-control" value="{{ $videocameras->Модель }}">
            </div>
            <div class="form-group">
                <label for="Производитель" class="control-label">Производитель</label>
                <input id="Производитель" name="Производитель" class="form-control"
                    value="{{ $videocameras->Производитель }}">
            </div>
            <div class="form-group">
                <label for="Дата_Выпуска" class="control-label">Дата Выпуска</label>
                <input id="Дата_Выпуска" type="date" name="Дата_Выпуска" class="form-control"
                    value="{{ $videocameras->Дата_Выпуска }}">
            </div>
            <div class="form-group">
                <label for="Цена" class="control-label">Цена</label>
                <input id="Цена" type="number" name="Цена" class="form-control"
                    value="{{ $videocameras->Цена }}" step="0.01">
            </div>
            <div class="form-group">
                <label for="Описание" class="control-label">Описание</label>
                <textarea class="form-control" id="Описание" name="Описание">{{ $videocameras->Описание }}</textarea>
            </div>
            <div class="form-group">
                <label for="Разрешение" class="control-label">Разрешение</label>
                <input id="Разрешение" name="Разрешение" class="form-control" value="{{ $videocameras->Разрешение }}">
            </div>
            <div class="form-group">
                <label for="Wi_Fi_поддержка" class="control-label">Wi-Fi поддержка</label>
                <input id="Wi_Fi_поддержка" name="Wi_Fi_поддержка" class="form-control" type="checkbox" value="1"
                    @if ($videocameras->Wi_Fi_поддержка) checked @endif>
            </div>
            <div class="form-group">
                <label for="Bluetooth_поддержка" class="control-label">Bluetooth поддержка</label>
                <input id="Bluetooth_поддержка" name="Bluetooth_поддержка" class="form-control" type="checkbox"
                    value="1" @if ($videocameras->Bluetooth_поддержка) checked @endif>
            </div>
            <div class="form-group">
                <label for="Фото" class="control-label">Фото</label>
                <img src="{{ $videocameras->Фото }}" alt="" class="db control-label bu" id="file-preview">
                <input id="Фото" type="file" name="Фото" class="form-control" accept="image/*"
                    @if ($videocameras->Фото) value="{{ $videocameras->Фото }}" @endif
                    onchange="showFile(event)" />
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
                preview.src = '{{ $videocameras->Фото }}';
            };
        </script>
    </div>
</div>
