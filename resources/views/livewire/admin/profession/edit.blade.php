<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Изменить Профессию</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
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
                <form wire:submit="update" method="POST">
                    <div class="form-group">
                        <input wire:model="form.title" type="text" name="title" placeholder="Наименование" class="form-control" required>
                        @error('form.title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select wire:model="form.parent_profession_id" data-placeholder="Выберети теги" class="form-control select2" style="width: 100%;">
                          <option>Выберете профессию</option>
                          @foreach ($parentProfessions as $profession)
                            <option value="{{ $profession->id }}">{{ $profession->title }}</option>
                          @endforeach
                        </select>
                        @error('form.parent_profession_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Обновить</button>
                    </div>
                </form>             
            </div>

          </div>
          <!-- /.row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
</div>
