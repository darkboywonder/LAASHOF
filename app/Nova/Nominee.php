<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Nominee extends Resource
{

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     * @overrides
     */
    public static function label()
    {
        return 'Individual Nominees';
    }

    public static $group = 'Hall';

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Nominee>
     */
    public static $model = \App\Models\Nominee::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'first_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_name', 'last_name', 'phone', 'category',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('First name'),
            Text::make('Last name'),
            Date::make('Birthday'),
            Text::make('Gender'),
            Text::make('Phone'),
            Text::make('Address'),
            Text::make('City'),
            Text::make('State'),
            Text::make('Zip'),
            Select::make('Category')->options([
                'athlete' => 'athlete',
                'coach' => 'coach',
                'offical' => 'offical',
                'contributor' => 'contributor'
            ]),
            Boolean::make('deceased'),
            Textarea::make('Accomplishment Summary'),
            MorphTo::make('Nominator', 'nominatable')->types([
                User::class,
                Nominator::class,
                Administrator::class,
            ])->nullable()->showCreateRelationButton(),
            HasOne::make('Relative')->hideWhenUpdating(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [
            (new Actions\InductNominee)->showInline(),
        ];
    }
}
