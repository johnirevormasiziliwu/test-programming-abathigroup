<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParkirController extends Controller
{

    public function hitungTotalBiayaParkir()
    {

        $listDataKendaraan = [
            ["nopol" => "KB 9234 KT", "kendaraan" => "motor", "waktu_parkir" => 3],
            ["nopol" => "AA 3245 TYC", "kendaraan" => "mobil", "waktu_parkir" => 7],
            ["nopol" => "KB 9133 RE", "kendaraan" => "motor", "waktu_parkir" => 10],
            ["nopol" => "B 9234 TU", "kendaraan" => "mobil", "waktu_parkir" => 15],
            ["nopol" => "AD 9124 GH", "kendaraan" => "motor", "waktu_parkir" => 5],
            ["nopol" => "AD 9004 YGU", "kendaraan" => "mobil", "waktu_parkir" => 4],
            ["nopol" => "B 9277 IOB", "kendaraan" => "mobil", "waktu_parkir" => 12],
            ["nopol" => "AA 1143 BN", "kendaraan" => "motor", "waktu_parkir" => 8],
            ["nopol" => "B 9234 TU", "kendaraan" => "mobil", "waktu_parkir" => 14]
        ];

        $totalBiayaPerKendaraan = [];

        foreach ($listDataKendaraan as $kendaraan) {

            if ($kendaraan['kendaraan'] === 'motor') {
                $biayaMasukKendaraan = 2000;
            } else {
                $biayaMasukKendaraan = 5000;
            }

            if ($kendaraan['kendaraan'] === 'motor') {
                $biayaParkirPerjam = 2000;
            } else {
                $biayaParkirPerjam = 3000;
            }

            $waktuParkir = min($kendaraan['waktu_parkir'], 15);

            $totalBiayaParkir = $biayaMasukKendaraan + ($biayaParkirPerjam * $waktuParkir);

            if ($waktuParkir >= 5) {
                $diskon = floor($waktuParkir / 5) * 5000;
                $totalBiayaParkir -= $diskon;
            }

            $totalBiayaPerKendaraan[] = [
                "Hasil" => [
                    'Nomor Polisi' => $kendaraan['nopol'],
                    'Jenis' => $kendaraan['kendaraan'],
                    'Waktu Parkir' => $kendaraan['waktu_parkir'] . ' jam',
                    'Biaya' => 'Rp ' . number_format($totalBiayaParkir, 0, ',', '.'),
                ],
            ];
        }

        return response()->json($totalBiayaPerKendaraan);
    }

    public function showKendaraanByNomorPolisi($nomorPolisi)
    {
        $listDataKendaraan = [
            ["nopol" => "KB 9234 KT", "kendaraan" => "motor", "waktu_parkir" => 3],
            ["nopol" => "AA 3245 TYC", "kendaraan" => "mobil", "waktu_parkir" => 7],
            ["nopol" => "KB 9133 RE", "kendaraan" => "motor", "waktu_parkir" => 10],
            ["nopol" => "B 9234 TU", "kendaraan" => "mobil", "waktu_parkir" => 15],
            ["nopol" => "AD 9124 GH", "kendaraan" => "motor", "waktu_parkir" => 5],
            ["nopol" => "AD 9004 YGU", "kendaraan" => "mobil", "waktu_parkir" => 4],
            ["nopol" => "B 9277 IOB", "kendaraan" => "mobil", "waktu_parkir" => 12],
            ["nopol" => "AA 1143 BN", "kendaraan" => "motor", "waktu_parkir" => 8],
            ["nopol" => "B 9234 TU", "kendaraan" => "mobil", "waktu_parkir" => 14]
        ];


        foreach ($listDataKendaraan as $kendaraan) {

            if ($kendaraan['kendaraan'] === 'motor') {
                $biayaMasukKendaraan = 2000;
            } else {
                $biayaMasukKendaraan = 5000;
            }

            if ($kendaraan['kendaraan'] === 'motor') {
                $biayaParkirPerjam = 2000;
            } else {
                $biayaParkirPerjam = 3000;
            }

            $waktuParkir = min($kendaraan['waktu_parkir'], 15);

            $totalBiayaParkir = $biayaMasukKendaraan + ($biayaParkirPerjam * $waktuParkir);

            if ($waktuParkir >= 5) {
                $diskon = floor($waktuParkir / 5) * 5000;
                $totalBiayaParkir -= $diskon;
            }


            $kendaraan = collect($listDataKendaraan)->firstWhere('nopol', $nomorPolisi);

            if ($kendaraan) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data kendaraan ditemukan',
                    'data' => [
                        'Nomor Polisi' => $kendaraan['nopol'],
                        'Jenis' => $kendaraan['kendaraan'],
                        'Waktu Parkir' => $kendaraan['waktu_parkir'],
                        'Biaya Parkir' => $totalBiayaParkir,

                    ],
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data kendaraan tidak ditemukan',
                ]);
            }
        }
    }
}
