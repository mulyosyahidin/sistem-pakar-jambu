<?php

namespace App\Services;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Hama;

class DiagnosaService
{
    /**
     * Instance dari model Diagnosa
     */
    protected Diagnosa $diagnosa;

    /**
     * Kredit
     *
     * @var int
     */
    protected $kredit = 1;

    /**
     * Membuat instance baru dari DiagnosaService
     */
    public function __construct(Diagnosa $diagnosa)
    {
        $this->diagnosa = $diagnosa;
    }

    /**
     * Melakukan perhitungan diagnosa
     *
     * Perhitungan diagnosa menggunakan metode Variable-Centered Intelligent Rule System (VCIRS) dan Certainty Factor (CF).
     * Tahapan perhitungan:
     * 0. Membuat rule
     * 1. Menghitung nilai VUR (Variable Utility Rate)
     * 2. Menghitung nilai NUR (Normalized Utility Rate)
     * 3. Menghitung nilai RUR (Relative Utility Rate)
     * 4. Menghitung nilai CF (Certainty Factor)
     * 5. Menghitung nilai CFR (Certainty Factor Result)
     * 6. Menghitung nilai CFR terkombinasi
     */
    public function hitung(): array
    {
        $gejalaDiagnosa = $this->diagnosa->gejala()->get()->sortByDesc('bobot');
        $dataHama = Hama::with('gejala')->orderBy('kode')->get();
        $matrixNilaiCf = $this->matrixNilaiCf();

        $data = [];

        $i = 0;
        foreach ($dataHama as $hama) {
            $gejalaHama = $hama->gejala()->get()->sortBy('kode');

            /**
             * Membuat rule
             *
             * Rule terdiri dari 4 bagian:
             * 1. Gejala
             * 2. Jumlah node
             * 3. Node mana saja yang tidak bernilai null
             * 4. Nomor urutan
             *
             * @var array
             */
            $_rule = [];
            $j = 0;

            foreach ($gejalaHama as $gejala) {
                $_rule[$j] = [
                    'gejala' => $gejala,
                    'number_of_node' => countNonNullIndexes($matrixNilaiCf[$gejala->kode]),
                    'nodes' => getNonNullIndexes($matrixNilaiCf[$gejala->kode]),
                ];

                $j++;
            }

            // order by number_of_node from highest to lowest
            usort($_rule, function ($a, $b) {
                return $b['number_of_node'] <=> $a['number_of_node'];
            });

            $rule = [];
            $j = 1;
            foreach ($_rule as $item) {
                $rule[] = [
                    'gejala' => $item['gejala'],
                    'number_of_node' => $item['number_of_node'],
                    'nodes' => $item['nodes'],
                    'number' => $j,
                ];

                $j++;
            }

            // sort $gejalaHama based on $rule
            $gejalaHama = collect($rule)->map(function ($item) use ($gejalaHama) {
                return $gejalaHama->where('kode', $item['gejala']->kode)->first();
            });

            // total variabel atau gejala yang dimiliki oleh hama
            $totalVariabel = count($gejalaHama);

            /**
             * Menghitung nilai VUR (Variable Utility Rate)
             *
             * VUR = Kredit * (Jumlah node * Nomor urutan / Total variabel)
             *
             * @var array
             */
            $vur = [];
            $j = 0;

            foreach ($gejalaHama as $gejala) {
                $kredit = $this->kredit;
                $numberOfNode = $rule[$j]['number_of_node'];
                $variabelOrder = $rule[$j]['number'];

                $vur[$j] = [
                    'gejala' => $gejala,
                    'nilai' => $kredit * ($numberOfNode * $variabelOrder / $totalVariabel), // rumus VUR
                    '_numberOfNode' => $numberOfNode,
                    '_variabelOrder' => $variabelOrder,
                    '_totalVariabel' => $totalVariabel,
                ];

                $j++;
            }

            /**
             * Menghitung nilai NUR (Normalized Utility Rate)
             *
             * NUR = VUR / Jumlah VUR
             *
             * @var float
             */
            $nur = array_sum(array_column($vur, 'nilai')) / (count($vur) == 0 ? 1 : count($vur));

            /**
             * Menghitung nilai RUR (Relative Utility Rate)
             *
             * RUR = NUR / Jumlah NUR
             *
             * @var float
             */
            $rur = $nur / (count($vur) == 0 ? 1 : count($vur));

            /**
             * Kumpulan jawaban user
             *
             * @var array
             */
            $jawabanUser = [];
            $j = 0;

            foreach ($gejalaHama as $gejala) {
                $jawabanUser[$j] = [
                    'gejala' => $gejala,
                    'jawaban' => $gejalaDiagnosa->where('kode', $gejala->kode)->first() == null ? '0' : '1', // jika user tidak menjawab maka jawaban dianggap 0, jika menjawab maka jawaban dianggap 1
                ];

                $j++;
            }

            /**
             * Menghitung nilai CF (Certainty Factor) dan CFR (Certainty Factor Result)
             *
             * CF = Bobot pakar * Bobot user
             * CFR = CF * RUR
             *
             * @var array
             */
            $nilaiCf = [];
            $j = 0;

            foreach ($gejalaHama as $gejala) {
                $bobotPakar = $gejala->bobot;
                $bobotUser = $jawabanUser[$j]['jawaban'];

                $nilaiCf[$j] = [
                    'gejala' => $gejala,
                    'bobot' => [
                        'pakar' => $bobotPakar,
                        'user' => $bobotUser,
                    ],
                    'nilai' => [
                        'cf' => $bobotPakar * $bobotUser, // rumus CF
                        'cfr' => $bobotPakar * $bobotUser * $rur, // rumus CFR
                    ],
                    '_cfrMultiplier' => $rur,
                ];

                $j++;
            }

            /**
             * Menghitung nilai CFR terkombinasi
             *
             * CFR terkombinasi = CFR1 + CFR2 * (1 - CFR1)
             * Hasilnya kemudian diambil nilai terakhirnya sebagai hasil diagnosa
             *
             * @var array
             */
            $cfKombinasi = [];
            $j = 0;
            $n = $gejalaHama->count();

            $_current = 0;
            $_next = 0;

            foreach ($gejalaHama as $gejala) {
                if ($j != ($n - 1)) {
                    if ($j == 0) {
                        $_current = $nilaiCf[$j]['nilai']['cfr'];
                        $_next = $nilaiCf[$j + 1]['nilai']['cfr'];
                    } else {
                        $_next = $nilaiCf[$j + 1]['nilai']['cfr'];
                    }

                    $nilai = $_current + $_next * (1 - $_current);
                    $_current = $nilai;

                    // Menambahkan nilai CFR terkombinasi ke array
                    $cfKombinasi[] = $nilai;
                }

                $j++;
            }

            $data[$i] = [
                'hama' => $hama,
                'gejala_hama' => $gejalaHama,
                'rule' => $rule,
                'vur' => $vur,
                'nur' => $nur,
                'rur' => $rur,
                'jawaban_user' => $jawabanUser,
                'bobot' => $nilaiCf,
                'cf_kombinasi' => [
                    'steps' => $cfKombinasi,
                    'result' => end($cfKombinasi),
                    'persentase' => numberFormat(end($cfKombinasi) * 100, 2),
                ],
                '_nurItems' => array_column($vur, 'nilai'),
                '_nurDivider' => count($vur),
                '_rurDivider' => count($vur),
            ];

            $i++;
        }

        return $data;
    }

    /**
     * Mengambil hama tertinggi
     */
    public function hamaTertinggi(): array
    {
        $hasilPerhitungan = $this->hitung();

        $hamaTertinggi = collect($hasilPerhitungan)->sortByDesc('cf_kombinasi.result')->first();

        return $hamaTertinggi;
    }

    /**
     * Membentuk matrix nilai CF
     */
    public function matrixNilaiCf(): array
    {
        $data = [];

        $dataGejala = Gejala::orderBy('kode')->get();
        $dataHama = Hama::with('gejala')->orderBy('kode')->get();

        foreach ($dataGejala as $gejala) {
            $data[$gejala->kode] = [];

            foreach ($dataHama as $hama) {
                $data[$gejala->kode][$hama->id] = $hama->gejala->where('kode', $gejala->kode)->first()?->bobot;
            }
        }

        return $data;
    }
}
