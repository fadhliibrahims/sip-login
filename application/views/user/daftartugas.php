<div class="container-fluid">

			 <!-- Page Heading -->
			 <h1 class="h3 mb-5 text-gray-800 text-center">Daftar Tugas</h1>
			 <!-- DataTales Example -->
			 <div class="card shadow mb-4">
				<div class="card-body">
                <?= $this->session->flashdata('message'); ?>
				  <div class="table-responsive">
					 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
						  <tr>
							 <th>Subjek</th>
							 <th>Nama File</th>
						  </tr>
						</thead>
						<tbody>
						</tbody>
					 </table>
				  </div>
				</div>
			 </div>

		  </div>
		  <!-- /.container-fluid -->

		</div>