<div id="sales-top-home-page">
	<div class="row">
		<div class="col s12 m12">
            <div class="card-panel">
                <h4 class="card-title blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;"><?= $title ?></h4>
				
				<form action="<?= base_url('PenggunaController/tambah')?>" method="post" autocomplete="off">
                    <div class="row margin">
                    <div class="input-field col s12 m6">
                        <i class="mdi-communication-contacts prefix grey-text text-lighten-1"></i>
                        <input id="nama_lengkap" type="text" class="validate" name="nama_lengkap" required>
                        <label for="nama_lengkap">Nama Lengkap</label>
                    </div>
						<div class="input-field col s12 m6">
							<i class="mdi-action-verified-user prefix grey-text text-lighten-1"></i>
							<input id="username" type="text" name="username" required>
							<label for="username">Nama Pengguna</label>
						</div>
                        <div class="input-field col s12 m6">
                            <i class="mdi-content-mail prefix grey-text text-lighten-1"></i>
                            <input id="email" type="email" class="validate" name="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12 m6">
						<label for="kategori-satker">satker</label><br><br>
						<select name="level" id="level">
							<option value="ipds" selected>ipds </option>
							<option value="umum">umum</option>
							<option value="neraca">neraca</option>
							<option value="produksi">produksi</option>
							<option value="distribusi">distribusi</option>
							<option value="diseminasi">diseminasi</option>
							<option value="sosial">sosial</option>
						</select>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-action-lock-outline prefix grey-text text-lighten-1"></i>
							<input id="password" type="password" name="password" >
							<label for="password type=">Kata Sandi</label>
						</div>
					</div>
					
					
					<div class="input-field col s12 ">
						<label for="kategori-pengguna">Pengguna Sebagai</label><br><br>
						<select name="satker" id="satker">
							<option value="admin" selected>Admin </option>
							<option value="operator">operator</option>
							<option value="user">user</option>
						</select>
						
						</div>
						
						<div class="row">
						<div class="input-field col s12 m6">
							<button type="submit" name="tambah" class="btn waves-effect waves-light col s12 blue">tambahkan</button>
						</div>
						<div class="input-field col s12 m6">
							<a href="<?= base_url('pengguna')?>" class="btn waves-effect waves-light col s12 grey ">batalkan</a>
						</div>
					</div>
				
				</form>
			</div>
		</div>
	</div>
</div>
