<?php

namespace App\Http\Transformers;

use App\Supir;

class SupirTransformer {
    public function transform(Supir $supir){
        return [
            'nama'              => $supir->nama_supir,
            'supir_cadangan'    => $supir->nama_supircadang,
            'alamat'            => $supir->alamat_supir,
            'nomor_telpon'      => $supir->nomor_telpon,
        ];
    }

    public function transformWithEmail(Supir $supir){
        return [
            'nama'              => $supir->nama_supir,
            'supir_cadangan'    => $supir->nama_supircadang,
            'alamat'            => $supir->alamat_supir,
            'nomor_telpon'      => $supir->nomor_telpon,
            'email'             => $supir->email,
        ];
    }

    public function transformWithApiToken(Supir $supir){
        return [
            'nama'              => $supir->nama_supir,
            'supir_cadangan'    => $supir->nama_supircadang,
            'alamat'            => $supir->alamat_supir,
            'nomor_telpon'      => $supir->nomor_telpon,
            'email'             => $supir->email,
            'api_token'         => $supir->api_token
        ];
    }
}
