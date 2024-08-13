<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Penggunaan Web Koperasi</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header>
            <h1>Panduan Penggunaan Web Koperasi</h1>
            <p>Temukan panduan lengkap berdasarkan peran Anda untuk memanfaatkan aplikasi koperasi secara maksimal.</p>
        </header>



        <div class="role-sections">
            <section id="user" class="role-section">
                <h2>Panduan untuk User</h2>
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Dashboard: Apa yang bisa saya lihat di dashboard?</h3>
                            <span class="material-icons drop">expand_more</span>
                        </div>
                        <div class="accordion-body">
                            <p>Di dashboard, Anda akan menemukan informasi terbaru tentang koperasi serta tips & trik
                                yang bermanfaat untuk memanfaatkan layanan kami dengan lebih baik.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Peminjaman: Bagaimana cara mengajukan pinjaman?</h3>
                            <span class="material-icons drop">expand_more</span>
                        </div>
                        <div class="accordion-body">
                            <p>Untuk mengajukan pinjaman, kunjungi halaman peminjaman dan isi formulir pengajuan.
                                Permohonan Anda akan diperiksa dan disetujui oleh admin.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>History: Di mana saya dapat melihat riwayat peminjaman saya?</h3>
                            <span class="material-icons drop">expand_more</span>
                        </div>
                        <div class="accordion-body">
                            <p>Riwayat peminjaman dapat diakses melalui halaman history. Di sana, Anda dapat memantau
                                semua transaksi peminjaman yang telah Anda lakukan.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="operator" class="role-section">
                <h2>Panduan untuk Operator</h2>
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Master Data: Apa yang bisa saya kelola di master data?</h3>
                            <span class="material-icons drop">expand_more</span>
                        </div>
                        <div class="accordion-body">
                            <p>Di master data, Anda dapat mengelola barang, kategori, dan satuan. Anda dapat
                                menambahkan, mengedit, atau menghapus data sesuai kebutuhan.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Menambahkan Data: Bagaimana cara menambahkan data baru?</h3>
                            <span class="material-icons drop">expand_more</span>
                        </div>
                        <div class="accordion-body">
                            <p>Untuk menambahkan data baru, akses menu barang, kategori, atau satuan, kemudian pilih
                                opsi "Tambah" dan isi informasi yang diperlukan.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Pengelolaan Data: Bagaimana cara mengelola data yang ada?</h3>
                            <span class="material-icons drop">expand_more</span>
                        </div>
                        <div class="accordion-body">
                            <p>Anda dapat mengedit atau menghapus data yang ada dengan memilih item yang ingin diubah
                                atau dihapus dari daftar dan mengikuti petunjuk yang diberikan.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="admin" class="role-section">
                <h2>Panduan untuk Admin</h2>
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Data Keseluruhan: Apa saja data yang dapat saya lihat?</h3>
                            <span class="material-icons drop">expand_more</span>
                        </div>
                        <div class="accordion-body">
                            <p>Sebagai admin, Anda memiliki akses penuh ke semua data yang telah ditambahkan oleh
                                operator dan user, termasuk data peminjaman dan master data.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Pengelolaan Akun: Bagaimana cara mengelola akun pengguna?</h3>
                            <span class="material-icons drop">expand_more</span>
                        </div>
                        <div class="accordion-body">
                            <p>Anda dapat mengelola akun pengguna melalui menu pengaturan akun, termasuk menambahkan,
                                mengedit, atau menghapus akun pengguna.</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div class="accordion-header">
                            <h3>Laporan: Bagaimana cara melihat laporan kegiatan?</h3>
                            <span class="material-icons drop">expand_more</span>
                        </div>
                        <div class="accordion-body">
                            <p>Anda dapat menghasilkan laporan kegiatan dari menu laporan, yang mencakup data transaksi,
                                peminjaman, dan aktivitas lainnya dalam koperasi.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="script.js"></script>
</body>
<style>
   body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa; /* Soft light gray background for elegance */
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;
    max-width: 1000px;
    margin: 50px auto;
    background-color: #ffffff; /* Clean white background for the main container */
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

header {
    text-align: center;
    margin-bottom: 30px;
}

header h1 {
    margin: 0;
    color: #343a40; /* Dark gray for text */
}

header p {
    font-size: 16px;
    color: #6c757d; /* Light gray for secondary text */
}

.navigation {
    margin-bottom: 30px;
    text-align: center;
}

.navigation ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.navigation ul li {
    display: inline;
    margin: 0 15px;
}

.navigation ul li a {
    text-decoration: none;
    color: #ffffff; /* Blue color for navigation links */
    font-weight: bold;
    transition: color 0.3s ease;
}

.navigation ul li a:hover {
    color: #0056b3; /* Darker blue on hover */
}

.role-sections {
    display: flex;
    flex-direction: column;
}

.role-section {
    padding: 20px;
    border-radius: 8px;
    background-color: #ffffff; /* Clean white background for role sections */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    opacity: 1;
    transition: opacity 0.5s ease;
}

.accordion {
    margin-top: 20px;
}

.accordion-item {
    border-bottom: 1px solid #e9ecef; /* Light gray border for accordion items */
}

.accordion-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    padding: 12px;
    background-color: #f1f3f5; /* Light gray background for accordion headers */
    border: 1px solid #e9ecef;
    border-radius: 5px;
}

.accordion-header h3 {
    margin: 0;
    font-size: 16px;
    color: #343a40; /* Dark gray for header text */
}

.accordion-body {
    max-height: 0;
    overflow: hidden;
    opacity: 0;
    transition: max-height 0.3s ease, opacity 0.3s ease;
    padding: 0 12px;
    background-color: #f8f9fa; /* Slightly different background for accordion content */
}

.accordion-body p {
    margin: 10px 0;
    color: #495057; /* Medium gray for body text */
}

.accordion-item.active .accordion-body {
    max-height: 150px;
    opacity: 1;
}

.material-icons.drop {
    transition: transform 0.3s ease;
}

.accordion-item.active .material-icons.drop {
    transform: rotate(180deg);
}

</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });

</script>

</html>