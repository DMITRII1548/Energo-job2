<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Пользователи</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-12">

                <div class="card-body table-responsive p-0" height="1000px">
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ФИО</th>
                            <th>Номер телефона</th>
                            <th>email</th>
                            <th>Аватар</th>
                            <th>Опыт работы</th>
                            <th>Портфолио</th>
                            <th>Профессии</th>
                            <th>Навыки</th>
                            <th>Статус</th>
                            <th>Удалать</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phonenumber }}</td>
                                <td>{{ $user->email }}</td>
                                @if(isset($user->profile->avatarUrl))
                                    <td><img src="{{ $user->profile->avatarUrl }}" style="width: 100px;"></td>
                                    <td>{{ $user->profile->expirience }}</td>
                                    <td>{{ $user->profile->portfolio }}</td>

                                    <td>
                                        <ul>
                                            @foreach ($user->profile->professions as $profession)
                                                <li>{{ $profession->title }}</li>
                                            @endforeach
                                        <ul>
                                    </td>

                                    <td>
                                        {{ $user->profile->skills }}
                                    </td>

                                    <td>
                                        @if (!$user->profile->is_published)
                                            <button wire:click="changeStatus({{ $user->id }})" class="btn btn-primary">Опубликовать</button>
                                        @else
                                            <button wire:click="changeStatus({{ $user->id }})" class="btn btn-danger">Снять с публикации</button>
                                        @endif
                                    </td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
                                <td><button
                                    wire:click="destroy({{ $user->id }})"
                                    wire:confirm="Подтвердите действие"
                                    class="btn btn-danger">Удалить</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                {{ $users->links() }}
                </div>

                </div>
          </div>
          <!-- /.row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
</div>
