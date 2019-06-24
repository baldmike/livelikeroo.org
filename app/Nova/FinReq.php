<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;

use NovaButton\Button;

use Laravel\Nova\Panel;

use App\Nova\Metrics\AssistanceRequests;
use App\Nova\Metrics\AssistanceRequestsPerDay;
use App\Nova\Metrics\AssistanceRequestsByState;

use Illuminate\Http\Request;

use App\Nova\Filters\FinReqStatus;
use Laravel\Nova\Http\Requests\NovaRequest;


class FinReq extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\FinReq';

    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Assistance Requests';
    }

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
        'first_name', 'last_name', 'email', 'address_1', 'address_2', 'city', 'state', 'zip', 'pet_name', 'species', 'breed', 'age', 'gender', 'altered', 'about', 'image', 'diagnosis', 'diagnosis_date', 'previous_diagnosis', 'vet_first_name', 'vet_last_name', 'primary_clinic_name', 'primary_clinic_phone', 'primary_clinic_email', 'specialist', 'other_help', 'status'
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
            DateTime::make('Received', 'created_at')
                ->format('MMMM DD YYYY h:mm a')
                ->sortable()
                ->onlyOnIndex(),

            Text::make('Status')
                ->sortable()
                ->hideWhenUpdating(),

            Currency::make('award_amount')
                ->format('$%.2n')
                ->sortable()
                ->hideFromIndex(),
                

            new Panel('Requested By', $this->requestedByFields()),
            new Panel('For', $this->petFields()),
            new Panel('Medical Info', $this->medFields()),
            new Panel('Action', $this->actionFields()),
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function requestedByFields()
    {
        return [
            

            Text::make('First Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Last Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('email'),
                // ->updateRules('email,{{resourceId}}'),

            Text::make('Address 1')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Address 2')
                ->sortable()
                ->hideFromIndex()
                ->rules('max:255'),

            Text::make('City')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('State')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Zip')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),
            
        ];
    }


    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function petFields()
    {
        return [

            Text::make('Pet Name')
                    ->sortable()
                    ->rules('required', 'max:255'),

            Select::make('Species')
                    ->options([
                        'dog' => 'Dog', 
                        'cat' => 'Cat', 
                        'rabbit' => 'Rabbit', 
                        'bird' => 'Bird', 
                        'other' => 'Other'
                    ])
                    ->sortable()
                    ->hideFromIndex(),
            
            Text::make('Breed')
                    ->sortable()
                    ->hideFromIndex(),

            Number::make('Age')
                    ->sortable()
                    ->hideFromIndex(),

            Text::make('Gender')
                    ->sortable()
                    ->hideFromIndex(),

            Boolean::make('Altered')
                    ->sortable()
                    ->hideFromIndex(),

            Text::make('About')
                    ->sortable()
                    ->hideFromIndex(),

            Image::make('Image')
                    ->disk('local')
                    ->path('images')
                    ->hideFromIndex()
                    ->maxWidth(50),

            ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function medFields()
    {
        return [

            Text::make('Diagnosis')
                ->sortable()
                ->hideFromIndex(),

            Date::make('Diagnosis Date')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Previous Diagnosis')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Vet First Name')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Vet Last Name')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Primary Clinic Name')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Primary Clinic Phone')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Primary Clinic Email')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Specialist')
                ->sortable()
                ->hideFromIndex(),

            Text::make('Other Help')
                ->sortable()
                ->hideFromIndex(),

            HasMany::make('Medical Records', 'FinReqRecord', 'App\Nova\FinReqRecord'),

            HasMany::make('Notes', 'FinReqNote', 'App\Nova\FinReqNote')
        ];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function actionFields()
    {
        return [

            Button::make('Decline')
                ->event('App\Events\FinReqDecline')
                ->style('primary')
                ->confirm('This will email a declination letter to the requester and mark this request "declined", would you like to proceed?')
                ->hideFromIndex()
                ->reload(),

            Button::make('In Progess')
                ->event('App\Events\FinReqInProgress')
                ->style('primary')
                
                ->hideFromIndex()
                ->reload(),

            Button::make('Approve')
                ->event('App\Events\FinReqApprove')
                ->style('primary')
                ->confirm('This will email an award letter to the requester and mark this request "approved", would you like to proceed?')
                ->hideFromIndex()
                ->reload(),

            Button::make('Fund')
                ->event('App\Events\FinReqFund')
                ->style('primary')
                ->confirm('This will mark this request "funded". This assumes that all funds have been paid, and you have adjusted the "award amount" - would you like to proceed?')
                ->hideFromIndex()
                ->reload(),
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
            new AssistanceRequests,
            new AssistanceRequestsPerDay,
            new AssistanceRequestsByState
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
            new FinReqStatus
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
