@extends('layouts.master')

@section('content')
    <div class="grid">
        <div class="g">
            
        </div>
    </div>
    @if ($data->divisions_count)
        <div class="grid">
            <div class="g">
                <h2>Divisions</h2>
                <ul>
                @foreach($data->divisions as $company)
                    <li><a href="{{ URL::route('companies_show', array(
                        'key' => $company->url_entity()
                    )) }}">{{ $company->name }}</a></li>
                @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if ($data->show_users)
        <div class="grid">
            <div class="image g g-m-1-3">
                <img src="http://compostcreative.com/img/template/sharing.png" class="company_image" />
            </div>
            <div class="details g g-m-2-3">
                <h1>@if ($data->parent_company)
                    <a href="{{ URL::route('companies_show', array(
                        'key' => $data->parent_company->url_entity()
                        )) }}">{{ $data->parent_company->name }}</a>:
                    @endif
                        {{ $data->company->name }}
                </h1>
                <p class="description">We are a creative studio producing visual effects and animation for TV, film and web. We love to bring stories &amp; ideas to life.</p>
                <h3>Actions</h3>
                <ul>
                    <li><a href="#">Recommend</a></li>
                    <li><a href="#">Join</a></li>
                </ul>
            </div>
        </div>
    @endif
    @if ($data->show_users)
        <div class="grid">
            <div class="g contact">
                <h2>Contact details</h3>
                <p class="url"><a href="http://compostcreative.com">http://compostcreative.com</a></p>
                <p class="email"><a href="mailto:info@compostcreative.com">info@compostcreative.com</a></p>
                <p class="telephone">0208 5467384</p>
                <p class="twitter">@compostcreative</p>
                <p class="address">Buzzer 9<br>24-26 Shacklewell Lane<br>London<br>E8 2EZ</p>
                
            </div>
        </div>
    @endif
    @if ($data->show_users)
        <div class="grid">
            <div class="g">
                <h2>Members</h2>
                <ul>
                    @foreach($data->users_in_company as $user_in_company)
                    <li><a href="{{ URL::route('user_profile', array(
                                'key' => $user_in_company->getUser()->url_key()
                            )) }}">{{ $user_in_company->getUser()->getDisplayName() }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    
    @if (Auth::user() && !$data->visitor_in_company)
        <p>
            <form method="post" action="{{ URL::route('company_membership', array(
                    'key' => $data->company->url_entity()
                )) }}">
                <input type="hidden" name="return_url" value="{{ URL::route('companies_show', array(
                    'key' => $data->company->url_entity()
                )) }}" />
                <input type="hidden" name="status" value="join" />
                <button type="submit">Join company</button>
            </form>
        </p>
    @endif
@stop
