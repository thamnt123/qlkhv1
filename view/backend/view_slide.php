<div class="row justify-content-center">
	<div class="col-md-12">
		<!-- card -->
		<div style="margin:15px 0px; ">
			<a href="admin.php?controller=add_edit_slide&act=add" class="btn btn-primary">Add</a>
		</div>
		<div class="card border-primary">
			<div class="card card-header bg-primary text-white" style="padding:7px !important;">Slide show</div>
				<div class="card-body">
				<!-- table -->
				<table class="table table-hover table-bordered">
					<tr>
						<th style="width: 150px;">Ảnh</th>
						<th>Tên ảnh</th>
						<th style="width: 150px;"></th>
					</tr>
				<?php foreach($arr as $rows): ?>
					<tr>
						<td>
						<?php if(file_exists("public/upload/slide/".$rows->c_img)): ?>
							<img src="public/upload/slide/<?php echo $rows->c_img; ?>" style="width: 150px;">
						<?php endif; ?>
						</td>
						<td><?php echo $rows->c_name; ?></td>

						<td style="text-align: center;">
							<a href="admin.php?controller=add_edit_slide&act=edit&id=<?php echo $rows->pk_slide_id; ?>">Edit</a>&nbsp;&nbsp;
							<a onclick="return window.confirm('Are you sure?');" href="admin.php?controller=add_edit_slide&act=delete&id=<?php echo $rows->pk_slide_id; ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
				<!-- end table -->
				</div>
				<div class="card-footer" style="padding:7px !important">
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="#">Trang</a></li>
					<?php for($i=1; $i<=$num_page; $i++): ?>	
						<li class="page-item"><a class="page-link" href="admin.php?controller=slide&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php endfor; ?>
					</ul>
				</div>
			</div>
		</div>
		<!-- end card -->
	</div>
</div>