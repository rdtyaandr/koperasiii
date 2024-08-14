<?php
if (!function_exists('formatTanggal')) {
    function formatTanggal($tanggal)
    {
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $tanggalObj = DateTime::createFromFormat('Y-m-d', $tanggal);
        if ($tanggalObj === false) {
            return 'Format tanggal tidak valid';
        }

        $bulanIndo = $bulan[$tanggalObj->format('m')];
        return $tanggalObj->format('d') . ' ' . $bulanIndo . ' ' . $tanggalObj->format('Y');
    }
}

if (!function_exists('formatTanggall')) {
    function formatTanggall($tanggal)
    {
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $tanggalObj = DateTime::createFromFormat('Y-m-d H:i:s', $tanggal);
        if ($tanggalObj === false) {
            return 'Format tanggal tidak valid';
        }

        $bulanIndo = $bulan[$tanggalObj->format('m')];
        return $tanggalObj->format('d') . ' ' . $bulanIndo . ' ' . $tanggalObj->format('Y');
    }
}

if (!function_exists('formatTanggalWaktu')) {
    function formatTanggalWaktu($tanggalWaktu)
    {
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $tanggalObj = DateTime::createFromFormat('Y-m-d H:i:s', $tanggalWaktu);
        if ($tanggalObj === false) {
            return 'Format tanggal tidak valid';
        }

        $bulanIndo = $bulan[$tanggalObj->format('m')];
        return $tanggalObj->format('d') . ' ' . $bulanIndo . ' ' . $tanggalObj->format('Y') . ', ' . $tanggalObj->format('H:i');
    }
}

if (!function_exists('formatTanggalWaktuDetik')) {
    function formatTanggalWaktuDetik($tanggalWaktu)
    {
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $tanggalObj = DateTime::createFromFormat('Y-m-d H:i:s', $tanggalWaktu);
        if ($tanggalObj === false) {
            return 'Format tanggal tidak valid';
        }

        $bulanIndo = $bulan[$tanggalObj->format('m')];
        return $tanggalObj->format('d') . ' ' . $bulanIndo . ' ' . $tanggalObj->format('Y') . ', ' . $tanggalObj->format('H:i:s');
    }
}
