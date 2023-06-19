<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Text;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Http\Requests\NovaRequest;

class ScholarDocument extends Resource
{
    public static $displayInNavigation = false;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ScholarDocument>
     */
    public static $model = \App\Models\ScholarDocument::class;

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
        'id', 'name',
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
            File::make('Document', 'path')
                ->download(function ($request, $model, $disk, $value) {
                    return Storage::download($model->path, $model->name);
                })
                ->store(function (Request $request, $model) {

                    return [
                        'path' => $request->path->store('documents'),
                        'name' => $request->path->getClientOriginalName(),
                        'extension' => $request->path->getClientOriginalExtension(),
                        'size' => $request->path->getSize(),
                    ];
                })
                ->prunable()
                ->rules('required'),

            Text::make('Name')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->rules('required', 'max:255'),

            Text::make('Size')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->rules('required', 'max:255'),

            Text::make('Extension')
                ->sortable()
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->rules('required', 'max:255'),
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
