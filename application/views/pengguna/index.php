<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                <span class="card-title blue-text" style="font-size: 2em; "><?= $title ?></span>
                    <span class="card-title" style="font-size: 2em; color: #00796B; text-align: center;"><?$title?></span>
                    <p id="current-datetime" class="right" style="font-size: 1.2em; font-weight: bold; color: #FFFFFF; background-color: #00796B; padding: 10px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); text-align: center;"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="card-content">
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Satker</th>
                                <th>Role</th>
                                <th>Aksi</th>   
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($Pengguna)) : ?>
                            <?php foreach ($Pengguna as $key => $hitam) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $hitam['username'] ?></td>
                                <td><?= $hitam['email'] ?></td>
                                <td><?= $hitam['satker'] ?></td>
                                <td><?= $hitam['pengguna_hak_akses'] ?></td>
                                <td>
                                <a href="<?= base_url('pengguna/ubah/' . $hitam['pengguna_id']) ?>" class="btn-small waves-effect waves-blue darken-3 tooltipped" data-position="top" data-tooltip="Edit"><i class="material-icons">edit</i></a>
                                <a href="<?= base_url('pengguna/hapus/' . $hitam['pengguna_id']) ?>" class="btn-small waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Hapus" onclick="return confirm('Are You Sure About That?')"><i class="material-icons">delete</i></a>
                                    </td>
                                </td>
                            <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="10" class="center-align">Tidak ada Pengguna yang Terdaftar.</td>
                        </tr>
                    <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/plugins/chartist-js/chartist.min.js') ?>"></script>
<script>
    // Update current date and time
    function updateDateTime() {
        var now = new Date();
        var date = now.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        var time = now.toLocaleTimeString('id-ID');
        document.getElementById('current-datetime').textContent = date + ' ' + time;
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>
