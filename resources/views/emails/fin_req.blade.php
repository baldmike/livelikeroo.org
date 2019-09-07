@extends('layouts.email')

@section('headline')
    <h3>Financial Assistance Request Received</h3>
@stop

@section('content')

    <p>
        Hello {{ $fin_req->first_name }}, 
    </p>
    <p>
        Thank you for applying to Live Like Roo Foundation. We have received your application for financial assistance for {{ $fin_req->pet_name }}, and are currently reviewing it. We understand how difficult it is to receive a cancer diagnosis for your beloved pet, and we hope to be able to support you both emotionally and financially. Grants are awarded to qualified applicants one time monthly. Please follow the requirements below, for grant consideration. 
    </p>
    <ul>
        <li>
            Pets have a confirmed cancer diagnosis. (The board reserves the right to assist non confirmed cases, based on medical records and an established treatment plan, to confirm suspected diagnosis.)
        </li>
        <li>
            Veterinary records, estimates, +/- treatment plans will be submitted by the applicant or applicant's veterinarian to roofinancials@gmail.com.
        </li>
        <li>
            Application review will open on the 1st day of every month. Necessary medical records and estimates need to be submitted by 11:59 p.m. CST, the third Sunday, of said month.
        </li>
        <li>
            Please include, in the correspondence, the next scheduled appointment date, if applicable, of your pets upcoming veterinary appointment. 
        </li>
    </ul>

    <p> 
        Applications will only be considered for grants, with the above information. The application review process will be ongoing from the 1st of the month through the third Sunday of the month. After the review process is complete, grants will be awarded. Grants will range from $350-$1500. You will be notified, via email, if you have been awarded a grant. If awarded a grant, payments will be made to your veterinarian, directly. It will be your responsibility to inquire with your veterinarian's office to see if they will accept third party payments, via a credit card over the phone, or if they will accept a check via USPS.
    </p>
    <p>
        Please be respectful of the procedure and timeline for grant review. Calling and/or leaving messages on our social media pages, only creates additional work. We understand the urgency of your application, but we are a volunteer run organization so we appreciate your patience.
    </p>
    <p>
        In addition to applying to Live Like Roo Foundation, we encourage you to create a fundraising page, or a fundraising event for your pet. You will be very surprised how many people will step up to help! You can also find additional organizations that provide financial assistance to families who have pets with medical needs, by following this link:
    </p>
    <p>
        https://resources.bestfriends.org/article/financial-aid-pets
    </p>

    <p>
        We will be sending good thoughts to you and your pet and hoping for the best! When you have an opportunity, please share photos and stories with us. We love to see the faces behind the name and get to know them!
    </p>

    <br>

    <p>Sincerely,</p>
    <br><br>
    <p>Laura Krill</p>
    <p>Vice President and Medical Director</p>
    <p>The Live Like Roo Foundation</p>
    
@stop