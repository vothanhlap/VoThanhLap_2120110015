<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Routing\Exceptions\UrlGenerationException;
    //fontend
    use App\Http\Controllers\frontend\SiteController;
    use App\Http\Controllers\frontend\LienheController;
    use App\Http\Controllers\frontend\SanphamController;
    use App\Http\Controllers\frontend\DichvuController;
    use App\Http\Controllers\frontend\DangnhapController;
    use App\Http\Controllers\frontend\CartController;
    use App\Http\Controllers\frontend\CheckoutController;
    use App\Http\Controllers\frontend\KhachhangContrller;
    //backed
    use App\Http\Controllers\backend\SliderController;
    use App\Http\Controllers\backend\CategoryController;
    use App\Http\Controllers\backend\ContactController;
    use App\Http\Controllers\backend\ProductController;
    use App\Http\Controllers\backend\TopicController;
    use App\Http\Controllers\backend\PostController;
    use App\Http\Controllers\backend\PageController;
    use App\Http\Controllers\backend\BrandController;
    use App\Http\Controllers\backend\MenuController;
    use App\Http\Controllers\backend\OrderController;
    use App\Http\Controllers\backend\OrderdetailController;
    use App\Http\Controllers\backend\AuthController;
    use App\Http\Controllers\backend\UserController;
    use App\Http\Controllers\backend\DashboardController;
    use App\Http\Controllers\backend\CustomerController;
    //trang chu
        Route::get('/', [SiteController::class, 'index'])->name('frontend.home');
        //tim kiem 
        Route::get("timkiem/", [SiteController::class, 'timkiem'])->name('frontend.timkiem');
        //lien he
        Route::get('lien-he', [LienheController::class, 'getcontact'])->name('contact.getcontact');
        Route::post('lien-he', [LienheController::class, 'postcontact'])->name('contact.postcontact');
        // san pham
        Route::get('tat-ca-san-pham', [SiteController::class, 'tatcasanpham'])->name('frontend.tatcasanpham'); 
        //gio hang
        Route::get('gio-hang', [CartController::class, 'index'])->name('giohang.index');
        Route::get('addcart/{id}', [CartController::class, 'addcart'])->name('giohang.addcart');
        Route::get('deleteCart/{id}', [CartController::class, 'deleteCart']);
        Route::get('delete-list-Cart/{id}', [CartController::class, 'deletelistCart']); 
        Route::get('save-item-list-Cart/{id}/{quanty}', [CartController::class, 'savelistCart']); 
        
      
        
        
        //dang xuat
        Route::get('dang-nhap', [DangnhapController::class, 'dangxuat'])->name('login.dangxuat');  
        // //khai bao route cho trang nguoi dung
        //dang nhap tai khoan khach hang
        Route::get('dang-nhap', [DangnhapController::class, 'dangnhap'])->name('login.dangnhap');
        Route::post('dang-nhap', [DangnhapController::class, 'xulydangnhap'])->name('xulydangnhap');     
        //dang ky
        Route::get('dang-ki', [DangnhapController::class, 'dangki'])->name('login.dangki');
        Route::post('dang-ki', [DangnhapController::class, 'xulydangki'])->name('login.xulydangki');
        
        Route::get('dang-xuat', [DangnhapController::class, 'dangxuat'])->name('login.dangxuat');
        //thanh toan
        Route::get('thanh-toan', [CheckoutController::class, 'checkout'])->name('giohang.checkout');
        // Dat hang thanh cong
        Route::get('dat-hang-thanh-cong', [CheckoutController::class, 'dathangthanhcong'])->name('giohang.dathangthanhcog');
        Route::get('theo-doi-don-hang', [CheckoutController::class, 'theodoidonhang'])->name('giohang.status');
        // khai bao route dang nhap - dang xuat
        route::get('login', [AuthController::class, 'getlogin'])->name('login');
        Route::post('login', [AuthController::class,'postlogin'])->name('postlogin');
        route::get('dangky', [AuthController::class, 'getdangky'])->name('dangky');
        Route::post('dangky', [AuthController::class,'postdangky'])->name('postdangky');
        Route::get('forgot-password', [AuthController::class,'forgotpassword'])->name('forgotpassword');
        Route::get('recover-password', [AuthController::class,'recover'])->name('recover');
        //khai bao route cho quan ly
        route::group(['prefix'=>'admin','middleware'=>'LoginAdmin'] ,function () {
        route::get('login', [AuthController::class, 'logout'])->name('logout');
        route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard'); //name dung de goi o view
    //category
    Route::resource('category', CategoryController::class);
        route::get('category_trash', [CategoryController::class, 'trash'])->name('category.trash');
        route::prefix('category')->group(function () {
        route::get('status/{category}', [CategoryController::class, 'status'])->name('category.status');
        route::get('delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
        route::get('restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
   //contact
   Route::resource('contact', ContactController::class);
        route::get('contact_trash', [ContactController::class, 'trash'])->name('contact.trash');
        route::prefix('contact')->group(function () {
        route::get('status/{contact}', [ContactController::class, 'status'])->name('contact.status');
        route::get('delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');
        route::get('restore/{contact}', [ContactController::class, 'restore'])->name('contact.restore');
        route::get('destroy/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
 });
    //brand
    Route::resource('brand', BrandController::class);
        route::get('brand_trash', [BrandController::class, 'trash'])->name('brand.trash');
        route::prefix('brand')->group(function () {
        route::get('status/{brand}', [BrandController::class, 'status'])->name('brand.status');
        route::get('delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete');
        route::get('restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
        route::get('destroy/{brand}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });
    //topic
    Route::resource('topic', TopicController::class);
        route::get('topic_trash', [TopicController::class, 'trash'])->name('topic.trash');
        route::prefix('topic')->group(function () {
        route::get('status/{topic}', [TopicController::class, 'status'])->name('topic.status');
        route::get('delete/{topic}', [TopicController::class, 'delete'])->name('topic.delete');
        route::get('restore/{topic}', [TopicController::class, 'restore'])->name('topic.restore');
        route::get('destroy/{topic}', [TopicController::class, 'destroy'])->name('topic.destroy');
    });
    //post
    Route::resource('post', PostController::class);
        route::get('post_trash', [PostController::class, 'trash'])->name('post.trash');
        route::prefix('post')->group(function () {
        route::get('status/{post}', [PostController::class, 'status'])->name('post.status');
        route::get('delete/{post}', [PostController::class, 'delete'])->name('post.delete');
        route::get('restore/{post}', [PostController::class, 'restore'])->name('post.restore');
        route::get('destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    });
    //page
    Route::resource('page', PageController::class);
        route::get('page_trash', [PageController::class, 'trash'])->name('page.trash');
        route::prefix('page')->group(function () {
        route::get('status/{page}', [PageController::class, 'status'])->name('page.status');
        route::get('delete/{page}', [PageController::class, 'delete'])->name('page.delete');
        route::get('restore/{page}', [PageController::class, 'restore'])->name('page.restore');
        route::get('destroy/{page}', [PageController::class, 'destroy'])->name('page.destroy');
    });
      //user
      Route::resource('user', UserController::class);
          route::get('user_trash', [UserController::class, 'trash'])->name('user.trash');
          route::prefix('user')->group(function () {
          route::get('status/{user}', [UserController::class, 'status'])->name('user.status');
          route::get('delete/{user}', [UserController::class, 'delete'])->name('user.delete');
          route::get('restore/{user}', [UserController::class, 'restore'])->name('user.restore');
          route::get('destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
      });
    //menu
    Route::resource('menu', MenuController::class);
        route::get('menu_trash', [MenuController::class, 'trash'])->name('menu.trash');
        route::prefix('menu')->group(function () {
        route::get('status/{menu}', [MenuController::class, 'status'])->name('menu.status');
        route::get('delete/{menu}', [MenuController::class, 'delete'])->name('menu.delete');
        route::get('restore/{menu}', [MenuController::class, 'restore'])->name('menu.restore');
        route::get('destroy/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
    });
    //slider
    Route::resource('slider', SliderController::class);
        route::get('slider_trash', [SliderController::class, 'trash'])->name('slider.trash');
        route::prefix('slider')->group(function () {
        route::get('status/{slider}', [SliderController::class, 'status'])->name('slider.status');
        route::get('delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');
        route::get('restore/{slider}', [SliderController::class, 'restore'])->name('slider.restore');
        route::get('destroy/{slider}', [SliderController::class, 'destroy'])->name('slider.destroy');
    });
    //product
    Route::resource('product', ProductController::class);
        route::get('product_trash', [ProductController::class, 'trash'])->name('product.trash');
        route::prefix('product')->group(function () {
        route::get('status/{product}', [ProductController::class, 'status'])->name('product.status');
        route::get('delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        route::get('restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
        route::get('destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
   //order
   Route::resource('order', OrderController::class);
       route::get('order_trash', [OrderController::class, 'trash'])->name('order.trash');
       route::prefix('order')->group(function () {
       route::get('status/{order}', [OrderController::class, 'status'])->name('order.status');
       route::get('delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
       route::get('restore/{order}', [OrderController::class, 'restore'])->name('order.restore');
       route::get('destroy/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
       route::get('huy/{order}', [OrderController::class, 'Huy'])->name('order.huy');
       route::get('xac-minh/{order}', [OrderController::class, 'Xacminh'])->name('order.xacminh');
       route::get('van-chuyen/{order}', [OrderController::class, 'Vanchuyen'])->name('order.vanchuyen');
       route::get('thanh-cong/{order}', [OrderController::class, 'Thanhcong'])->name('order.thanhcong');
       route::get('/dynamic_pdf/{order}', [OrderController::class, 'Xuathoadon'])->name('order.xuathoadon');
       route::get('/dynamic_pdf/pdf/{order}', [OrderController::class, 'pdf'])->name('order.pdf');
  
    });
   //orderdetail
    Route::resource('orderdetail', OrderdetailController::class);
        route::get('orderdetail_trash', [OrderdetailController::class, 'trash'])->name('orderdetail.trash');
        route::prefix('orderdetail')->group(function () {
        route::get('status/{orderdetail}', [OrderdetailController::class, 'status'])->name('orderdetail.status');
        route::get('delete/{orderdetail}', [OrderdetailController::class, 'delete'])->name('orderdetail.delete');
        route::get('restore/{orderdetail}', [OrderdetailController::class, 'restore'])->name('orderdetail.restore');
        route::get('destroy/{orderdetail}', [OrderdetailController::class, 'destroy'])->name('orderdetail.destroy');
   });
    //orderdetail
    Route::resource('customer', CustomerController::class);      
        route::prefix('customer')->group(function () {
        route::get('status/{customer}', [CustomerController::class, 'status'])->name('customer.status');
        route::get('delete/{customer}', [CustomerController::class, 'delete'])->name('customer.delete');
        route::get('restore/{customer}', [CustomerController::class, 'restore'])->name('customer.restore');
        route::get('destroy/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
   });
});
// Slug
    Route::get('{slug}', [SiteController::class, 'index'])->name('frontend.slug');

  
        
