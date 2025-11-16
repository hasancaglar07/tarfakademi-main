<!-- Language Switcher Component -->
<div class="language-switcher dropdown">
    <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="feather icon-feather-globe me-2"></i>
        @switch(app()->getLocale())
            @case('tr')
                🇹🇷 TR
                @break
            @case('en')
                🇺🇸 EN
                @break
            @case('ar')
                🇸🇦 AR
                @break
            @default
                🇹🇷 TR
        @endswitch
    </button>
    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
        <li>
            <a class="dropdown-item {{ app()->getLocale() === 'tr' ? 'active' : '' }}" href="{{ route('language.switch', 'tr') }}">
                🇹🇷 Türkçe
            </a>
        </li>
        <li>
            <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}" href="{{ route('language.switch', 'en') }}">
                🇺🇸 English
            </a>
        </li>
        <li>
            <a class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}" href="{{ route('language.switch', 'ar') }}">
                🇸🇦 العربية
            </a>
        </li>
    </ul>
</div>
