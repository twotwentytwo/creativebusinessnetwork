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
                <h1>Compost Creative
                @if ($data->visitor_can_edit)
                    <a href="{{ URL::route('companies_edit', array(
                          'key' => $data->company->url_word
                      )) }}">EDIT</a>
                @endif
                </h1>
                @if ($data->company->hasDescription())
                <p class="description">{{ $data->company->getLongestDescription() }}</p>
                @endif
                @if ($data->company->hasLocation())
                    <p class="location">{{ $data->company->location }}</p>
                @endif
                <ul class="action list--inline">
                    <li><a href="#" class="btn">Recommend</a></li>
                    <li><a href="#" class="btn">Connect</a></li>
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
                    <h2>Connections</h2>
                    <ul class="followers list--inline">
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/andsmith.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/fisforfonts.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/baileybrown.png" class="profile-image" /></a><li>
                        <li class="follower"><a href="#"><img src="http://twotwentytwo.co.uk/dev/cbn/resonate.png" class="profile-image" /></a><li>
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
                                </ul>
                            </div>
                        </li>
                        <!-- needs refa ctoring - layout purely for demo purposes -->
                        <li class="update clearfix">
                            <div class="image">
                                <img src="http://twotwentytwo.co.uk/dev/cbn/andsmith.png" class="company_image" />
                            </div>
                            <div class="update-content">
                                <p><a hef="#">&amp;SMITH</a> collaborated with <a hef="#">Compost Creative</a> on a <a href="#">branding for ITV's The People's Story</a>.</p>
                                <p class="date"><a href="#">Nov 14 2014</a></p>
                                <div class="showcase clearfix">
                                    <img src="http://twotwentytwo.co.uk/dev/cbn/ps1.png" />
                                    <img src="http://twotwentytwo.co.uk/dev/cbn/ps2.png" />
                                    <img src="http://twotwentytwo.co.uk/dev/cbn/ps3.png" />
                                </div>
                                
                                <div class="comment clearfix">
                                    <div class="image">
                                        <img src="http://compostcreative.com/img/template/sharing.png" class="company_image" />
                                    </div>
                                    <div class="update-content">
                                        <p>Great project - looking forward to working together again!</p>
                                        <p class="date"><a href="#">Nov 16 2014</a></p>
                                        <ul class="action list--inline">
                                            <li><a href="#" class="btn">Comment</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- needs refactoring - layout purely for demo purposes -->
                        <li class="update clearfix">
                            <div class="image">
                                <img src="http://twotwentytwo.co.uk/dev/cbn/dlm.png" class="company_image" />
                            </div>
                            <div class="update-content">
                                <p><a hef="#">DLM architects</a> recommended <a hef="#">Compost Creative</a></p>
                                <p class="date"><a href="#">Nov 14 2014</a></p>
                                <p class="quote">Compost Creative really helped us with our model work and we went on to win the pitch. We'd defintely work with them again.</p>
                                <div class="comment clearfix">
                                    <div class="image">
                                        <img src="http://compostcreative.com/img/template/sharing.png" class="company_image" />
                                    </div>
                                    <div class="update-content">
                                        <p>Nice one!</p>
                                        <p class="date"><a href="#">Nov 15 2014</a></p>
                                        <ul class="action list--inline">
                                            <li><a href="#" class="btn">Comment</a></li>
                                        </ul>
                                    </div>
                                </div>
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
