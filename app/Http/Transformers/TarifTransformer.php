<?php

namespace App\Http\Transformers;

use App\Tarif;

class TarifTransformer {
    public function transform(Tarif $tarif){
        return [[
            'id'                => $tarif->idTarif,
            'titik_pengiriman'  => $tarif->titik_pengiriman,
            'tujuan_pengiriman' => $tarif->tujuan_pengiriman,
            'tarif'             => $tarif->tarif,
            'status'            => $tarif->status,
            'keterangan'        => $tarif->keterangan
        ]];
    }
}
