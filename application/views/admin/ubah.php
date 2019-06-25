        <!-- Begin Page Content -->
        <div class="container-fluid">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Ubah Data Praktikan</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('admin/ubah/'.$praktikan['id']); ?>">
              <input type="hidden" name="id" value="<?= $praktikan['id']; ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= $praktikan['nama']; ?>">
                </div>
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nim" id="nim" placeholder="NIM" value="<?= $praktikan['nim']; ?>">
                </div>
                <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Ubah
                </button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

