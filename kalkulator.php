<?php
interface KalkulatorBangunRuang{
    public function hitungBangunRuang($satuan);

}
class Persegi_Panjang implements KalkulatorBangunRuang {
    public $panjang;
    public $lebar;

    public function hitungBangunRuang($satuan) {
        $this->panjang = $satuan['panjang'];
        $this->lebar = $satuan['lebar'];
        return ('Bangun Ruang : Persegi Panjang<br>'.
                'Panjang : '.$this->panjang.' m<br>'.
                'Lebar : '.$this->lebar.' m<br>'.
                'Rumus : panjang x lebar<br>'.
                'Luas Persegi_Panjang : '.$this->panjang * $this->lebar.' m2');
    }
}
class Kubus implements KalkulatorBangunRuang {
    public $rusuk;

    public function hitungBangunRuang($satuan) {
        $this->rusuk = $satuan['rusuk'];
        return ('Bangun Ruang : Kubus<br>'.
                'Panjang Rusuk (r) : '.$this->rusuk.' m<br>'.
                'rumus : r x r x r<br>'.
                'Volume Kubus diperoleh hasil : '.$this->rusuk * $this->rusuk * $this->rusuk.' m3');
    }
}
class Lingkaran implements KalkulatorBangunRuang {
    public $jejari;
    public function hitungBangunRuang($satuan) {
        $this->jejari = $satuan['jejari'];
        return ('Bangun Ruang : Lingkaran<br>'.
                'Jejari (r) : '.$this->jejari.' m<br>'.
                'hitung : 2 x phi x r<br>'.
                'Keliling Lingkaran diperoleh hasil: '.(2 * pi() * $this->jejari.' m'));
    }
}
class Kerucut implements KalkulatorBangunRuang {
    public $tinggi;
    public $jejari;

    public function hitungBangunRuang($satuan) {
        $this->tinggi = $satuan['tinggi'];
        $this->jejari = $satuan['jejari'];
        return ('Bangun Ruang : Kerucut<br>'.
                'Tinggi : '.$this->tinggi.' m<br>'.
                'Jejari (r) : '.$this->jejari.' m<br>'.
                'hitung : 1/3 x luas alas (lingkaran: phi*r*r) x t<br>'.
                'Volume Kerucut diperoleh hasil : '.(1/3) * pi() * $this->jejari * $this->jejari * $this->tinggi.' m3');
    }
}
class Bola implements KalkulatorBangunRuang {
    public $jejari;

    public function hitungBangunRuang($satuan) {
        $this->jejari = $satuan['jejari'];
        return ('Bangun Ruang : Bola<br>'.
                'Jejari (r) : '.$this->jejari.' m<br>'.
                'Rumus : 4/3 x phi x r x r x r<br>'.
                'Volume Bola : '.(4/3) * pi() * $this->jejari * $this->jejari * $this->jejari.' m3');
    }
}


class KalkulatorBangunRuangFactory{
    public function initializeKalkulatorBangunRuang($pilih){
        if($pilih=='luasPersegi_panjang'){
            return new Persegi_panjang();
        }
        if($pilih=='Volume_bola'){
            return new Bola();
        }
        if($pilih=='Volume_kerucut'){
            return new Kerucut();
        }
        if($pilih=='Volume_kubus'){
            return new Kubus();
        }
        if($pilih=='keliling_lingkaran'){
            return new Lingkaran();
        }
    }
}
$satuan = ['rusuk'=>12, 'panjang'=>0, 'lebar'=>0, 'jejari'=>0, 'tinggi'=>0];
class Json{
    public static function form($data){
        return json_encode($data);
    }
}

print(Json::form($satuan));
echo'<br><br>';
$pilihanKalkulatorBangunRuang='Volume_kubus';
$kalkulatorBangunRuangFactory = new KalkulatorBangunRuangFactory();
$kalkulatorBangunRuang = $kalkulatorBangunRuangFactory->initializeKalkulatorBangunRuang($pilihanKalkulatorBangunRuang);
$hasilKalkulatorBangunRuang = $kalkulatorBangunRuang->hitungBangunRuang($satuan);
print_r($hasilKalkulatorBangunRuang);