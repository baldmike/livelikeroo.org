<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\Password;
use App\Nova\Actions\sendCarePackage;
use NovaButton\Button;
use App\Events\CarePackageSent;
use App\Nova\Lenses\ActiveCPRequest;

use App\Nova\Metrics\CarePackageRequests;

class CarePackage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\CarePackage';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'email';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'first_name', 'last_name', 'email', 'address_1', 'address_2', 'city', 'state', 'zip', 'pet_name', 'species', 'about', 'diagnosis', 'image', 
    ];

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
            ID::make('ID', 'id'),
            
            DateTime::make('Created At')
                ->sortable(),

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
                ->hideFromIndex(),
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

            Text::make('Species')
                ->sortable()
                ->hideFromIndex(),

            Text::make('About')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),
                
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
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new CarePackageRequests
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [
            new ActiveCPRequest
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new sendCarePackage
        ];
    }
}
