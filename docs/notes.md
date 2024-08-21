Model
    -> Migrations -> Adatbázis alap strukturáját tudod vele megfogalmazni
    -> Factory -> Fake adat megfogalmazására alkalmas


2 Tábla alap összekötése megkötések nélkül
    - create_job_listing_table.php 
        $table->foreignIdFor(Employer::class); // Ez az oszlop az 'employers' tábla ID-jére fog hivatkozni
    
    - JobListingFactory.php
        'employer_id' => Employer::factory(), // Létrehoz egy új Employer-t és hozzárendeli az ID-t



