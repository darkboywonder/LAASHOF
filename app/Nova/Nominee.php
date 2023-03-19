<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
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

    public static $group = 'Nominations';

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Nominee>
     */
    public static $model = \App\Models\Nominee::class;

    /**
     * Get the value that should be displayed to represent the resource.
     *
     * @return string
     */
    public function title()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_name', 'last_name', 'gender', 'category'
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

            Text::make('First name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Last name')
                ->sortable()
                ->rules('required', 'max:255'),

            Date::make('Birthday')
                ->nullable()
                ->sortable(),

            Text::make('Gender')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Phone')
                ->nullable()
                ->hideFromIndex(),

            Text::make('Address')
                ->nullable()
                ->hideFromIndex(),

            Text::make('City')
                ->nullable()
                ->hideFromIndex(),

            Text::make('State')
                ->nullable()
                ->hideFromIndex(),

            Text::make('Zip')
                ->nullable()
                ->hideFromIndex(),

            Select::make('Category')->options([
                'athlete' => 'athlete',
                'coach' => 'coach',
                'offical' => 'offical',
                'contributor' => 'contributor'
            ])
                ->sortable()
                ->rules('required'),

            Boolean::make('deceased')
                ->sortable()
                ->rules('required'),

            Textarea::make('Accomplishment Summary')->nullable(),
            MorphTo::make('Nominator', 'nominatable')->types([
                Nominator::class,
                Administrator::class,
            ])->nullable()->showCreateRelationButton(),

            HasOne::make('Relative')->hideWhenUpdating(),

            DateTime::make('Nominated On', 'created_at')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),
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
