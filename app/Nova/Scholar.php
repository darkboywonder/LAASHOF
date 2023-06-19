<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Scholar extends Resource
{
    public static $group = 'Scholarships';

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Scholar>
     */
    public static $model = \App\Models\Scholar::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_name', 'last_name', 'email',
    ];

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
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Avatar::make('Photo')->nullable(),

            Text::make('status')->nullable(),

            Text::make('First Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Last Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Phone')
                ->sortable()
                ->rules('required', 'max:255'),

            Email::make()
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Date::make('Birthday')
                ->sortable()
                ->rules('required')
                ->hideFromIndex(),

            Text::make('Address')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('City')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('State')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('Zip')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('High School')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Counselor Name')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Date::make('Graduation Date', 'graduation_date')
                ->sortable()
                ->rules('required')
                ->hideFromIndex(),

            Text::make('Anticpated Major', 'anticipated_major')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('College Name', 'college_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Date::make('Semester Start Date', 'semester_start_date')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Textarea::make('Accomplishment Summary', 'accomplishment_summary')
                ->required()
                ->hideFromIndex()
                ->hideFromIndex(),

            Textarea::make('Essay')
                ->required()
                ->hideFromIndex()
                ->hideFromIndex(),

            Textarea::make('Hardship Summary', 'barrier_summary')
                ->required()
                ->hideFromIndex(),

            Text::make('Year Awarded', 'year_awarded')
                ->sortable()
                ->rules('required', 'max:255'),

            HasOne::make('Guardian')
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            HasMany::make('Documents', 'documents', ScholarDocument::class)
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
        return [];
    }
}
