@php
    $getCurrentUserRoleName = getCurrentUserRoleName();
@endphp

@if ($getCurrentUserRoleName == 'User')
    @include('layouts.user-sidebar')
@elseif($getCurrentUserRoleName == 'SubAdmin')
    @include('layouts.subAdmin-sidebar')
@elseif($getCurrentUserRoleName == 'RestaurantStaff')
    @include('layouts.restaurant-staff-sidebar')
@else
    @include('layouts.admin-sidebar')
@endif
