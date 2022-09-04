<div class="cta-banner cta-banner__cover{% if singleAsso is defined %}{% if singleAsso %} cta-banner__asso{% endif %}{% endif %}">
    <div>
        <div>
            {!! $icon !!}
        </div>
        <div>
            @if ($singleAsso)
            <div>
            @endif
                <p class="title">{{ $title }}</p>
                <p>{{ $text }}</p>
            @if ($singleAsso)
            </div>
            <div>
            @endif
                <a href="{{ $url }}" @if($external) target="_blank" rel="noopener noreferrer"@endif>{{ $urlText }}<i class="fas fa-external-link-alt"></i></a>
            @if ($singleAsso)
            </div>
            @endif
        </div>
    </div>
</div>
