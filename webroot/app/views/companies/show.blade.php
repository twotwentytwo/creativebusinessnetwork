@extends('layouts.master')

@section('content')
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
        <div class="grid clearfix">
            <div class="image g g-m-1-4">
                <img src="http://compostcreative.com/img/template/sharing.png" class="company_image" />
            </div>
            <div class="details g g-m-3-4">
                <h1>Compost Creative</h1>
                <p class="description">We are a creative studio producing visual effects and animation for TV, film and web. We love to bring stories &amp; ideas to life.</p>
                <p class="location">London</p>
                <ul class="action list--inline">
                    <li><a href="#" class="btn">Recommend</a></li>
                    <li><a href="#" class="btn">Business Card</a></li>
                    <li><a href="#" class="btn">Collaborate</a></li>
                </ul>
            </div>
        </div>
    @endif
    @if ($data->show_users)
        <div class="grid">
            <div class="g g-m-1-4">
                <div class="section">
                    <h2>Members</h2>
                    <ul>
                        @foreach($data->users_in_company as $user_in_company)
                            <li><a href="{{ URL::route('user_profile', array(
                                'key' => $user_in_company->getUser()->url_key()
                            )) }}">{{ $user_in_company->getUser()->getDisplayName() }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="section">
                    <h2>Followers</h2>
                    <ul class="followers list--inline">
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/andsmith.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/fisforfonts.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/baileybrown.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/robwilliams.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/dlm.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/silentstudios.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/lotteandbloom.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/welkiosk.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/flock.png" class="profile-image" /></a><li>
                    </ul>
                </div>
            </div>
            <div class="g g-m-3-4">
                <form>
                    <input type="text" placeholder="Share your work, recommend a business or post a project..." class="updates-input" />
                    <button class="btn">Update</button>
                </form>

                <div class="updates-container">
                    <ul class="updates">
                        <!-- needs refactoring - layout purely for demo purposes -->
                        <li class="update clearfix">
                            <!-- needs refactoring - layout purely for demo purposes -->
                            <div class="image">
                                <img src="http://compostcreative.com/img/template/sharing.png" class="company_image" />
                            </div>
                            <div class="update-content">
                                <p>For all you Angkor Wat / Lazer lovers out there... Here's a link to Episode 2 of <a href="#">#JungleAtlantis</a>. <a href="#">#LidarLidarLidar</a> <a href="#">#VFX</a></p>
                                <p class="date"><a href="#">Nov 16 2014</a></p>
                                <ul class="action list--inline">
                                    <li><a href="#" class="btn">Comment</a></li>
                                    <li><a href="#" class="btn">Share</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- needs refactoring - layout purely for demo purposes -->
                        <li class="update clearfix">
                            <div class="image">
                                <img src="http://twotwentytwo.co.uk/dev/cbn/andsmith.png" class="company_image" />
                            </div>
                            <div class="update-content">
                                <p><a hef="#">&amp;SMITH</a> collaborated with <a hef="#">Compost Creative</a> on a <a href="#">branding for ITV's The People's Story</a>. Check out the project here. <a href="#">#branding</a> <a href="#">#peoplestory</a></p>
                                <p class="date"><a href="#">Nov 14 2014</a></p>
                                <ul class="action list--inline">
                                    <li><a href="#" class="btn">Comment</a></li>
                                    <li><a href="#" class="btn">Share</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- needs refactoring - layout purely for demo purposes -->
                        <li class="update clearfix">
                            <div class="image">
                                <img src="http://twotwentytwo.co.uk/dev/cbn/dlm.png" class="company_image" />
                            </div>
                            <div class="update-content">
                                <p><a hef="#">DLM architects</a> recommend <a hef="#">Compost Creative</a>. Thanks for a great piece of work on our showreel. Great work! <a href="#">#compostcreative</a></p>
                                <p class="date"><a href="#">Nov 14 2014</a></p>
                                <ul class="action list--inline">
                                    <li><a href="#" class="btn">Comment</a></li>
                                    <li><a href="#" class="btn">Share</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- needs refactoring - layout purely for demo purposes -->
                        <li class="update clearfix">
                            <div class="image">
                                <img src="http://compostcreative.com/img/template/sharing.png" class="company_image" />
                            </div>
                            <div class="update-content">
                                <p>We had the amazing opportunity of working on the latest Unicef commercial. <a href="#">#unicef</a> <a href="#">#andrex</a></p>
                                <p class="date"><a href="#">Nov 12 2014</a></p>
                                <ul class="action list--inline">
                                    <li><a href="#" class="btn">Comment</a></li>
                                    <li><a href="#" class="btn">Share</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- needs refactoring - layout purely for demo purposes -->
                        <li class="update clearfix">
                            <!-- needs refactoring - layout purely for demo purposes -->
                            <div class="image">
                                <img src="http://compostcreative.com/img/template/sharing.png" class="company_image" />
                            </div>
                            <div class="update-content">
                                <p>Here's our <a href="#">#MakingOf</a> video for ITV's <a href="#">#ThePeoplesStory</a>. Which shows how we recreated WW1 shots of London from the air</p>
                                <p class="date"><a href="#">Nov 05 2014</a></p>
                                <ul class="action list--inline">
                                    <li><a href="#" class="btn">Comment</a></li>
                                    <li><a href="#" class="btn">Share</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
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
