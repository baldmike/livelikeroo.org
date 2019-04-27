<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Select;

class Donation extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Donation';

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
        'id', 'amount', 'name_on_card', 'first_name', 'last_name', 'email', 'in_memory', 'frequency', 'honoree', 'recipient_name', 'recipient_email', 'recipient_msg', 'fund'
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
            ID::make()->sortable()
                ->hideFromIndex(),
            
            DateTime::make('Created At')
                ->sortable(),

            Currency::make('Amount')->format('$%.2n')
                ->sortable(),

            Select::make('Frequency')
                ->options([
                    'one-time' => 'One-Time',
                    'monthly' => 'Monthly'
                ])
                ->sortable(),

            Select::make('Fund')
                ->options([
                    'roo' => 'Roo',
                    'booker' => 'Booker',
                    'maggie' => 'Maggie',
                    'cappy' => 'Cappy',
                    'serenity' => 'Serenity'
                ])
                ->sortable(),
        
            Text::make('Name On Card')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('First Name')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Last Name')
                ->hideFromIndex()    
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->hideFromIndex()
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email'),
                // ->updateRules('unique:users,email,{{resourceId}}'),

            Boolean::make('In Memory')
                ->hideFromIndex()
                ->sortable(),

            Text::make('Honoree')
                ->hideFromIndex()
                ->sortable(),

            Text::make('Recipient Name')
                ->hideFromIndex()
                ->sortable(),

            Text::make('Recipient Email')
                ->hideFromIndex()
                ->sortable(),

            Text::make('Recipient Msg')
                ->hideFromIndex()
                ->sortable(),                
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
        return [];
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
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
