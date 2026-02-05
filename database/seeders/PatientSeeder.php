
<?php
// database/seeders/PatientSeeder.php
class PatientSeeder extends Seeder
{
    public function run(): void
    {
        Patient::create([
            'first_name'=>'Marie',  'last_name'=>'Dupont',
            'email'=>'marie.dupont@email.com', 'phone'=>'0612345678',
            'birth_date'=>'1990-03-22', 'blood_group'=>'A+',
        ]);
        Patient::create([
            'first_name'=>'Jean',   'last_name'=>'Martin',
            'email'=>'jean.martin@email.com', 'phone'=>'0698765432',
            'birth_date'=>'1978-11-05', 'blood_group'=>'O-',
        ]);
        Patient::create([
            'first_name'=>'Sophie', 'last_name'=>'Bernard',
            'email'=>'sophie.bernard@email.com', 'phone'=>'0601020304',
            'birth_date'=>'2000-07-18', 'blood_group'=>'B+',
        ]);
    }
}
