<!DOCTYPE html>
<html lang="en">

<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>

<body>

    @include('customer.layouts.header')

    <aside>
        @include('customer.layouts.sidebar')
    </aside>


    @include('admin.alerts.toast.success')
    @include('admin.alerts.toast.error')
    @include('admin.alerts.alert-section.success')
    @include('admin.alerts.sweetalert.success')

    <main id="main-body-one-col" class="main-body">

        @yield('content')

    </main>

    @include('customer.layouts.footer')

    @include('customer.layouts.script')
    @yield('script')

</body>

</html>
