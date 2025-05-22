<?php

namespace App\Console\Commands;

use App\Models\Bangunan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class KonversiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:konversi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = DB::table('lokasi')->get();

        $bangunan = Bangunan::query()->delete();

        foreach ($data as $key => $item) {

            $n = new Bangunan();
            $n->nama_bangunan = $item->namatoko;
            $n->nama_pemilik = $item->namapemilik;
            $n->kontak_pemilik = $item->kontakpemilik;
            $n->tipe = $item->tipe;
            $n->gambar = $item->imgori;
            $n->lat = $item->lat;
            $n->long = $item->lon;
            $n->kecamatan = $item->zona;
            $n->kelurahan = $item->kelurahan;
            $n->alamat = $item->alamat;
            $n->no_izin = $item->noizin;
            $n->is_aktif = $item->isaktif;
            $n->nama_perusahaan = $item->namaperusahaan;
            $n->no_imb = $item->imb;
            $n->peruntukan = $item->peruntukan;
            $n->save();
        }
    }
}
