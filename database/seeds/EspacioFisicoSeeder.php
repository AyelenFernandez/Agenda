<?php

use Illuminate\Database\Seeder;
use App\Models\EspacioFisico;

class EspacioFisicoSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()

    {
        EspacioFisico::create([

			'esp_fisico'		=> 'Aula 1',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '35',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Aula 2',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '50',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Aula 3',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '35',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Aula 4',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '50',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Aula 5',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '50',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Aula 6',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '50',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Aula 7',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '150',
			'recursos' 			=> 'sillas',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Aula 8',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '70',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Aula 9',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '50',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Digital 1',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '150',
			'recursos' 			=> 'sonido - proyector - sillas',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Digital 2',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '50',
			'recursos' 			=> 'proyector',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Auditorio',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '150',
			'recursos' 			=> 'sonido - proyector',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Microcine',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '40',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Sala de Reunion',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '40',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Biblioteca',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '0',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Sala Exposicion 1',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '0',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Sala Exposicion 2',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '0',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Microbiologia',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '0',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Química/Biología',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '0',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Física/Matemática',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '0',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Patio',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '0',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Panta Alta',
			'ubicacion'			=> 'Planta Alta',
			'capacidad'			=> '0',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

		EspacioFisico::create([

			'esp_fisico'		=> 'Planta Baja',
			'ubicacion'			=> 'Planta Baja',
			'capacidad'			=> '0',
			'recursos' 			=> '-',
			'estado' 			=> true
		]);

    }

}

