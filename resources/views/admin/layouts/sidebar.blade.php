<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.index') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            <section class="sidebar-part-title">بخش فروش</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>ویترین</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('category.index') }}">دسته بندی</a>
                    <a href="{{ route('property.index') }}">فرم کالا</a>
                    <a href="{{ route('brand.index') }}">برندها</a>
                    <a href="{{ route('product.index') }}">کالاها</a>
                    <a href="{{ route('store.index') }}">انبار</a>
                    <a href="{{ route('comment.index') }}">نظرات</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>سفارشات</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.market.order.newOrder') }}"> جدید</a>
                    <a href="{{ route('admin.market.order.sending') }}">در حال ارسال</a>
                    <a href="{{ route('admin.market.order.unpaid') }}">پرداخت نشده</a>
                    <a href="{{ route('admin.market.order.canceled') }}">باطل شده</a>
                    <a href="{{ route('admin.market.order.returned') }}">مرجوعی</a>
                    <a href="{{ route('admin.market.order.all') }}">تمام سفارشات</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>پرداخت ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.market.payment.index') }}">تمام پرداخت ها</a>
                    <a href="{{ route('admin.market.payment.index') }}">پرداخت های آنلاین</a>
                    <a href="{{ route('admin.market.payment.index') }}">پرداخت های آفلاین</a>
                    <a href="{{ route('admin.market.payment.index') }}">پرداخت در محل</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>تخفیف ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.market.discount.copan') }}">کوپن تخفیف</a>
                    <a href="{{ route('admin.market.discount.commonDiscount') }}">تخفیف عمومی</a>
                    <a href="{{ route('admin.market.discount.amazingSale') }}">فروش شگفت انگیز</a>
                </section>
            </section>

            <a href="{{ route('delivery.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>روش های ارسال</span>
            </a>



            <section class="sidebar-part-title">بخش محتوی</section>
            <a href="{{ route('content.category.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی</span>
            </a>
            <a href="{{ route('post.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پست ها</span>
            </a>
            <a href="{{ route('content.comment.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>نظرات</span>
            </a>
            <a href="{{ route('menu.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>منو</span>
            </a>
            <a href="{{ route('faq.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>سوالات متداول</span>
            </a>
            <a href="{{ route('page.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پیج ساز</span>
            </a>



            <section class="sidebar-part-title">بخش کاربران</section>
            <a href="{{ route('admin-user.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>کاربران ادمین</span>
            </a>
            <a href="{{ route('customer.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>مشتریان</span>
            </a>
            <a href="{{ route('role.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>سطوح دسترسی</span>
            </a>



            <section class="sidebar-part-title">تیکت ها</section>
            <a href="{{ route('ticket.new-ticket') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های جدید</span>
            </a>
            <a href="{{ route('ticket.open-ticket') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های باز</span>
            </a>
            <a href="{{ route('ticket.close-ticket') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های بسته</span>
            </a>



            <section class="sidebar-part-title">اطلاع رسانی</section>
            <a href="{{ route('email.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اعلامیه ایمیلی</span>
            </a>
            <a href="{{ route('sms.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اعلامیه پیامکی</span>
            </a>



            <section class="sidebar-part-title">تنظیمات</section>
            <a href="{{ route('setting.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تنظیمات</span>
            </a>

        </section>
    </section>
</aside>
