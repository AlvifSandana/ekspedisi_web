<?php

namespace App\Http\Transformers;

use App\Pengirim;

class PengirimTransformer
{
    public function transform(Pengirim $pengirim)
    {
        return [
            'nama'          => $pengirim->nama_pengirim,
            'alamat'        => $pengirim->alamat_pengirim,
            'nomor_telpon'  => $pengirim->nomor_telpon
        ];
    }

    public function transformWithEmail(Pengirim $pengirim)
    {
        return [
            'nama'          => $pengirim->nama_pengirim,
            'alamat'        => $pengirim->alamat_pengirim,
            'nomor_telpon'  => $pengirim->nomor_telpon,
            'email'         => $pengirim->email
        ];
    }

    public function transformWithApiToken(Pengirim $pengirim)
    {
        return [
            'nama'          => $pengirim->nama_pengirim,
            'supir_cadangan'=> '',
            'alamat'        => $pengirim->alamat_pengirim,
            'nomor_telpon'  => $pengirim->nomor_telpon,
            'email'         => $pengirim->email,
            'api_token'     => $pengirim->api_token
        ];
    }
}
