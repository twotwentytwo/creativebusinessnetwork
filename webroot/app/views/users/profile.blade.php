@extends('layouts.master')

@section('content')
    

    <div class="grid clearfix">
        <div class="image g g-m-1-3">
            <img src="https://scontent-a-ams.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/316129_10150875453480035_2023052290_n.jpg?oh=6b53ece98d7e9e28a797a1553cbe7cf9&oe=551DFCD0" class="company_image" />
        </div>
        <div class="details g g-m-2-3">
            <h1>{{ $data->user->getDisplayName() }}</h1>
            <p class="description">Web Developer &amp; Business Analyst</p>
            <p class="url"><a href="http://compostcreative.com">http://twotwentytwo.co.uk</a></p>
            <p class="telephone">0208 5467384</p>
            <p class="address">London</p>
            
        </div>
    </div>

    @if ($data->show_companies)
        
            <h2>Companies</h2>
            <ul>
            @foreach($data->companies_for_user as $company_for_user)
                <li><a href="{{ URL::route('companies_show', array(
                            'key' => $company_for_user->getCompany()->url_entity()
                        )) }}">{{ $company_for_user->getCompany()->name }}</a></li>
            @endforeach
            </ul>
        
    @endif
@stop
