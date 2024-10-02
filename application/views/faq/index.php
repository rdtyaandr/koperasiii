<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        padding: 20px;
        margin-bottom: 30px;
        background-color: #ffffff;
    }

    .card-content {
        padding-bottom: 0;
    }

    .card-action {
        padding: 15px 30px;
    }

    .btn {
        border-radius: 25px;
        margin: 10px 0;
        background-color: #000000;
        color: white;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #444444;
    }

    .btn-floating {
        border-radius: 50% !important;
        background-color: #ff5722;
    }

    .accordion-item {
        border-bottom: 1px solid #ddd;
        margin-bottom: 10px;
        transition: background-color 0.3s;
    }

    .accordion-item:hover {
        background-color: #f1f1f1;
    }

    .accordion-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        padding: 15px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .accordion-header h3 {
        margin: 0;
        font-size: 18px;
        color: #000000;
    }

    .accordion-body {
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transition: max-height 0.3s ease, opacity 0.3s ease;
        padding: 0 15px;
        background-color: #ffffff;
    }

    .accordion-body p {
        margin: 10px 0;
        color: #333333;
    }

    .accordion-item.active .accordion-body {
        max-height: 200px;
        opacity: 1;
    }

    .material-icons.drop {
        transition: transform 0.3s ease;
    }

    .accordion-item.active .material-icons.drop {
        transform: rotate(180deg);
    }
</style>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); padding: 60px;>
                <div class="card-content">
                    <header>
                        <h1 class="blue-text text-darken-2" style="font-size: 2em; text-align: center; font-weight: bold;">Panduan Penggunaan Web Koperasi</h1>
                        <p style="font-size: 1.3em; text-align: center;">Temukan panduan lengkap berdasarkan peran Anda untuk memanfaatkan aplikasi koperasi secara maksimal.</p>
                    </header>
                    <div class="role-sections">
                        <section id="user" class="role-section">
                            <h3>Panduan untuk User</h3>
                            <div class="accordion">
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h3>Dashboard: Apa yang bisa saya lihat di dashboard?</h3>
                                        <span class="material-icons drop">expand_more</span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>Di dashboard, Anda akan menemukan informasi terbaru tentang koperasi serta tips & trik yang bermanfaat untuk memanfaatkan layanan kami dengan lebih baik.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h3>Peminjaman: Bagaimana cara mengajukan pinjaman?</h3>
                                        <span class="material-icons drop">expand_more</span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>Untuk mengajukan pinjaman, kunjungi halaman peminjaman dan isi formulir pengajuan. Permohonan Anda akan diperiksa dan disetujui oleh admin.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h3>History: Di mana saya dapat melihat riwayat peminjaman saya?</h3>
                                        <span class="material-icons drop">expand_more</span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>Riwayat peminjaman dapat diakses melalui halaman history. Di sana, Anda dapat memantau semua transaksi peminjaman yang telah Anda lakukan.</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="operator" class="role-section">
                            <h3>Panduan untuk Operator</h3>
                            <div class="accordion">
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h3>Master Data: Apa yang bisa saya kelola di master data?</h3>
                                        <span class="material-icons drop">expand_more</span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>Di master data, Anda dapat mengelola barang, kategori, dan satuan. Anda dapat menambahkan, mengedit, atau menghapus data sesuai kebutuhan.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h3>Menambahkan Data: Bagaimana cara menambahkan data baru?</h3>
                                        <span class="material-icons drop">expand_more</span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>Untuk menambahkan data baru, akses menu barang, kategori, atau satuan, kemudian pilih opsi "Tambah" dan isi informasi yang diperlukan.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h3>Pengelolaan Data: Bagaimana cara mengelola data yang ada?</h3>
                                        <span class="material-icons drop">expand_more</span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>Anda dapat mengedit atau menghapus data yang ada dengan memilih item yang ingin diubah atau dihapus dari daftar dan mengikuti petunjuk yang diberikan.</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="admin" class="role-section">
                            <h3>Panduan untuk Admin</h3>
                            <div class="accordion">
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h3>Data Keseluruhan: Apa saja data yang dapat saya lihat?</h3>
                                        <span class="material-icons drop">expand_more</span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>Sebagai admin, Anda memiliki akses penuh ke semua data yang telah ditambahkan oleh operator dan user, termasuk data peminjaman dan master data.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h3>Pengelolaan Akun: Bagaimana cara mengelola akun pengguna?</h3>
                                        <span class="material-icons drop">expand_more</span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>Anda dapat mengelola akun pengguna melalui menu pengaturan akun, termasuk menambahkan, mengedit, atau menghapus akun pengguna.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header">
                                        <h3>Laporan: Bagaimana cara melihat laporan kegiatan?</h3>
                                        <span class="material-icons drop">expand_more</span>
                                    </div>
                                    <div class="accordion-body">
                                        <p>Anda dapat menghasilkan laporan kegiatan dari menu laporan, yang mencakup data transaksi, peminjaman, dan aktivitas lainnya dalam koperasi.</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordions = document.querySelectorAll('.accordion-item');

        accordions.forEach(item => {
            const header = item.querySelector('.accordion-header');
            header.addEventListener('click', () => {
                item.classList.toggle('active');
                accordions.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
            });
        });

        // Smooth scroll to section when clicking on navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>