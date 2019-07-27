<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['user_id','nama','jenis_kelamin','agama','alamat','gambar'];

    public function getGambar()
    {
        if(!$this->gambar)
        {
            return asset('images/default.jpg');
        }
        return asset('images/'. $this->gambar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function rataRataNilai()
    {
        $total = 0;
        $hitung = 0;
        if($this->mapel->isNotEmpty())
        {
            foreach($this->mapel as $mapel)
            {
                $total += $mapel->pivot->nilai;
                $hitung++;
            }
            return round($total/$hitung);
        }else{
            return 0;
        }
    }
}
