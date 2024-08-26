Model
    -> Migrations -> Adatbázis alap strukturáját tudod vele megfogalmazni
    -> Factory -> Fake adat megfogalmazására alkalmas


2 Tábla alap összekötése megkötések nélkül
    - create_job_listing_table.php 
        $table->foreignIdFor(Employer::class); // Ez az oszlop az 'employers' tábla ID-jére fog hivatkozni
    
    - JobListingFactory.php
        'employer_id' => Employer::factory(), // Létrehoz egy új Employer-t és hozzárendeli az ID-t





// Ep 13-> belongsToMany


A belongsToMany kapcsolatot a Laravelben úgy definiáljuk, hogy mindkét modellben használjuk a belongsToMany metódust. Ez a kapcsolat arra utal, hogy az egyik modell több másik modellhez is tartozhat, és viszont. Például egy diák több kurzust is felvehet, és egy kurzus több diáknak is lehet résztvevője.

Példa: Student és Course modellek
Tábla Struktúra:

Students (Diákok)
id	name
1	Alice
2	Bob
Courses (Kurzusok)
id	title
1	Math 101
2	History 202
course_student (Kapcsolótábla)
student_id	course_id
1	1
1	2
2	1
Laravel Eloquent Kapcsolat Definiálása
Student Modell:

php
Kód másolása
class Student extends Model
{
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
Course Modell:

php
Kód másolása
class Course extends Model
{
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
Magyarázat:
Student Modell: A courses metódus azt mondja meg, hogy egy diák több kurzushoz is tartozhat. Ezért használjuk a belongsToMany kapcsolatot. Laravel automatikusan az student_id és course_id oszlopokat fogja keresni a köztes course_student táblában.

Course Modell: A students metódus hasonlóan azt mondja, hogy egy kurzusnak több diákja is lehet. Itt is a belongsToMany kapcsolatot használjuk.

Összefoglalva:
Student::belongsToMany(Course): Egy diák több kurzust is felvehet.
Course::belongsToMany(Student): Egy kurzus több diáknak is otthont adhat.
A course_student tábla (student_id és course_id) tárolja a kapcsolatokat a diákok és kurzusok között, és a Laravel automatikusan kezeli ezt a táblát a belongsToMany kapcsolat használatával.






Ep 14 - Paginator

php artisan vendor:publish



Ep 15 - Seeding db

php artisan migrate:fresh --seed // Összes seeder lefuttatása
php artisan db:seed --class=JobListingSeeder // 1 seeder lefuttatása
