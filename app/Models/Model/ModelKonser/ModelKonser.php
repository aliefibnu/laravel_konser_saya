<?php

namespace App\Models\Model\ModelKonser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKonser extends Model
{
    use HasFactory;

    protected $table = 'konser';
    protected $primaryKey  = 'id_konser';
    // kolom yg boleh di isi secara massal
    protected $fillable = [
        'nama_konser',
        'jumlah_tiket',
        'tanggal_konser',
        'lokasi',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}



