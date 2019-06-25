<div class="container-fluid">

			 <!-- Page Heading -->
			 <h1 class="h3 mb-5 text-gray-800 text-center">Daftar Praktikan</h1>
			 <!-- DataTales Example -->
			 <div class="card shadow mb-4">
				<div class="card-body">
					<?php if($this->session->flashdata('fd')) : ?>
					<div class="row mt-3 text-center">
							<div class="col-md-6 offset-md-3 alert alert-success">
									<h4><?= $this->session->flashdata('fd'); ?> Data Berhasil</h4>
							</div>
					</div>
					<?php endif; ?>
				  <div class="table-responsive">
					 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
						  <tr>
							 <th>NIM</th>
							 <th>Nama</th>
							 <th>Menu</th>
						  </tr>
						</thead>
						<tbody>
						  <?php foreach($praktikans as $praktikan) : ?>
							 <tr>
								  <td><?php echo $praktikan["nim"]; ?></td>
									<td><?php echo $praktikan["nama"]; ?></td>
								  <td>
										<button class="btn btn-secondary"><a class="text-white" href="<?php base_url(); ?>admin/ubah/<?= $praktikan["id"]; ?>">Ubah</a></button>
										<button class="btn btn-danger"><a class="text-white" href="<?php base_url(); ?>admin/hapus/<?= $praktikan["id"]; ?>" onclick="return confirm('Hapus?');">Hapus</a></button>
								  </td>
							 </tr>
						  <?php endforeach; ?>
						</tbody>
					 </table>
				  </div>
				</div>
			 </div>

		  </div>
		  <!-- /.container-fluid -->

		</div>