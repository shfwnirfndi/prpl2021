<?php
class UserRequest{
    protected static $rules = [
        'name' => 'string',
        'email' => 'string',
        'dob' => 'string'
    ];
    public static function validate($data){
        foreach(static:: $rules as $property => $type){
            if(gettype($data[$property]) !== $type){
            throw new \Exception("User Property {$property} Must Be Of Type{$type}" );
        }

        }
    }
}

class User{
    public $name;
    public $email;
    public $dob;

    public function __construct($data){
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->dob = $data['dob'];
    
    }
}

    

class Json{
    public static function from($data){
        return json_encode($data);
    }
}

class age{
    public static function now($data){
        $dob = new DateTime($data['dob']);
        $today = new DateTime(date('d.m.y'));
        return[
            'tahun' => $today->diff($dob)->y,
            'bulan' => $today->diff($dob)->m,
            'hari' => $today->diff($dob)->d,
        ];
    }
}
$data=[
    'name'=>'Shafwan Irfandi',
    'email'=>'shafwan1900018267@webmail.uad.ac.id',
    'dob'=>'26.11.2001'

];


UserRequest::validate($data);
$user=new User($data);
print_r(Json::from($user));
echo '<br>';
print_r(Age::now($data));