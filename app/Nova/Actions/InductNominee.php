<?php

namespace App\Nova\Actions;

use App\Models\Inductee;
use Illuminate\Support\Arr;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class InductNominee extends Action
{
    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $models->transform(function ($model) use ($fields) {
            if (Inductee::doesntExist($model)) {
                $inductee = Inductee::create(array_merge(Arr::except($model->toArray(), 'nominator_id'), ['class' => $fields->class]));
                if ($model->deceased) {
                    $inductee->relative()->associate($model->relative);
                }

                $inductee->save();
                $model->delete();

                return null;
            } else {
                return $model;
            }
        });

        return $models->filter()->isEmpty()
            ? Action::message('All nominees were inducted!')
            : ACtion::danger("Nominees with ID's {$models->implode('id',', ')} might already exist as inductees. Please check if the nominees exist as inductees. All other nominees were inducted.");
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Class'),
        ];
    }
}
