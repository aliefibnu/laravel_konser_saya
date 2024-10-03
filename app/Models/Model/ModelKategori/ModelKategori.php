<?php

namespace App\Models\Model\ModelKategori;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKategori extends Model
{

    use HasFactory;

    protected $table = 'kategori_tempat_duduk';
    protected $primaryKey  = 'id_kategori';
    // kolom yg boleh di isi secara massal
    protected $fillable = [
        "id_kategori",
        "nama_kategori",
        "keterangan",
        "created_at",
        "updated_at"
    ];
    public $timestamps = true;
}
