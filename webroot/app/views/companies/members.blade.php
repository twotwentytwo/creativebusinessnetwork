@extends('layouts.master')

@section('content')
<div class="grid"><!--
    --><div class="g">
        <h1>@if ($data->parent_company)
            <a href="{{ URL::route('companies_show', array(
                        'key' => $data->parent_company->url_entity()
                    )) }}">{{ $data->parent_company->name }}</a>:
            @endif
            {{ $data->company->name }}</h1>
    </div><!--
--></div>

<div class="grid"><!--
--><div class="g">
        <h2>Members</h2>
        <table>

            @foreach($data->users_in_company as $user_in_company)
            <tr>
                <td><a href="{{ URL::route('user_profile', array(
                'key' => $user_in_company->getUser()->url_key()
            )) }}">{{ $user_in_company->getUser()->getDisplayName() }}</a></td>
                <td>{{ $user_in_company->getStatusText() }}</td>
                <td>
                    @if ($data->visitor_is_admin &&
                    !$user_in_company->getUser()->sameAs(Auth::user()))
                    <form action="{{ $data->update_url }}" method="post">
                        <input type="hidden" name="return_url" value="{{ $data->return_url }}" />
                        <input type="hidden" name="user_id" value="{{ $user_in_company->getUser()->id }}" />
                        @if ($user_in_company->isAdmin())
                        <input type="hidden" name="status" value="unadmin" />
                        <button class="btn" type="submit"><i class="fa fa-check"></i> Remove admin</button>
                        @else
                        <input type="hidden" name="status" value="admin" />
                        <button class="btn" type="submit"><i class="fa fa-check"></i> Make admin</button>
                        @endif
                    </form>
                    @endif
                </td>
                <td>
                    @if ($data->visitor_is_admin &&
                    !$user_in_company->getUser()->sameAs(Auth::user()) &&
                    $user_in_company->isAwaitingApproval())
                    <form action="{{ $data->update_url }}" method="post">
                        <input type="hidden" name="return_url" value="{{ $data->return_url }}" />
                        <input type="hidden" name="user_id" value="{{ $user_in_company->getUser()->id }}" />
                        <input type="hidden" name="status" value="approve" />
                    <button class="btn" type="submit"><i class="fa fa-check"></i> Approve</button>
                    </form>
                    @endif
                </td>
                <td>
                    @if ($data->visitor_is_admin &&
                         !$user_in_company->getUser()->sameAs(Auth::user()))
                    <form action="{{ $data->update_url }}" method="post">
                        <input type="hidden" name="return_url" value="{{ $data->return_url }}" />
                        <input type="hidden" name="user_id" value="{{ $user_in_company->getUser()->id }}" />
                        <input type="hidden" name="status" value="delete" />
                        <button class="btn" type="submit"><i class="fa fa-ban"></i> Delete</button>
                    </form>
                    @endif
                </td>
            @endforeach
        </table>
    </div></div>
@stop
