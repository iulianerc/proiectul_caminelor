<?php


namespace App\Models\PDF;


use Illuminate\Database\Eloquent\Model;

class MainSheet extends Model
{
    public array $data = [
        'lang' => 'ru',
        'holder' => [
            'id' => 'ф/к 100260000038282',
            'name' => '"MIC-TAN" S.R.L.'
        ],
        'address' => 'МД-2072, ул.Индепегденцей, 44, оф.34,<br> мун.Кишинэу,<br> Республика Молдова',
        'representedBy' => [
            'name' => 'Costin Petru',
            'phone' => '0990712021045',
            'all' => [
                'en' => 'All authorized persons',
                'ro' => 'Toate persoanele autorizate',
                'ru' => 'Все уполномоченные лица'
            ]
        ],
        'replacement' => false,
        'usage' => 'Контейнеры, поддоны, упаковки, образцы и другие грузы, ввозимые в рамках торговой операции (вывоз баллонов для заправки проверочными газовыми смесями) ',
        'issuedBy' => 'Торгово-Промышленная Палата Республики Молдова МД-2004, г.Кишинэу, бул.Штефан чел Маре, 151, Республика Молдова ',
        'countries' => [
            'ALBANIA (AL )',
            'ALGERIA (DZ)',
            'ANDORRA (AD)',
            'AUSTRALIA (AU)',
            'AUSTRIA (AT)',
            'KINGDOM OF BAHRAIN (BH)',
            'BELARUS (BY)',
            'BELGIUM (BE)',
            'BOSNIA AND HERZEGOVINA (BA)',
            'BRAZIL (BR)',
            'BULGARIA (BG)',
            'CANADA (CA)',
            'CHILE (CL)',
            'CHINA (CN)',
            'COTE D\'IVOIRE (CI)',
            'CROATIA (HR)',
            'CYPRUS (CY)',
            'CZECH REPUBLIC (CZ)',
            'DENMARK (DK)',
            'ESTONIA (EE)',
            'FINLAND (FI)',
            'FRANCE (FR)',
            'GERMANY (DE)',
            'GIBRALTAR (GI)',
            'GREECE (GR)',
            'HONG KONG, CHINA (HK)',
            'HUNGARY (HU)',
            'ICELAND (IS)',
            'INDIA (IN)',
            'INDONESIA (ID)',
            'IRAN (IR)',
            'IRELAND (IE)',
            'ISRAEL (IL)',
            'ITALY (IT)',
            'JAPAN (JP)',
            'KOREA (KR)',
            'KAZAKHSTAN (KZ)',
            'LATVIA (LV)',
            'LEBANON (LB)',
            'LITHUANIA (LT)',
            'LUXEMBOURG (LU)',
            'MACAO, CHINA (MO)',
            'REPUBLIC OF MACEDONIA (MK)',
            'MADAGASCAR (MG)',
            'MALAYSIA (MY)',
            'MALTA (MT)',
            'MAURITIUS (MU)',
            'MEXICO (MX)',
            'MOLDOVA (MD)',
            'MONGOLIA (MN)',
            'MONTENEGRO (ME)',
            'MOROCCO (MA)',
            'NETHERLANDS (NL)',
            'NEW ZEALAND (NZ)',
            'NORWAY (NO)',
            'PAKISTAN (PK)',
            'POLAND (PL)',
            'PORTUGAL (PT)',
            'QATAR (QA)',
            'ROMANIA (RO)',
            'RUSSIAN FEDERATION (RU)',
            'SENEGAL (SN)',
            'SERBIA (RS)',
            'SINGAPORE (SG)',
            'SLOVAKIA (SK)',
            'SLOVENIA (SI)',
            'REPUBLIC OF SOUTH AFRICA (ZA)',
            'SPAIN (ES)',
            'SRI LANKA (LK)',
            'SWEDEN (SE)',
            'SWITZERLAND (CH)',
            'THAILAND (TH)',
            'TUNISIA (TN)',
            'TURKEY (TR)',
            'UKRAINE (UA)',
            'UNITED KINGDOM (GB)',
            'UNITED STATES (US)',
        ],
        'includedCountries' => [
            'MOLDOVA (MD)',
            'UKRAINE (UA)',
        ]
    ];
}
