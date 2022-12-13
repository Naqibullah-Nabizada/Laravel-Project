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
use App\Http\Controllers\Admin\Market\ProductColorController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\PropertyController;
use App\Http\Controllers\Admin\Market\PropertyValueController;
use App\Http\Controllers\Admin\Market\StoreController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\Ticket\TicketPriorityController;
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

    //! Start of market

    Route::prefix('market')->group(function () {

        Route::resource('/category', CategoryController::class);
        Route::resource('/brand', BrandController::class);
        Route::resource('/comment', CommentController::class);
        Route::resource('/delivery', DeliveryController::class);

        Route::prefix('discount')->group(function () {

            Route::prefix('copan')->group(function () {
                Route::get('/', [DiscountController::class, 'copan'])->name('admin.market.discount.copan');
                Route::get('/create', [DiscountController::class, 'copanCreate'])->name('admin.market.discount.copan.create');
                Route::post('/store', [DiscountController::class, 'copanStore'])->name('admin.market.discount.copan.store');
                Route::get('/edit/{id}', [DiscountController::class, 'copanEdit'])->name('admin.market.discount.copan.edit');
                Route::put('/update/{id}', [DiscountController::class, 'copanUpdate'])->name('admin.market.discount.copan.update');
                Route::delete('/destroy/{id}', [DiscountController::class, 'copanDestroy'])->name('admin.market.discount.copan.destroy');
            });


            Route::prefix('common-discount')->group(function () {

                Route::get('/', [DiscountController::class, 'commonDiscount'])->name('admin.market.discount.commonDiscount');
                Route::get('/create', [DiscountController::class, 'commonDiscountCreate'])->name('admin.market.discount.commonDiscount.create');
                Route::post('/store', [DiscountController::class, 'commonDiscountStore'])->name('admin.market.discount.commonDiscount.store');
                Route::get('/edit/{id}', [DiscountController::class, 'commonDiscountEdit'])->name('admin.market.discount.commonDiscount.edit');
                Route::put('/update/{id}', [DiscountController::class, 'commonDiscountUpdate'])->name('admin.market.discount.commonDiscount.update');
                Route::delete('/destroy/{id}', [DiscountController::class, 'commonDiscountDistroy'])->name('admin.market.discount.commonDiscount.destroy');
            });

            Route::prefix('amazing-sale')->group(function () {
                Route::get('/', [DiscountController::class, 'amazingSale'])->name('admin.market.discount.amazingSale');
                Route::get('/create', [DiscountController::class, 'amazingSaleCreate'])->name('admin.market.discount.amazingSale.create');
                Route::post('/store', [DiscountController::class, 'amazingSaleStore'])->name('admin.market.discount.amazingSale.store');
                Route::get('/edit/{id}', [DiscountController::class, 'amazingSaleEdit'])->name('admin.market.discount.amazingSale.edit');
                Route::put('/update/{id}', [DiscountController::class, 'amazingSaleUpdate'])->name('admin.market.discount.amazingSale.update');
                Route::delete('/destroy/{id}', [DiscountController::class, 'amazingSaleDestroy'])->name('admin.market.discount.amazingSale.destroy');
            });
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
            Route::get('/show{id}', [PaymentController::class, 'show'])->name('admin.market.payment.show');
            Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
            Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
            Route::get('/cash', [PaymentController::class, 'cash'])->name('admin.market.payment.cash');
            Route::get('/canceled/{id}', [PaymentController::class, 'canceled'])->name('admin.market.payment.canceled');
            Route::get('/returned/{id}', [PaymentController::class, 'returned'])->name('admin.market.payment.returned');
        });

        Route::resource('/product', ProductController::class);

        Route::prefix('product')->group(function () {

            //! Product Color
            Route::prefix('color')->group(function () {
                Route::get('/{id}', [ProductColorController::class, 'index'])->name('product.color.index');
                Route::get('/create/{id}', [ProductColorController::class, 'create'])->name('product.color.create');
                Route::post('/store/{id}', [ProductColorController::class, 'store'])->name('product.color.store');
                Route::get('/edit/{id}/{product}', [ProductColorController::class, 'edit'])->name('product.color.edit');
                Route::put('/update/{id}/{product}', [ProductColorController::class, 'update'])->name('product.color.update');
                Route::delete('/destroy/{id}/{product}', [ProductColorController::class, 'destroy'])->name('product.color.destroy');
            });


            //! Product Gallary
            Route::prefix('gallary')->group(function () {
                Route::get('/{id}', [GallaryController::class, 'index'])->name('product.gallary.index');
                Route::get('/create/{id}', [GallaryController::class, 'create'])->name('product.gallary.create');
                Route::post('/store/{id}', [GallaryController::class, 'store'])->name('product.gallary.store');
                Route::delete('/destroy/{id}/{product}', [GallaryController::class, 'destroy'])->name('product.gallary.destroy');
            });
        });



        Route::resource('/property', PropertyController::class);

        Route::prefix('property')->group(function () {
            Route::prefix('value')->group(function () {
                Route::get('/{id}', [PropertyValueController::class, 'index'])->name('property.value.index');
                Route::get('/create/{id}', [PropertyValueController::class, 'create'])->name('property.value.create');
                Route::post('/store/{id}', [PropertyValueController::class, 'store'])->name('property.value.store');
                Route::get('/edit/{id}/{value}', [PropertyValueController::class, 'edit'])->name('property.value.edit');
                Route::put('/update/{id}/{value}', [PropertyValueController::class, 'update'])->name('property.value.update');
                Route::delete('/destroy/{id}/{value}', [PropertyValueController::class, 'destroy'])->name('property.value.destroy');
            });
        });


        Route::prefix('store')->group(function () {
            Route::get('/', [StoreController::class, 'index'])->name('product.store.index');
            Route::get('/add-to-store/{id}', [StoreController::class, 'addToStore'])->name('product.store.add-to-store');
            Route::post('/store/{id}', [StoreController::class, 'store'])->name('product.store.store');
            Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('product.store.edit');
            Route::put('/update/{id}', [StoreController::class, 'update'])->name('product.store.update');
        });

        // //! Products Comments
        Route::prefix('comment')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('product.comment.index');
            Route::get('/show/{id}', [CommentController::class, 'show'])->name('product.comment.show');
            Route::post('/store', [CommentController::class, 'store'])->name('product.comment.store');
            Route::get('/edit/{id}', [CommentController::class, 'edit'])->name('product.comment.edit');
            Route::put('/update/{id}', [CommentController::class, 'update'])->name('product.comment.update');
            Route::delete('/destroy/{id}', [CommentController::class, 'destroy'])->name('product.comment.destroy');
            Route::get('/approve/{id}', [CommentController::class, 'approved'])->name('product.comment.approved');
            Route::get('/status/{id}', [CommentController::class, 'status'])->name('product.comment.status');
            Route::post('/answer/{id}', [CommentController::class, 'answer'])->name('product.comment.answer');
        });
    });


    //! Start of Content

    Route::prefix('content')->group(function () {

        Route::prefix('category')->group(function () {
            Route::get('/', [ContentCategoryController::class, 'index'])->name('content.category.index');
            Route::get('/create', [ContentCategoryController::class, 'create'])->name('content.category.create');
            Route::post('/store', [ContentCategoryController::class, 'store'])->name('content.category.store');
            Route::get('/edit/{id}', [ContentCategoryController::class, 'edit'])->name('content.category.edit');
            Route::put('/update/{id}', [ContentCategoryController::class, 'update'])->name('content.category.update');
            Route::delete('/destroy/{id}', [ContentCategoryController::class, 'destroy'])->name('content.category.destroy');
            Route::get('/status/{id}', [ContentCategoryController::class, 'status'])->name('content.category.status');
        });

        Route::prefix('comment')->group(function () {
            Route::get('/', [ContentCommentController::class, 'index'])->name('content.comment.index');
            Route::get('/show/{id}', [ContentCommentController::class, 'show'])->name('content.comment.show');
            Route::post('/store', [ContentCommentController::class, 'store'])->name('content.comment.store');
            Route::get('/edit/{id}', [ContentCommentController::class, 'edit'])->name('content.comment.edit');
            Route::put('/update/{id}', [ContentCommentController::class, 'update'])->name('content.comment.update');
            Route::delete('/destroy/{id}', [ContentCommentController::class, 'destroy'])->name('content.comment.destroy');
            Route::get('/approve/{id}', [ContentCommentController::class, 'approved'])->name('content.comment.approved');
            Route::get('/status/{id}', [ContentCommentController::class, 'status'])->name('content.comment.status');
            Route::post('/answer/{id}', [ContentCommentController::class, 'answer'])->name('content.comment.answer');
        });

        Route::resource('/faq', FAQController::class);
        Route::resource('/menu', MenuController::class);
        Route::resource('/page', PageController::class);
        Route::resource('/post', PostController::class);
    });


    //! Start of Admin-User

    Route::prefix('user')->group(function () {
        Route::resource('admin-user', AdminUserController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('role', RoleController::class);
        Route::get('role/permission-form/{role}', [RoleController::class, 'permissionForm'])->name('user.role.permission-form');
        Route::put('role/permission-update/{role}', [RoleController::class, 'permissionUpdate'])->name('user.role.permission-update');
        Route::resource('permission', PermissionController::class);
    });




    //! Start of Notify

    Route::prefix('notify')->group(function () {
        Route::resource('email', EmailController::class);
        Route::resource('sms', SMSController::class);

        //! email file

        Route::prefix('email-file')->group(function () {

            Route::get('/{id}', [EmailFileController::class, 'index'])->name('email-file.index');
            Route::get('/{id}/create', [EmailFileController::class, 'create'])->name('email-file.create');
            Route::post('/{id}/store', [EmailFileController::class, 'store'])->name('email-file.store');
            Route::get('/edit/{file}', [EmailFileController::class, 'edit'])->name('email-file.edit');
            Route::put('/update/{file}', [EmailFileController::class, 'update'])->name('email-file.update');
            Route::delete('/destroy/{file}', [EmailFileController::class, 'destroy'])->name('email-file.destroy');
        });
    });


    //! Start of Ticket
    Route::prefix('ticket')->group(function () {
        Route::resource('/', TicketController::class);

        Route::prefix('admin')->group(function () {
            Route::get('/', [TicketAdminController::class, 'index'])->name('ticket.admin.index');
            Route::get('/set/{id}', [TicketAdminController::class, 'set'])->name('ticket.admin.set');
        });

        Route::prefix('category')->group(function () {
            Route::get('/', [TicketCategoryController::class, 'index'])->name('ticket.category.index');
            Route::get('/create', [TicketCategoryController::class, 'create'])->name('ticket.category.create');
            Route::post('/store', [TicketCategoryController::class, 'store'])->name('ticket.category.store');
            Route::get('/edit/{id}', [TicketCategoryController::class, 'edit'])->name('ticket.category.edit');
            Route::put('/update/{id}', [TicketCategoryController::class, 'update'])->name('ticket.category.update');
            Route::delete('/destroy/{id}', [TicketCategoryController::class, 'destroy'])->name('ticket.category.destroy');
            Route::get('/status/{id}', [TicketCategoryController::class, 'status'])->name('ticket.category.status');
        });

        Route::resource('/priority', TicketPriorityController::class);

        Route::get('/', [TicketController::class, 'index'])->name('ticket.index');
        Route::get('/show/{id}', [TicketController::class, 'show'])->name('ticket.show');
        Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('ticket.answer');
        Route::get('/change/{id}', [TicketController::class, 'change'])->name('ticket.change');
        Route::get('/new-ticket', [TicketController::class, 'newTicket'])->name('ticket.new-ticket');
        Route::get('/open-ticket', [TicketController::class, 'openTicket'])->name('ticket.open-ticket');
        Route::get('/close-ticket', [TicketController::class, 'closeTicket'])->name('ticket.close-ticket');
    });



    //! Start of Setting

    Route::resource('setting', SettingController::class);
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
