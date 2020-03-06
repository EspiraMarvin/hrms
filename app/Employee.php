<?php

namespace App;

//use Illuminate\Foundation\Auth\User as Authenicaticable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Employee extends Model
{

    protected $table = "employees";



//    protected $table='employees';
//    public $primaryKey='id';
//    public $fillable='name';

/*     use Notifiable;
     use SearchableTrait;

     protected $searchable = [
       'columns' => [
           'employees.code' => 10,
           'employees.name' => 10,
           'employees.email' => 10,
           'employees.role' => 10,
           'employees.joining_date' => 10,
           'employees.current_address' => 10,
           'employees.phone_number' => 10,
           'employees.department' => 10,
           'employees.duty_station' => 10,
           'employees.id' => 10,
       ]
     ];

     protected $fillable = [
         'code','name','email','role','joining_date',
         'current_address','phone_number','department','duty_station',
     ];*/
}
