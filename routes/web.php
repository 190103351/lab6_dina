<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function() {
    DB::insert('insert into students(ID, Name, DateOfBirth, GPA, Advisor) values(?,?,?,?,?)',
    [190103580, '', '2001-04-18', 2.8, 'Marzhan']);

    DB::insert('insert into students(ID, Name, DateOfBirth, GPA, Advisor) values(?,?,?,?,?)',
    [180103541, 'Adilet', '2000-06-02', 2.9, 'Ualikhan']);
});

Route::get('/select', function(){
    $results=DB::select('select * from students where id=?',[180103541]);
    foreach($results as $students){
        echo "ID is: ".$students->ID;
        echo "<br>";
        echo "Name is: ".$students->Name;
        echo "<br>";
        echo "Date of birth is: ".$students->DateOfBirth;
        echo "<br>";
        echo "GPA is: ".$students->GPA;
        echo "<br>";
        echo "Advisor is: ".$students->Advisor;
        echo "<br>";
    }
});

Route::get('/update', function(){
    $updated=DB::update('update students set Name="Daniyal" where ID=?', [190103580]);
    return $updated;
});

Route::get('/delete', function(){
    $deleted=DB::delete('delete from students where id=?',[190103580]);
    return $deleted;
});


Route::get('/read', function(){
    $students=Student::all();
    foreach($students as $student){
        echo $student->GPA;
        echo "<br>";
        
    }
});

Route::get('/find', function(){
    $students=Student::find(180103541);
    return $students->GPA;
});

Route::get('/insert2', function(){
    $student=new Student;
    $student->ID=200103221;
    $student->Name='Arman';
    $student->DateOfBirth='2003-08-30';
    $student->GPA=2.9;
    $student->Advisor='Altyn';
    $student->save();
});

Route::get('/update2', function(){
    $student=Student::find(200103221);
    $student->Name='Almas';
    $student->update();
});

Route::get('/delete2', function(){
    $student=Student::find(180103541);
    $student->delete();
});