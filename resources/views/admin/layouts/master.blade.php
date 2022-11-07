<!DOCTYPE html>
<html lang="fa-IR">

<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')
</head>

<body dir="rtl">

    {{-- header --}}
    @include('admin.layouts.header')

    <section class="body-container">

        {{-- sidebar --}}
        @include('admin.layouts.sidebar')

        <section id="main-body" class="main-body">

            @yield('content')

        </section>
    </section>

    @include('admin.layouts.script')
    @yield('script')

    @include('admin.alerts.sweetalert.success')
    @include('admin.alerts.sweetalert.error')

    @include('admin.alerts.toast.success')
    @include('admin.alerts.toast.error')
</body>

</html>
