<?php

// database/seeders/AppointmentSeeder.php

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        // RDV 1 : Marie (id=1) avec Dr. Petit (id=1)
        Appointment::create([
            'patient_id'=>1, 'doctor_id'=>1,
            'appointment_date'=>'2026-03-15 10:00:00',
            'reason'=>'Consultation annuelle cardiologie',
            'status'=>'en_attente', 'notes'=>null,
        ]);
        // RDV 2 : Jean (id=2) avec Dr. Moreau (id=2)
        Appointment::create([
            'patient_id'=>2, 'doctor_id'=>2,
            'appointment_date'=>'2026-03-20 14:30:00',
            'reason'=>'Suivi fracture genou gauche',
            'status'=>'confirmé', 'notes'=>'Apporter les radios',
        ]);
        // RDV 3 : Sophie (id=3) avec Dr. Petit (id=1)
        Appointment::create([
            'patient_id'=>3, 'doctor_id'=>1,
            'appointment_date'=>'2026-04-02 09:00:00',
            'reason'=>'Électrocardiogramme preventif',
            'status'=>'annulé', 'notes'=>'Annulé par le patient',
        ]);
    }
}
