<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Родительские профессии</h1>
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
            <div class="card">
                    <div class="card-header">
                        <a wire:click="add" class="btn btn-success">Добавить</a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0" height="1000px">
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                            <th>Изменить</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($professions as $profession)
                            <tr>
                                <td>{{ $profession->id }}</td>
                                <td>{{ $profession->title }}</td>
                                <td><a wire:click="edit({{ $profession->id }})" href="#" class="btn btn-primary">Изменить</a></td>
                                <td><a wire:click="destroy({{ $profession->id }})" href="#" class="btn btn-danger">Удалить</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
          </div>
          <!-- /.row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
</div>
