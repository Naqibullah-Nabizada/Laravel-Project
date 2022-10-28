<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\DiscountController;
use App\Http\Controllers\Admin\Market\GallaryController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\PropertyController;
use App\Http\Controllers\Admin\Market\StoreController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\User\RoleController;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.index');

    // !Star of market

    Route::prefix('market')->group(function () {

        Route::resource('/category', CategoryController::class);
        Route::resource('/brand', BrandController::class);
        Route::resource('/comment', CommentController::class);
        Route::resource('/delivery', DeliveryController::class);

        Route::prefix('discount')->group(function () {
            Route::get('/copan', [DiscountController::class, 'copan'])->name('admin.market.discount.copan');
            Route::get('/copan/create', [DiscountController::class, 'copanCreate'])->name('admin.market.discount.copan.create');
            Route::get('/common-discount', [DiscountController::class, 'commonDiscount'])->name('admin.market.discount.commonDiscount');
            Route::get('/common-discount/create', [DiscountController::class, 'commonDiscountCreate'])->name('admin.market.discount.commonDiscount.create');
            Route::get('/amazing-sale', [DiscountController::class, 'amazingSale'])->name('admin.market.discount.amazingSale');
            Route::get('/amazing-sale/create', [DiscountController::class, 'amazingSaleCreate'])->name('admin.market.discount.amazingSale.create');
        });

        Route::prefix('order')->group(function () {
            Route::get('/', [OrderController::class, 'all'])->name('admin.market.order.all');
            Route::get('/new-order', [OrderController::class, 'newOrder'])->name('admin.market.order.newOrder');
            Route::get('/sending', [OrderController::class, 'sending'])->name('admin.market.order.sending');
            Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.market.order.unpaid');
            Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.market.order.canceled');
            Route::get('/returned', [OrderController::class, 'returned'])->name('admin.market.order.returned');
            Route::get('/show', [OrderController::class, 'show'])->name('admin.market.order.show');
            Route::get('/change-send-status', [OrderController::class, 'changeSendStatus'])->name('admin.market.order.changeSendStatus');
            Route::get('/change-order-status', [OrderController::class, 'changeOrderStatus'])->name('admin.market.order.changeOrderStatus');
            Route::get('/cancel-order', [OrderController::class, 'cancelOrder'])->name('admin.market.order.cancelOrder');
        });

        Route::prefix('payment')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('admin.market.payment.index');
            Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
            Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
            Route::get('/attendance', [PaymentController::class, 'attendance'])->name('admin.market.payment.attendance');
            Route::get('/confirm', [PaymentController::class, 'confirm'])->name('admin.market.payment.confirm');
        });

        Route::resource('/product', ProductController::class);

        Route::get('/gallary', [GallaryController::class], 'index')->name('gallary.index');
        Route::get('/gallary/store', [GallaryController::class], 'store')->name('gallary.store');
        Route::get('/gallary/destroy/{id}', [GallaryController::class], 'destroy')->name('gallary.destroy');

        Route::resource('/property', PropertyController::class);
        Route::resource('/store', StoreController::class);
    });


    // !Start of Content

    Route::prefix('content')->group(function () {

        Route::prefix('category')->group(function () {
            Route::get('/', [ContentCategoryController::class, 'index'])->name('content.category.index');
            Route::get('/create', [ContentCategoryController::class, 'create'])->name('content.category.create');
            Route::get('/store', [ContentCategoryController::class, 'store'])->name('content.category.store');
            Route::get('/edit/{id}', [ContentCategoryController::class, 'edit'])->name('content.category.edit');
            Route::get('/update/{id}', [ContentCategoryController::class, 'update'])->name('content.category.update');
            Route::get('/destroy/{id}', [ContentCategoryController::class, 'destroy'])->name('content.category.destroy');
        });

        Route::prefix('comment')->group(function () {
            Route::get('/', [ContentCommentController::class, 'index'])->name('content.comment.index');
            Route::get('/show', [ContentCommentController::class, 'show'])->name('content.comment.show');
            Route::get('/store', [ContentCommentController::class, 'store'])->name('content.comment.store');
            Route::get('/edit/{id}', [ContentCommentController::class, 'edit'])->name('content.comment.edit');
            Route::get('/update/{id}', [ContentCommentController::class, 'update'])->name('content.comment.update');
            Route::get('/destroy/{id}', [ContentCommentController::class, 'destroy'])->name('content.comment.destroy');
        });

        Route::resource('/faq', FAQController::class);
        Route::resource('/menu', MenuController::class);
        Route::resource('/page', PageController::class);
        Route::resource('/post', PostController::class);
    });


    // ! Start of Admin-User

    Route::prefix('user')->group(function () {
        Route::resource('admin-user', AdminUserController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
    });


    // ! Start of Notify

    Route::prefix('notify')->group(function () {
        Route::resource('email', EmailController::class);
        Route::resource('sms', SMSController::class);
    });


    // ! Start of Ticket

    Route::resource('/ticket', TicketController::class);
    Route::get('ticket/show', [TicketController::class, 'show'])->name('ticket.show');
    Route::get('ticket/new-ticket', [TicketController::class, 'newTicket'])->name('ticket.new-ticket');
    Route::get('ticket/open-ticket', [TicketController::class, 'openTicket'])->name('ticket.open-ticket');
    Route::get('ticket/close-ticket', [TicketController::class, 'closeTicket'])->name('ticket.close-ticket');


    // ! Start of Setting

    Route::resource('setting', SettingController::class);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
