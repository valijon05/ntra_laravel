<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Ad;
use App\MoonShine\Resources\AdResource;


use App\MoonShine\Resources\BranchResource;
use App\MoonShine\Resources\ImagesResource;
use App\MoonShine\Resources\StatusResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;
use App\MoonShine\Resources\BookmarkResource;
class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),
            MenuItem::make("Home", url("/"))->icon("heroicons.home")->customLinkAttributes(['target'=>'_blank']),
            MenuItem::make("E'lonlar", new AdResource())->icon("heroicons.home-modern"),
            MenuItem::make("branch",new BranchResource())->icon("heroicons.map-pin"),
            MenuItem::make("status",new StatusResource())->icon("heroicons.check-circle"),
            MenuItem::make("user",new UserResource())->icon("heroicons.user-circle"),
            MenuItem::make("images",new ImagesResource())->icon("heroicons.photo"),
            MenuItem::make("Bookmarks", new BookmarkResource())->icon("heroicons.bookmark"),

        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
