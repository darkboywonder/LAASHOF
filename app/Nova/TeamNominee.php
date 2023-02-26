<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class TeamNominee extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\TeamNominee>
     */
    public static $model = \App\Models\TeamNominee::class;

    public static $group = 'Hall';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'sport', 'head_coach', 'assistant_coach', 'manager',
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

            Text::make('Name')->rules('required', 'max:255'),
            Text::make('Sport')->rules('required', 'max:255'),
            Text::make('Head Coach')->rules('max:255'),
            Text::make('Assistant Coach')->rules('max:255'),
            Text::make('Manager')->rules('max:255'),
            Select::make('Level')->options([
                'high-school' => 'High School',
                'recreational' => 'Recreational',
                'semi-pro' => 'Semi-pro',
                'other' => 'Other'
            ])->displayUsingLabels()->rules('required', 'max:255'),
            Textarea::make('Accomplishment Summary'),
            HasMany::make('Team Members', 'members'),
            HasOne::make('Nominator')->hideWhenUpdating()->nullable(),
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
        return [];
    }
}
