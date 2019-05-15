<?php

namespace App\Nova\Lenses;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Panel;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Http\Requests\LensRequest;
use App\Nova\Actions\sendCarePackage;
use NovaButton\Button;

class CarePackagesToSend extends Lens
{
    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->where('sent', 0)->orderBy('created_at', 'desc')
        ));
    }

     /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            new Panel('Request Information', $this->cpRequestFields()),

            new Panel('Shipping Label', $this->labelFields()),

            new Panel('Pet Information', $this->petFields()),

        ];
    }

    /**
     * Get the donor fields for the resource.
     *
     * @return array
     */
    protected function cpRequestFields()
    {
        return [
            ID::make('ID', 'id')
                ->hideFromIndex(),
            
            DateTime::make('Created At')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Boolean::make('Sent')
                ->sortable(),

            Button::make('send')
                ->event('App\Events\CarePackageSent')
                ->style('primary')
                ->reload()
        ];
    }

    /**
     * Get the donor fields for the resource.
     *
     * @return array
     */
    protected function petFields()
    {
        return [
            Text::make('Pet Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('About')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255')
                ->hideFromIndex(),
                
            Image::make('Image')->disk('local')
                ->hideFromIndex()
                ->maxWidth(50),
        ];
    }
    /**
     * Get the donor fields for the resource.
     *
     * @return array
     */
    protected function labelFields()
    {
        return [
            Text::make('First Name')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Last Name')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Address 1')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Address 2')
                ->sortable()
                ->hideFromIndex()
                ->rules('max:255'),

            Text::make('city')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('state')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('zip')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),
        ];

    }

    /**
     * Get the filters available for the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available on the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return parent::actions($request);
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'active-c-p-request';
    }
}
