<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'emp_id';
    public $timestamps = true;

    protected $fillable = [
            'emp_id',
            'nama',	
            'gender',	
            'tmk',	
            'tgl_tetap',	
            'masa_kerja_tmk',
            'masa_kerja_kary_tetap',
            'eval_tahunan',
            'no_induk_kary',	
            'status_kary',
            'no_surat_perj_kerja',
            'pelayanan',
            'jabatan',
            'posisi',
            'sanksi_kary',
            'no_bpjs_tenaga_kerj',
            'no_bpjs_kes',
            'no_rek',
            'percent_gaji_pokok',
            'gaji_pokok',
            'insentif_poin',
            'total_gaji_pokok',
            'gaji_hari',
            'gaji_jam',
            'ttl',
            'no_ktp',	
            'email',
            'no_hp',
            'alamat_ktp',
            'alamat_domisili',
            'pend_terakhir',
            'jurusan',
            'nama_instansi',
            'guardian_name',
            'guardian_relationship',
            'guardian_phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengajuanCuti()
    {
        return $this->hasMany(PengajuanCuti::class);
    }

    public function saldoCuti()
    {
        return $this->hasOne(SaldoCuti::class, 'emp_id', 'emp_id');
    }

}