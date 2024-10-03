<style>
    table tbody tr {
        border-bottom: 1px solid #ddd;
    }
</style>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 10px;">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Barang Konsinyasi</h4>
                        </div>
                        <div class="col s12 left-align">
                            <a href="<?= base_url('konsinyasi/tambah') ?>" class="btn waves-effect waves-light green darken-1" style="border-radius: 25px; margin-bottom: 20px;">
                                <i class="material-icons left">add</i>Tambah Barang Konsinyasi
                            </a>
                            <a href="<?= base_url('barang') ?>" class="btn waves-effect waves-light blue darken-1" style="border-radius: 25px; margin-bottom: 20px;">
                                <i class="material-icons left">arrow_forward</i>Barang
                            </a>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table" style="border-radius: 8px; overflow: hidden;">
                        <thead class="blue darken-2 white-text">
                            <tr>
                                <th class="center-align">No</th>
                                <th class="center-align">Barcode</th>
                                <th class="center-align">Nama Barang Konsinyasi</th>
                                <th class="center-align">Stok</th>
                                <th class="center-align">Harga Beli</th>
                                <th class="center-align">Harga Jual (Pagi)</th>
                                <th class="center-align">Harga Jual (Sore)</th>
                                <th class="center-align">Detail</th>
                                <th class="center-align">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($konsinyasi)) : ?>
                                <?php foreach (array_reverse($konsinyasi) as $key => $item) : ?>
                                    <tr>
                                        <td class="center-align"><?= $key + 1 ?></td>
                                        <td class="center-align">
                                            <?php if (!empty($item['kode_barang'])) : ?>
                                                <img src="<?= site_url('BarangController/generate_barcode/' . $item['kode_barang']); ?>" alt="Barcode" style="display: block; margin: 0 auto;" />
                                                <span style="display: block; font-size: 15px; color: #555; margin-top: 5px;">
                                                    <?= htmlspecialchars($item['kode_barang']); ?>
                                                </span>
                                            <?php else : ?>
                                                <span style="color: rgba(128, 128, 128, 0.7); font-style: italic; opacity: 0.7;">Tidak memiliki kode barang</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="center-align"><?= htmlspecialchars($item['nama_barang']); ?></td>
                                        <td class="center-align"><?= htmlspecialchars($item['stok']); ?></td>
                                        <td class="center-align">Rp <?= number_format(htmlspecialchars($item['harga_beli']), 0, ',', '.'); ?></td>
                                        <td class="center-align">Rp <?= number_format(htmlspecialchars($item['harga_jual_pagi']), 0, ',', '.'); ?></td>
                                        <td class="center-align">Rp <?= number_format(htmlspecialchars($item['harga_jual_sore']), 0, ',', '.'); ?></td>
                                        <td class="center-align" style="color: grey;"><?= !empty($item['detail_barang']) ? htmlspecialchars($item['detail_barang']) : '-' ; ?></td>
                                        <td class="center-align">
                                            <a href="<?= base_url('konsinyasi/ubah/' . $item['id_barang']) ?>" class="btn yellow darken-2 waves-effect waves-light btn-floating">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="#" onclick="confirmDelete('<?= base_url('konsinyasi/hapus/' . $item['id_barang']) ?>')" class="btn red darken-2 waves-effect waves-light btn-floating">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="9" class="center-align">Tidak ada data barang konsinyasi yang tersedia untuk hari ini.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-action right-align">
                    <p class="grey-text text-darken-1">Total Barang Konsinyasi: <strong><?= count($konsinyasi) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak dapat mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>
