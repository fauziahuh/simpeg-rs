<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_cuti';
    protected $primaryKey = 'cuti_id';
    public $timestamps = true;

    protected $fillable = [
        'alasan_cuti',
        'mulai_cuti',
        'akhir_cuti',
        'tgl_masuk',
        'pengganti_jaga',
        'manager_approval',
        'hr_approval',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'emp_id');
    }

    public function saldo_cuti()
    {
        return $this->hasOne(SaldoCuti::class, 'emp_id', 'emp_id');
    }
    
}