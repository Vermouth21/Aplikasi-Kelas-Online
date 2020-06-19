<div class="modal fade" id="modal-login" tab-index="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            	<h4 class="modal-title" id="myModalLabel">Login User</h4>
			</div>
			<div class="modal-body">
				<form action="login.php" method="post" role="form">
					<div class="form-group">
						<label class="control-label" for="email">Username</label>
						<input type="text" id="email" placeholder="Username" name="email" class="form-control input-small" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="password">Password</label>
						<input type="password" id="password" placeholder="Password" name="password" class="form-control input-small" />
					</div>


					<div class="form-group">
						<label class="control-label" for="Level">Level</label>
						<select class="form-control input-small" name="level" id="level">
						  <option value="">--Pilih--</option>
            <option value="Guru_Piket">Guru Piket</option>
            <option value="Wali_Kelas">Wali Kelas</option>
            <option value="Siswa">Siswa</option>
            <option value="Guru_BK">Guru BK</option>
            <option value="Kepala_Sekolah">Kepala Sekolah</option>
            
        </select>
					</div>


			</div>
			<div class="modal-footer">
				
				<button type="submit" class="btn btn-primary" name="login">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>