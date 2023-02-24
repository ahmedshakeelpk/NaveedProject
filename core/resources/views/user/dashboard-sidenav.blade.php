<div class="user-info">
    <img class="mb-3 show-img img-demo"
        src="
    @if (Auth::user()->image) {{ asset('assets/front/img/' . Auth::user()->image) }}
    @else
    {{ asset('assets/admin/img/img-demo.jpg') }} @endif"
        alt="">
    <h4>{{ Auth::user()->name }}</h4>
</div>
<div class="user-menu">
    <ul>
        <li>
            <a class="@if (request()->path() == 'user/dashboard') active @endif" href="{{ route('user.dashboard') }}">
                {{ __('Dashboard') }} </a>
        </li>
        <hr class="bg-white" />
        <li>
            <a href="{{ route('user.apply.esl') }}"
                class="@if(Request::route()->getName() == 'user.apply.esl') active @endif"
            >
                ESL Instructor
            </a>
        </li>
        <li>
            <a href="{{ route('user.apply.study') }}"
                class="@if(Request::route()->getName() == 'user.apply.study') active @endif"
            >
                Study Abroad
            </a>
        </li>
        <li>
            <a href="{{ route('user.apply.asian') }}"
                class="@if(Request::route()->getName() == 'user.apply.asian') active @endif"
            >
                Asian Visa
            </a>
        </li>
        <li>
            <a href="{{ route('user.apply.me') }}"
                class="@if(Request::route()->getName() == 'user.apply.me') active @endif"
            >
                Middle East Visa
            </a>
        </li>
        <li>
            <a href="{{ route('user.apply.schengen') }}"
                class="@if(Request::route()->getName() == 'user.apply.schengen') active @endif"
            >
                Schengen Visa
            </a>
        </li>
        <li>
            <a href="{{ route('user.apply.travel') }}"
                class="@if(Request::route()->getName() == 'user.apply.travel') active @endif"
            >
                Travel Guide
            </a>
        </li>
        <li>
            <a href="{{ route('user.apply.import-export') }}"
                class="@if(Request::route()->getName() == 'user.apply.import-export') active @endif"
            >
                Import / Export Services
            </a>
        </li>
        <hr class="bg-white" />
        <li>
            <a class="@if (request()->path() == 'user/edit-profile') active @endif" href="{{ route('user.editprofile') }}">
                Edit Profile </a>
        </li>
        <li>
            <a class="@if (request()->path() == 'user/change-password') active @endif" href="{{ route('user.change_password') }}">
                {{ __('Change Password') }} </a>
        </li>
        <li>
            <a class="" href="{{ route('user.logout') }}"> {{ __('Logout') }} </a>
        </li>
    </ul>
</div>
