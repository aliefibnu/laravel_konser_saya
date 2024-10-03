<?php

namespace App\Models\Model\ModelTempatDuduk;

use App\Models\Model\ModelKategori\ModelKategori;
use App\Models\Model\ModelKonser\ModelKonser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTempatDuduk extends Model
{

    use HasFactory;

    protected $table = 'tempat_duduk';
    protected $primaryKey  = 'id_tempat_duduk';
    // kolom yg boleh di isi secara massal
    protected $fillable = [
        "id_tempat_duduk",
        "id_konser",
        "id_kategori",
        "nomor_tempat",
        "harga",
        "status_pemesanan",
        "created_at",
        "updated_at"
    ];
    public $timestamps = true;
    public function konser()
    {
        return $this->belongsTo(ModelKonser::class, 'id_konser');
    }
    public function kategoriTempatDuduk()
    {
        return $this->belongsTo(ModelKategori::class, 'id_kategori');
    }
}

