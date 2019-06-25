        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Pengaturan Akun</h1>
                    </div>
                    <form class="user" method="post" action="<?= base_url('user/edit'); ?>">
                        <div class="form-group row">
                        <div class="col-sm mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password Lama">
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Password Baru">
                        </div>
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Ulangi Password Baru">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                        Edit Akun
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

