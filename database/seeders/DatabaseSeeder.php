<?php

namespace Database\Seeders;

use App\Models\Contacto;
use App\Models\Telefono;
use App\Models\Email;
use App\Models\Direccion;
use Illuminate\Database\Seeder;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Instanciar PhoneNumberUtil para formatear los números de teléfono
        $phoneUtil = PhoneNumberUtil::getInstance();
        $faker = FakerFactory::create();

        // Crear 5000 contactos, cada uno con 2 teléfonos, 2 emails, y 2 direcciones
        Contacto::factory(5000)->create()->each(function ($contacto) use ($phoneUtil, $faker) {
            
            // Crear teléfonos para cada contacto
            Telefono::factory(2)->create([
                'contacto_id' => $contacto->id,
                'numero' => $this->generatePhoneNumber($phoneUtil, $faker, 'US'), 
            ]);

            // Crear emails para cada contacto
            Email::factory(2)->create([
                'contacto_id' => $contacto->id,
            ]);

            // Crear direcciones para cada contacto
            Direccion::factory(2)->create([
                'contacto_id' => $contacto->id,
            ]);
        });
    }

    // Función para generar y formatear números de teléfono
    private function generatePhoneNumber($phoneUtil, $faker, $region)
    {
        try {
            $phoneNumber = $phoneUtil->parse($faker->phoneNumber, $region);
            return $phoneUtil->format($phoneNumber, PhoneNumberFormat::E164);
        } catch (\libphonenumber\NumberParseException $e) {
            return '+0000000000'; 
        }
    }
}
