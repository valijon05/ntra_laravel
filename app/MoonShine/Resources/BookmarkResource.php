<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bookmark;
use App\Models\Ad;
use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Bookmark>
 */
class BookmarkResource extends ModelResource
{
    protected string $model = Bookmark::class;

    protected string $title = 'Bookmarks';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make(column:'ad_id')->sortable(),
        Text::make('title', 'title',fn($model)=>Ad::find($model->ad_id)->title),

        ];
    }

    /**
     * @return list<Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),

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
     * @param Bookmark $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'ad_id' => ['required', 'exists:ads,id'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function indexQuery(): \Illuminate\Database\Eloquent\Collection
    {
        return Bookmark::with('ad')->get();
    }
}
