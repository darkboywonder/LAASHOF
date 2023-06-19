<?php

namespace App\Nova;

use Masoudi\Nova\TextList;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Http\Requests\NovaRequest;

class Inductee extends Resource
{
    /**
     * Get the displayable label of the resource.
     *
     * @return string
     * @overrides
     */
    public static function label()
    {
        return 'Individual Inductees';
    }

    public static $group = 'Hall';

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Inductee>
     */
    public static $model = \App\Models\Inductee::class;

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
        'id', 'first_name', 'last_name', 'phone', 'category', 'sport', 'class',
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
            Avatar::make('Photo')->nullable(),
            Text::make('Class'),
            Text::make('First name'),
            Text::make('Last name'),
            Text::make('Nickname')
                ->nullable()
                ->hideFromIndex(),

            Text::make('Maiden Name')
                ->nullable()
                ->hideFromIndex(),

            Date::make('Birthday'),
            Text::make('Gender'),
            Text::make('Phone'),
            Email::make(),
            Text::make('Address')->hideFromIndex(),
            Text::make('City')->hideFromIndex(),
            Text::make('State')->hideFromIndex(),
            Text::make('Zip')->hideFromIndex(),
            Number::make('Blazer Size')->min(1)->step(1)->hideFromIndex(),
            Select::make('T-shirt Size', 't_shirt_size')->options([
                'extra-small' => 'xs',
                'small' => 's',
                'medium' => 'm',
                'large' => 'l',
                'extra-large' => 'xl',
                'xxl' => 'xxl',
                'xxxl' => 'xxxl',
            ])->hideFromIndex(),
            Select::make('Category')->options([
                'athlete' => 'athlete',
                'coach' => 'coach',
                'offical' => 'offical',
                'contributor' => 'contributor'
            ]),
            Text::make('Sport'),
            Boolean::make('deceased'),
            Textarea::make('Accomplishment Summary'),
            Textarea::make('Bio'),
            Textarea::make('Notes'),
            MultiSelect::make('League Types')->options([
                'recreational' => 'recreational',
                'scholastic' => 'scholastic',
            ])->hideFromIndex(),
            TextList::make('School Names')->placeholder('Type the school name and press enter to add. Add multiple!')->hideFromIndex(),
            TextList::make('Organization Names')->placeholder('Type the organization name and press enter to add. Add multiple!')->hideFromIndex(),
            MorphTo::make('Nominator', 'nominatable')->types([
                Nominator::class,
                Administrator::class,
            ])->nullable()->showCreateRelationButton(),
            HasOne::make('Relative')->hideWhenUpdating(),
            DateTime::make('Inducted On', 'created_at')
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
        return [];
    }
}
