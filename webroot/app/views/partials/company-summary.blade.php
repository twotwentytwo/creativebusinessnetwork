<div class="company-summary grid">
    <div class="g g-1-4"><img src="http://compostcreative.com/img/template/sharing.png" /></div>
    <div class="g g-3-4">
    <h3><a href="{{ URL::route('companies_show', array(
        'key' => $company->url_entity()
    )) }}">{{ $company->name }}</a></h3>
    @if ($company->hasShortDescription())
        <p>{{ $company->short_description }}</p>
    @endif
    </div>
</div>