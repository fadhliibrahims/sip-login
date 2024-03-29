        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Upload Tugas</h1>
              </div>
              <?= $this->session->flashdata('message'); ?>
              <?php echo form_open_multipart('user/tugas');?>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="subjek" id="subjek" placeholder="Subjek">
                </div>
                <?= form_error('subjek', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="form-group custom-file mb-3">
                    <input type="file" class="custom-file-input" name="file" id="file">
                    <label class="custom-file-label" for="customFile">Masukkan File</label>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Upload
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

