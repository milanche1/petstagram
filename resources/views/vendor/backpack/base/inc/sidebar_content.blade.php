{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('pet') }}"><i class="nav-icon la la-paw"></i> Pets</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('owner') }}"><i class="nav-icon la la-user-friends"></i> Owners</a></li>
