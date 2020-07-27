<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="{{ route('page.index', 'dashboard') }}" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('img') }}/mosleys_logo.png">
            </div>
        </a>
        <a href="{{ route('page.index', 'dashboard') }}" class="simple-text logo-normal">
            {{ __('Mosley\'s') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Profiel aanpassen') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                <a href="{{ route('user.index') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __('Role management') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'redirect' ? 'active' : '' }}">
              <a href="https://folduxrp.nl/mosleys" target="_blank">
                <i class="nc-icon nc-compass-05"></i>
                  <p>{{ __('Mosley\'s website') }}</p>
              </a>
            </li>
            <li class="{{ $elementActive == 'logout' ? 'active' : '' }}">
              <a onclick="document.getElementById('formLogOut').submit();">
                <i class="nc-icon nc-button-play"></i>
                  <p>{{ __('Uitloggen') }}</p>
              </a>
            </li>
        </ul>
    </div>
</div>
