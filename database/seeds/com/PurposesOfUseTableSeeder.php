<?php

namespace seeds\com;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurposesOfUseTableSeeder extends Seeder
{
    private string $table = 'purposes_of_uses';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getDump() as $country) {
            $country['created_at'] = now();
            $country['updated_at'] = now();
            DB::table($this->table)->insertOrIgnore($country);
        }
    }

    private function getDump(): array
    {
        return [
            [
                'name' => 'Anexa B.1',
                'description_ro' => 'Privind mărfurile destinate să fie prezentate sau utilizate la expoziții tirguri, congrese sau manifestări similare',
                'description_en' => 'Annex concerning goods for display or use at exhibitions, fairs, meetings or similar events',
                'description_ru' => 'О товарах, подлежащих показу или использованию на выставках, ярмарках, симпозиумах и подобных мероприятиях',
            ],
            [
                'name' => 'Anexa B.2',
                'description_ro' => 'Privind echipamentul profesional',
                'description_en' => 'Annex concerning professional equipment',
                'description_ru' => 'О профессиональном оборудовании',
            ],
            [
                'name' => 'Anexa B.3',
                'description_ro' => 'Privind containerele, paletele, ambalajele, mostrele și alte mărfuri importate in cadrul unei operațiuni comerciale',
                'description_en' => 'Annex concerning containers, pallets, packings, samples and other goods imported in connection with a commercial operation',
                'description_ru' => 'О контейнерах, поддонах, упаковках, образцах и других товарах, ввезенных в связи с коммерческой операцией',
            ],
            [
                'name' => 'Anexa B.5',
                'description_ro' => 'Privind mărfurile importate cu scop educativ, științific sau cultural',
                'description_en' => 'Annex concerning goods imported for educational, scientific or cultural purposes',
                'description_ru' => 'О товарах, ввезенных для образовательных, научных или культурных целей',
            ],
            [
                'name' => 'Anexa B.6',
                'description_ro' => 'Privind efectele personale ale călătorilor și bunurile  importate in scop sportiv',
                'description_en' => 'Annex concerning travellers\' personal effectsand goods imported for sports purposes',
                'description_ru' => 'О личных вещах пассажиров и товарах, ввезенных для спортивных целей',
            ],
            [
                'name' => 'Anexa B.7',
                'description_ro' => 'Privind materialul de propagandă turistică',
                'description_en' => 'Annex concerning tourist publicity material',
                'description_ru' => 'О материалах, используемых в целях туристической рекламы',
            ],
            [
                'name' => 'Anexa B.9',
                'description_ro' => 'Privind mărfurile importate in scop umanitar',
                'description_en' => 'Annex concerning goods imported for humanitarian purposes',
                'description_ru' => 'О товарах, ввезенных в гуманитарных целях',
            ],
            [
                'name' => 'Anexa D',
                'description_ro' => 'Privind animalele',
                'description_en' => 'Annex concerning animals',
                'description_ru' => 'О животных',
            ],
            [
                'name' => 'Anexa E',
                'description_ro' => 'Privind mărfurile importate cu suspendarea parţială a drepturilor şi taxelor de import',
                'description_en' => 'Annex concerning goods imported with partial relief from import duties and taxes',
                'description_ru' => 'О ввозе товаров с частичным освобождением от уплаты ввозных пошлин и сборов',
            ],
        ];
    }
}
