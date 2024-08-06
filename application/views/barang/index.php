<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Data Barang</h4>
                        </div>
                        <div class="col s12 left-align">
                            <a href="<?= base_url('barang/tambah') ?>" class="btn waves-effect waves-light green darken-1" style="border-radius: 8px;">
                                <i class="material-icons left">add</i>Tambah Barang
                            </a>
                            <a href="<?= base_url('kategori') ?>" class="btn waves-effect waves-light blue darken-1" style="border-radius: 8px;">
                                <i class="material-icons left">arrow_forward</i>Kategori
                            </a>
                            <a href="<?= base_url('satuan') ?>" class="btn waves-effect waves-light orange darken-1" style="border-radius: 8px;">
                                <i class="material-icons left">arrow_forward</i>Satuan
                            </a>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table mt">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($barang)) : ?>
                                <?php foreach ($barang as $key => $item) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td>
                                            <?php
                                            $kategoriNama = '';
                                            foreach ($kategori as $kat) {
                                                if ($kat['id_kategori'] == $item['id_kategori']) {
                                                    $kategoriNama = $kat['nama_kategori'];
                                                    break;
                                                }
                                            }
                                            echo $kategoriNama;
                                            ?>
                                        </td>
                                        <td><?= htmlspecialchars($item['nama_barang']); ?></td>
                                        <td><?= htmlspecialchars($item['stok']); ?></td>
                                        <td>
                                            <?php
                                            $satuanNama = '';
                                            foreach ($satuan as $sat) {
                                                if ($sat['id_satuan'] == $item['id_satuan']) {
                                                    $satuanNama = $sat['nama_satuan'];
                                                    break;
                                                }
                                            }
                                            echo $satuanNama;
                                            ?>
                                        </td>
                                        <td><?= number_format($item['harga_beli'], 0, ',', '.'); ?></td>
                                        <td><?= number_format($item['harga_jual'], 0, ',', '.'); ?></td>
                                        <td>
                                            <a href="<?= base_url('barang/ubah/' . $item['id_barang']) ?>" class="btn-small waves-effect waves-light yellow darken-3 white-text tooltipped" data-position="top" data-tooltip="Edit" style="border-radius: 4px;">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="#" class="btn-small waves-effect waves-darken white-text red tooltipped" data-position="top" data-tooltip="Hapus" style="border-radius: 4px;" onclick="event.preventDefault(); Swal.fire({
                                                title: 'Apakah Anda yakin?',
                                                text: 'Anda tidak akan dapat mengembalikan ini!',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, hapus!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = '<?= base_url('barang/hapus/' . $item['id_barang']) ?>';
                                                }
                                            })">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8" class="center-align">Tidak ada data barang.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Barang: <strong><?= count($barang) ?></strong></p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Native CSS for additional styling -->
<style>
  .container {
    margin-top: 30px;
  }

    .card {
        margin-top: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

  .card-content {
    padding-bottom: 0;
  }

    .input-field {
        margin-bottom: 20px;
    }

    .input-field label {
        color: #9e9e9e;
    }

    .input-field input:focus+label {
        color: #1e88e5 !important;
    }

    .input-field input:focus {
        border-bottom: 1px solid #1e88e5 !important;
        box-shadow: 0 1px 0 0 #1e88e5 !important;
    }

    .btn {
        border-radius: 8px;
        margin: 5px 0;
    }

    .btn-small {
        border-radius: 4px;
    }

  .tooltipped {
    position: relative;
  }

    .mt {
        margin-top: 15px;
    }
</style>

<!-- JavaScript for initializing Materialize components -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit(); // Initialize Materialize components
    });
</script>
