<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enums\Gender;
use Faker\Core\Number;
use Faker\Provider\Text;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ad;

use MoonShine\Fields\Enum;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Ad>
 */
class AdResource extends ModelResource
{
    protected string $model = Ad::class;

    protected string $title = "E'lonlar";

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                \MoonShine\Fields\Text::make("title"),
                \MoonShine\Fields\Text::make("description")->hideOnIndex(),
                Textarea::make("address"),
                \MoonShine\Fields\Number::make("rooms")->sortable(),
                \MoonShine\Fields\Number::make("price")->sortable(),
                Enum::make("gender")->attach(Gender::class)->sortable(),
                BelongsTo::make(label: 'branch',relationName: 'branch' , resource: new BranchResource()),
                BelongsTo::make(label: 'status', resource: new StatusResource()),
                BelongsTo::make(label: 'user', resource: new UserResource()),
                BelongsTo::make(label: 'Mualif',relationName: 'owner' ,resource: new  UserResource()),
                HasMany::make("images",relationName: "images" ,resource: new ImagesResource())->onlyLink(),


            ]),
        ];
    }

    /**
     * @param Ad $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
