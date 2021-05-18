<?php

/**
 * Used for author_id relation
 */

namespace App\Models\User;

use App\Models\CashRegister\CashRegister;
use App\Models\Chat\Message;
use App\Models\Counterparty\Counterparty;
use App\Models\Country\PackingType;
use App\Models\Faq\Faq;
use App\Models\Faq\FaqCategory;
use App\Models\HtmlPage\HtmlPage;
use App\Models\LegalEntity\LegalEntity;
use App\Models\Location\Location;
use App\Models\Menu\MenuItem;
use App\Models\Position\Position;
use App\Models\Price\PriceCategory;
use App\Models\Project\Project;
use App\Models\Store\Store;
use App\Models\Store\StoreCategory;
use App\Models\TechnicalCard\TechnicalCard;
use App\Models\TechnicalCard\TechnicalCardCategory;
use App\Models\Vat\Vat;
use App\Models\Warehouse\Warehouse;
use App\Models\Counterparty\CounterpartyAgreement;
use App\Models\Counterparty\CounterpartyCategory;
use App\Models\Workplace\Workplace;
use Illuminate\Database\Eloquent\Relations\HasMany;
use LaravelMerax\FileServer\App\Models\File;

trait Author
{

    public function users(): HasMany
    {
        return $this->hasMany(self::class, 'author_id', 'id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'author_id');
    }

    public function authors(): HasMany
    {
        return $this->hasMany(self::class, 'author_id', 'id');
    }

    public function menuItems(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'author_id');
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class, 'author_id');
    }

    public function projectsAuthor(): HasMany
    {
        return $this->hasMany(Project::class, 'author_id');
    }

    public function countries(): HasMany
    {
        return $this->hasMany(PackingType::class, 'author_id');
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class, 'author_id');
    }

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class, 'author_id');

    }

    public function warehouses(): HasMany
    {
        return $this->hasMany(Warehouse::class, 'author_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'author_id');
    }

    public function faqCategories(): HasMany
    {
        return $this->hasMany(FaqCategory::class, 'author_id');
    }

    public function faq(): HasMany
    {
        return $this->hasMany(Faq::class, 'author_id');
    }

    public function htmlPages(): HasMany
    {
        return $this->hasMany(HtmlPage::class, 'author_id');
    }

    public function vat()
    {
        return $this->hasMany(Vat::class, 'author_id');
    }

    public function storeCategories()
    {
        return $this->hasMany(StoreCategory::class, 'author_id');
    }

    public function legalEntities()
    {
        return $this->hasMany(LegalEntity::class, 'author_id');
    }

    public function priceCategories()
    {
        return $this->hasMany(PriceCategory::class, 'author_id');
    }

    public function counterparties()
    {
        return $this->hasMany(Counterparty::class, 'author_id');
    }

    public function cashRegisters()
    {
        return $this->hasMany(CashRegister::class, 'author_id');
    }

    public function technicalCards()
    {
        return $this->hasMany(TechnicalCard::class, 'author_id');
    }

    public function counterpartyAgreements()
    {
        return $this->hasMany(CounterpartyAgreement::class, 'author_id');
    }

    public function counterpartyCategories()
    {
        return $this->hasMany(CounterpartyCategory::class, 'author_id');
    }

    public function technicalCardCategories()
    {
        return $this->hasMany(TechnicalCardCategory::class, 'author_id');
    }

    public function workplaces()
    {
        return $this->hasMany(Workplace::class, 'author_id');
    }
}
