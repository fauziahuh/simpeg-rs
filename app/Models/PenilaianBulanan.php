<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianBulanan extends Model
{
    protected $table = 'nilai_bulanan';
    protected $primaryKey = 'nilai_bulanan_id';
    protected $fillable = [
        'emp_id',
        'jabatan',
        'bulan',
        'tahun',
        'poin_jabatan',
        'poin_laporan',
        'poin_presensi',
    ];

    public $timestamps = false;
    protected $dateFormat = 'Y-m-d H:i:s';
    const CREATED_AT = 'created_at';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
