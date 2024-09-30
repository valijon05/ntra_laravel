<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;

//use Illuminate\Database\Eloquent\Relations\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Number;
use  MoonShine\Fields\Relationships\HasMany;





/**
 * @extends ModelResource<Branch>
 */
class BranchResource extends ModelResource
{
    protected string $model = Branch::class;

    protected string $title = 'Branches';
    public string $column ="name";

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make("name")->sortable(),
            Text::make("address")->sortable(),
            HasMany::make("ads",relationName: "ads" ,resource: new AdResource())->onlyLink(),
        ];
    }
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make("name")->sortable(),


        ];
    }

    /**
     * @return list<Field>
     */


    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),


        ];
    }



    /**
     * @param Branch $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
