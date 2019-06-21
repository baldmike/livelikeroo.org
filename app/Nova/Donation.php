<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Select;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

use App\Nova\Filters\SelectedFund;
use App\Nova\Filters\DonationFrequency;
use App\Nova\Filters\DonationAmount;

use App\Nova\Metrics\DonationsTotal;
use App\Nova\Metrics\DonationsByFund;
use App\Nova\Metrics\DonationsPerDay;

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
    public static $title = 'name_on_card';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'amount', 'name_on_card', 'first_name', 'last_name', 'email', 'honoree', 'recipient_name', 'recipient_email', 'recipient_msg', 'fund'
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

            new Panel('Donation Information', $this->donationFields()),

            new Panel('Donor', $this->donorFields()),

            new Panel('Memorial Information', $this->memorialFields()),

        ];  
    }

    /**
     * Get the donor fields for the resource.
     *
     * @return array
     */
    protected function donorFields()
    {
        return [
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
        ];
    }
    /**
     * Get the donation-specific fields for the resource.
     *
     * @return array
     */
    protected function donationFields()
    {
        return [
            // ID::make()->sortable()
            //     ->hideFromIndex(),
            
            Select::make('Fund')
                ->options([
                    'roo' => 'Roo',
                    'booker' => 'Booker',
                    'maggie' => 'Maggie',
                    'cappy' => 'Cappy',
                    'serenity' => 'Serenity'
                ])
                ->sortable(),
                
            DateTime::make('Made On', 'created_at')
                ->format('MMMM DD YYYY h:mm a')
                ->sortable(),

            Text::make('Name On Card')
                ->sortable()
                ->rules('required', 'max:255'),

            Currency::make('Amount')
                ->format('$%.2n')
                ->sortable(),

            Select::make('Frequency')
                ->options([
                    'one-time' => 'One-Time',
                    'monthly' => 'Monthly'
                ])
                ->sortable(),
        ];
    }

    /**
     * Get the in Memory Of fields for the resource.
     *
     * @return array
     */
    protected function memorialFields()
    {
        return[
            Boolean::make('In Memory')
                ->hideFromIndex()
                ->trueValue('1')
                ->falseValue('0')
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
                ->sortable()
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
            new DonationsTotal,
            new DonationsPerDay,
            new DonationsByFund
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
        return [
            new SelectedFund,
            new DonationFrequency,
            new DonationAmount
        ];
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
