@vite('resources/sass/create.scss');
<h1 class="t">Изменить Пользователя</h1>
<h4>Пользователь</h4>
<hr />
<div class="row">
    <div class="col-md-4">
        <button class="btn btn-secondary l" style="max-width:200px">
            <a href="/users/" style="color: inherit; text-decoration: none;">Вернуться Назад</a>
        </button>
        <form method="POST" enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Имя" class="control-label">Имя</label>
                <input id="Имя" name="name" value="{{ $user->name }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="email" class="control-label">Почта</label>
                <input id="email" type="email" name="email" value="{{ $user->email }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="phone" class="control-label">Телефон</label>
                <input id="phone" type="tel" name="phone" value="{{ $user->phone }}" class="form-control" />
            </div>
            <div class="form-group">
                <label for="avatar" class="control-label">Аватар</label>
                <img src="{{ $user->avatar }}" alt="" class="db control-label bu" id="file-preview">
                <input id="avatar" type="file" name="avatar" class="form-control" accept="image/*"
                    onchange="showFile(event)" />
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Пароль</label>
                <input id="password" type="password" name="password" class="form-control"
                    value="{{ $user->password }}" />
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="control-label">Подтвердите пароль</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                    value="{{ $user->password }}" />
            </div>
            <div class="form-group">
                <label for="role" class="control-label">Роль</label>
                <input id="role" name="role" value="{{ $user->role }}" class="form-control" />
            </div>
            <br>
            <div class="form-group">
                <input type="submit" value="Изменить" class="btn btn-primary" />
            </div>
        </form>
        <script>
            function showFile(event) {
                var input = event.target
                var reader = new FileReader();
                reader.onload = function() {
                    var dataURL = reader.result;
                    var output = document.getElementById('file-preview');
                    output.src = dataURL;
                };
                reader.readAsDataURL(input.files[0]);
            }
        </script>
    </div>
</div>
