<?php

interface pilihanKalkulatorBangunRuang{
    public function kalku();
}

class LuasPersegiPanjang implements pilihanKalkulatorBangunRuang{
    public $panjang;
    public $lebar;

    public function kalku(){
        return $this->panjang * $this->lebar;
    }
}

class VolumeBola implements pilihanKalkulatorBangunRuang{
    public $jari;
    public $phi = 3.14;
    public function kalku(){
        return (4/3) * $this->phi * $this->jari * $this->jari;
    }
}

class VolumeKerucut implements pilihanKalkulatorBangunRuang{
    public $tinggi;
    public $jari;
    public $phi = 13.4;

    public function kalku(){
        return (1/3) * $this->phi * $this->jari * $this->jari * $this->jari * $this->tinggi;
    }
}

class VolumeKubus implements pilihanKalkulatorBangunRuang{
    public $rusuk;

    public function kalku(){
        return $this->rusuk * $this->rusuk * $this->rusuk; 
    }
}

class KelilingLingkaran implements pilihanKalkulatorBangunRuang{
    public $jari;
    public $phi = 13.4;

    public function kalku(){
        return 2 * $this->phi * $this->jari;
    }
}

class JsonFile implements pilihanKalkulatorBangunRuang{
    public $pilihanKalkulatorBangunRuang;
    public function __kalku(string $pilihanKalkulatorBangunRuang){
        $this->pilihanKalkulatorBangunRuang = $pilihanKalkulatorBangunRuang;
    }
}

class kalkulatorBangunRuangFactory{
    public function hitung($tipe){
        if($tipe==='luaspersegipanjang'){
            return LuasPersegiPanjang();
        }
        if($tipe==='volumebola'){
            return VolumeBola();
        }
        if($tipe==='volumekerucut'){
            return VolumeKerucut();
        }
        if($tipe==='volumekubus'){
            return VolumeKubus();
        }
        if($tipe==='kelilinglingkaran'){
            return KelilingLingkaran();
        }
        throw new Exception("Error!!!");
    }
}

Route::get('/', function(){
    $satuan = ['rusuk'=>12, 'tinggi'=>0, 'panjang'=>0, 'lebar'=>0, 'jari'=>0];
    $pilihanKalkulatorBangunRuang = 'volumekubus';
    $kalkulatorBangunRuangFactory = new kalkulatorBangunRuangFactory();
    $kalkulatorBangunRuang = $kalkulatorBangunRuangFactory ->initializeKalkulatorBangunRuang($pilihanKalkulatorBangunRuang, $satuan);
    $hasilKalkulatorBangunRuang = $kalkulatorBangunRuang ->hitung();
    print_r($hasilKalkulatorBangunRuang);
})
?>