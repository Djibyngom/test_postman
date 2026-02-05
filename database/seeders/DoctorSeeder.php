<?php

// database/seeders/DoctorSeeder.php

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create([
            'name'=>'Dr. Laurent Petit', 'specialty'=>'Cardiologie',
            'license_number'=>'MED-2019-00142', 'experience_years'=>15,
            'is_active'=>true, 'bio'=>'Cardiologue spécialisé en chirurgie …',
        ]);
        Doctor::create([
            'name'=>'Dr. Claire Moreau', 'specialty'=>'Orthopédie',
            'license_number'=>'MED-2020-00387', 'experience_years'=>8,
            'is_active'=>true, 'bio'=>'Chirurgienne orthopédique expérimentée …',
        ]);
        Doctor::create([
            'name'=>'Dr. Pierre Leconte', 'specialty'=>'Dermatologie',
            'license_number'=>'MED-2018-00521', 'experience_years'=>12,
            'is_active'=>false, 'bio'=>'Dermatologue en congé maladie …',
        ]);
    }
}
