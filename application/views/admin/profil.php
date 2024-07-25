	<div class="row">
  
		<div class="col s12 m12 l12">
			<div id="profile-card" class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?= base_url('assets/images/office.jpg')?>" alt="user bg">
				</div>
				<div class="card-content">
					<img src="<?= base_url('assets/images/admin.png')?>" alt="" class="circle responsive-img activator card-profile-image">
					<a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
						<i class="mdi-content-filter-list"></i>
					</a>
					
					<span class="card-title activator grey-text text-darken-4"><?= $pengguna['pengguna_fullname']?></span>
					<p class="grey-text"><i class="mdi-action-perm-identity "></i> <?= $pengguna['pengguna_level']?></p>
					<p class="grey-text"><i class="mdi-action-perm-phone-msg "></i> <?= $pengguna['pengguna_telepon']?></p>
					<p class="grey-text"><i class="mdi-communication-email"></i> <?= $pengguna['pengguna_email']?></p>
				
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4"><?= $pengguna['pengguna_fullname']?> <i class="mdi-navigation-close right"></i></span>
					<h5 class="divider"></h5>
                    <p><i class="mdi-communication-contacts"></i> <?= $pengguna['pengguna_username']?></p>
                    <p><i class="mdi-action-perm-identity"></i> <?= $pengguna['pengguna_level']?></p>
					<p><i class="mdi-action-perm-phone-msg"></i> <?= $pengguna['pengguna_telepon']?></p>
					<p><i class="mdi-communication-email"></i> <?= $pengguna['pengguna_email']?></p>
                    <p><i class="mdi-maps-pin-drop"></i> <?= $pengguna['pengguna_alamat']?></p>
                </div>
			</div>
		</div>

        <div class="col s12 m12 l6">

            <ul class="collection card with-header">
                <li class="collection-header">
                    <div class="row">
                        <div class="col s6 m6 l6 ">
                            <h4 class="margin">Daftar Pengguna </h4>
                        </div>
                        <?php if ($this->session->userdata('level') === 'adminSuper'):?>
                        <div class="col s6 m6 l6">
                            <h4 class="right margin">
                                <a href="<?= base_url('admin/tambah')?>" class="btn-flat blue white-text waves-effect waves-light btn-floating">
                                    <i class="mdi-content-add"></i>
                                </a>
                            </h4>
                        </div>
                        <?php endif;?>
                    </div>
                </li>
                <?php foreach ($penggunas as $row => $i):?>
                    <?php if ($i['pengguna_id'] !== $this->session->userdata('user_id')):?>
                        <li class="collection-item avatar">
                            <div class="row">
                                <div class="col s6 m6 l6">
                                    <i class="mdi-action-account-circle circle grey lighten-3 black-text"></i>
                                    <span class="title"><?= $i['pengguna_fullname']?></span>
                                    <p class="grey-text"> <?= $i['pengguna_email']?></p>
					                <?php
					                $colorLevel;
					                switch ($i['pengguna_level']){
						                case 'adminSales':
							                $colorLevel = 'green';
							                break;
						                case 'adminGudang':
							                $colorLevel = 'cyan';
							                break;
						                case 'sales':
							                $colorLevel = 'pink';
							                break;
						                case 'adminSuper':
							                $colorLevel = 'red';
							                break;
					                }
					                ?>
                                </div>
                                <div class="col s3 m3 l3 left">
                                    <span class="task-cat <?= $colorLevel?>"><?= $i['pengguna_level']?></span>
                                </div>
                                <?php if ($this->session->userdata('level') === 'adminSuper'):?>
                                <div class="col s3 m3 l3 ">
                                    <a href="#delete-<?= $i['pengguna_id']?>" class="red-text text-center right modal-trigger" title="hapus data" style="margin: 0 16px">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                    <a href="<?= base_url('admin/ubah/'.$i['pengguna_id'])?>" class="orange-text right" title="ubah data">
                                        <i class="mdi-editor-border-color"></i>
                                    </a>
                                    <!-- Modal delete -->
                                    <div id="delete-<?=$i['pengguna_id']?>" class="modal">
                                        <div class="modal-content">
                                            <h4 class="red-text text-lighten-1 center">
                                                <i class="mdi-action-info-outline"></i> Yakin ingin menghapus barang ?
                                            </h4>
                                            <div class="modal-content">
                                                <p class="grey-text text-lighten-1">
                                                    item yang anda hapus akan tersimpan ke data arsip
                                                </p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= base_url('admin/hapus/'.$i['pengguna_id'])?>" class="modal-close waves-effect waves-green btn green lighten-1">lanjutkan</a>
                                            <a href="#!" class="modal-close waves-effect waves-red btn grey lighten-1" style="margin-right:12px">batalkan</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endif;?>
                            </div>
                        </li>
	                <?php endif;?>
                <?php endforeach;?>
            </ul>

        </div>

        <div class="col s12 m12 l6 no-padding">
            <ul class="collapsible collapsible-accordion card no-padding with-header" data-collapsible="accordion">
                <li class="collapsible-header">
                    <h4>Deskripsi Tugas Admin</h4>
                </li>
                <li>
                    <div class="collapsible-header ">Admin Sales</div>
                    <div class="collapsible-body">
                        <p>
                            menyetujui, membuat surat keluar dan memeriksa seluruh data pesanan
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header ">Admin Gudang </div>
                    <div class="collapsible-body">
                        <p>
                            mengeluarkan surat keluar barang
                        </p>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header ">Sales Lapangan</div>
                    <div class="collapsible-body">
                        <p>
                            menambahkan dan membuat data pemesanan dari pelanggan
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>