<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<form id="add-from" >
				<div class="form-row">
					<div class="form-group col-md-12">
						<div class="row">
							<label for="ma_tinhtp" class="col-md-3">Mả Tỉnh TP</label>							
							<input type="text" class="form-control col-md-8" name="ma_tinhtp" id="ma_tinhtp" readonly>
						</div>					
					</div>	
				</div>		
				<div class="form-row">
					<div class="form-group col-md-12">
						<div class="row">
							<label for="ten_tinhtp" class="col-md-3">Tên Tỉnh TP</label>							
							<input type="text" class="form-control col-md-8" name="ten_tinhtp" id="ten_tinhtp" readonly>
						</div>					
					</div>	
				</div>			
			</form>				

		</div>
	</div>
	<div class="row">
		<div class="card-body col-md-7">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Mả Huyện</th>
							<th>Tên Huyện</th>              
							<!-- <th class="text-center">Details</th> -->
							<th class="text-center">Delete</th>
						</tr>
					</thead>
					<tfoot>
						<th>Mả Huyện</th>
						<th>Tên Huyện</th>                 
						<!-- <th class="text-center">Details</th> -->
						<th class="text-center">Delete</th>					
					</tfoot>
					<tbody>              
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-lg-5 mb-4">
			<!-- Illustrations -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Quận-Huyện?</h6>
				</div>
				<div class="card-body">
					<div class="text-center">
						<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="./public/img/HuyenChauThanh.JPG" alt="">
					</div>
					<p>Tóm tắt quận huyện ở đây</p>
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-primary col-md-12 huyen-add">Thêm Huyện</button>
	</div>

</div>