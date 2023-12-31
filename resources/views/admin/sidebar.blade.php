@php
    $setting = App\Models\Setting::first();
@endphp


<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}">{{ $setting->sidebar_lg_header }}</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('admin.dashboard') }}">{{ $setting->sidebar_sm_header }}</a>
      </div>
      <ul class="sidebar-menu">
          <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> <span>{{__('admin.Dashboard')}}</span></a></li>

          <li class="nav-item dropdown {{ Route::is('admin.all-order') || Route::is('admin.order-show') || Route::is('admin.pending-order') || Route::is('admin.pregress-order') || Route::is('admin.delivered-order') ||  Route::is('admin.completed-order') || Route::is('admin.declined-order') || Route::is('admin.cash-on-delivery')  ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>{{__('admin.Orders')}}</span></a>

            <ul class="dropdown-menu">

              <li class="{{ Route::is('admin.all-order') || Route::is('admin.order-show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.all-order') }}">{{__('admin.All Orders')}}</a></li>

              <li class="{{ Route::is('admin.pending-order') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pending-order') }}">{{__('admin.Pending Orders')}}</a></li>

              <li class="{{ Route::is('admin.pregress-order') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pregress-order') }}">{{__('admin.Progress Orders')}}</a></li>
              <li class="{{ Route::is('admin.delivered-order') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.delivered-order') }}">{{__('admin.Delivered Orders')}}</a></li>
              <li class="{{ Route::is('admin.completed-order') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.completed-order') }}">{{__('admin.Completed Orders')}}</a></li>

              <li class="{{ Route::is('admin.declined-order') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.declined-order') }}">{{__('admin.Declined Orders')}}</a></li>
              <li class="{{ Route::is('admin.cash-on-delivery') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.cash-on-delivery') }}">{{__('admin.Cash On Delivery')}}</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.product-category.*') || Route::is('admin.product-sub-category.*') || Route::is('admin.product-child-category.*') || Route::is('admin.mega-menu-category.*') || Route::is('admin.mega-menu-sub-category') || Route::is('admin.create-mega-menu-sub-category') || Route::is('admin.edit-mega-menu-sub-category') || Route::is('admin.mega-menu-banner') || Route::is('admin.popular-category') || Route::is('admin.featured-category') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('admin.Manage Categories')}}</span></a>

            <ul class="dropdown-menu">

              <li class="{{ Route::is('admin.product-category.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product-category.index') }}">{{__('All Categories')}}</a></li>

              <li class="{{ Route::is('admin.product-sub-category.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product-sub-category.index') }}">{{__('admin.Sub Categories')}}</a></li>

              <!-- <li class="{{ Route::is('admin.product-child-category.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product-child-category.index') }}">{{__('admin.Child Categories')}}</a></li> -->
            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.product.*') || Route::is('admin.product-brand.*') || Route::is('admin.product-variant') || Route::is('admin.create-product-variant') || Route::is('admin.edit-product-variant') || Route::is('admin.product-gallery') || Route::is('admin.product-variant-item') || Route::is('admin.create-product-variant-item') || Route::is('admin.edit-product-variant-item') || Route::is('admin.product-review') || Route::is('admin.show-product-review') || Route::is('admin.seller-product') || Route::is('admin.seller-pending-product') || Route::is('admin.wholesale') || Route::is('admin.create-wholesale') || Route::is('admin.edit-wholesale') || Route::is('admin.product-highlight') ||  Route::is('admin.product-report') || Route::is('admin.show-product-report') || Route::is('admin.specification-key.*') || Route::is('admin.stockout-product') || Route::is('admin.product-import-page') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('Manage Brands')}}</span></a>
            <ul class="dropdown-menu">
              <li class="{{ Route::is('admin.product-brand.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product-brand.index') }}">{{__('admin.Brands')}}</a></li>
              <li class="{{ Route::is('admin.featured-brands.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.featured-brands.index') }}">{{__('Brand Category')}}</a></li>
            </ul>
          </li>


          <li class="nav-item dropdown {{Route::is('admin.product-ingredient.index') || Route::is('admin.product-ingredient.index') || Route::is('admin.product.*') || Route::is('admin.product-brand.*') || Route::is('admin.product-variant') || Route::is('admin.create-product-variant') || Route::is('admin.edit-product-variant') || Route::is('admin.product-gallery') || Route::is('admin.product-variant-item') || Route::is('admin.create-product-variant-item') || Route::is('admin.edit-product-variant-item') || Route::is('admin.product-review') || Route::is('admin.show-product-review') || Route::is('admin.seller-product') || Route::is('admin.seller-pending-product') || Route::is('admin.wholesale') || Route::is('admin.create-wholesale') || Route::is('admin.edit-wholesale') || Route::is('admin.product-highlight') ||  Route::is('admin.product-report') || Route::is('admin.show-product-report') || Route::is('admin.specification-key.*') || Route::is('admin.stockout-product') || Route::is('admin.product-import-page') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('admin.Manage Products')}}</span></a>

            <ul class="dropdown-menu">

            <li><a class="nav-link" href="{{ route('admin.product-import-page') }}">{{__('admin.Product Bulk Import')}}</a></li>

            <li><a class="nav-link" href="{{ route('admin.product.create') }}">{{__('admin.Create Product')}}</a></li>

            <li class="{{ Route::is('admin.product.*') || Route::is('admin.product-variant') || Route::is('admin.create-product-variant') || Route::is('admin.edit-product-variant') || Route::is('admin.product-gallery') || Route::is('admin.product-variant-item') || Route::is('admin.create-product-variant-item') || Route::is('admin.edit-product-variant-item') || Route::is('admin.wholesale') || Route::is('admin.create-wholesale') || Route::is('admin.edit-wholesale') || Route::is('admin.product-highlight') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product.index') }}">{{__('admin.Products')}}</a></li>

            <li class="{{ Route::is('admin.stockout-product') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.stockout-product') }}">{{__('admin.Stock out')}}</a></li>

            <li class="{{ Route::is('admin.seller-product') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.seller-product') }}">{{__('admin.Seller Products')}}</a></li>

            <li class="{{ Route::is('admin.seller-pending-product') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.seller-pending-product') }}">{{__('admin.Awaiting for approval')}}</a></li>

            <li class="{{ Route::is('admin.specification-key.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.specification-key.index') }}">{{__('admin.Specification Key')}}</a></li>

            <li class="{{ Route::is('admin.product-ingredient.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product-ingredient.index') }}">{{__('Product Ingredient')}}</a></li>
            
            <li class="{{ Route::is('admin.product-description.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product-description.index') }}">{{__('Product Description')}}</a></li>

              <li class="{{ Route::is('admin.product-review') || Route::is('admin.show-product-review') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product-review') }}">{{__('admin.Product Reviews')}}</a></li>

              <li class="{{ Route::is('admin.product-report') || Route::is('admin.show-product-report') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.product-report') }}">{{__('admin.Product Report')}}</a></li>


            </ul>
          </li>


          <li class="{{ Route::is('admin.inventory') || Route::is('admin.stock-history') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.inventory') }}"><i class="fas fa-th-large"></i> <span>{{__('admin.Inventory')}}</span></a></li>

          <li class="nav-item dropdown {{ Route::is('admin.country.*') || Route::is('admin.state.*') || Route::is('admin.city.*') || Route::is('admin.country-import-page') || Route::is('admin.state-import-page') || Route::is('admin.city-import-page') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i><span>{{__('admin.Locations')}}</span></a>

            <ul class="dropdown-menu">

                <li class="{{ Route::is('admin.country.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.country.index') }}">{{__('admin.Country / Region')}}</a></li>

                <li class="{{ Route::is('admin.state.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.state.index') }}">{{__('admin.State / Province')}}</a></li>

                <li class="{{ Route::is('admin.city.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.city.index') }}">{{__('admin.City / Delivery Area')}}</a></li>

            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.delivery-man.*') || Route::is('admin.balance-list') || Route::is('admin.delivery-man-withdraw-list') || Route::is('admin.delivery-man-review') || Route::is('admin.delivery-man-order-amount') || Route::is('admin.delivery-man-order-amount.create') || Route::is('admin.state-import-page') || Route::is('admin.city-import-page') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-walking"></i><span>{{__('Delivery Man')}}</span></a>

            <ul class="dropdown-menu">

                <li class="{{ Route::is('admin.delivery-man.create') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.delivery-man.create') }}">{{__('Create Delivery Man')}}</a></li>

                <li class="{{ Route::is('admin.delivery-man.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.delivery-man.index') }}">{{__('Delivery Man')}}</a></li>

                <li class="{{ Route::is('admin.delivery-man-order-amount') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.delivery-man-order-amount') }}">{{__('Receive Amount')}}</a></li>

                <li class="{{ Route::is('admin.delivery-man-review') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.delivery-man-review') }}">{{__('Review')}}</a></li>

            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.delivery-man-withdraw-method.*') || Route::is('admin.delivery-man-withdraw') || Route::is('admin.show-delivery-man-withdraw') || Route::is('admin.pending-delivery-man-withdraw') || Route::is('admin.city.*') || Route::is('admin.country-import-page') || Route::is('admin.state-import-page') || Route::is('admin.city-import-page') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>{{__('Delivery Man Withdrow')}}</span></a>

            <ul class="dropdown-menu">

                <li class="{{ Route::is('admin.delivery-man-withdraw-method.index') || Route::is('admin.delivery-man-withdraw-method.create') || Route::is('admin.delivery-man-withdraw-method.edit') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.delivery-man-withdraw-method.index') }}">{{__('Withdrow Method')}}</a></li>

                <li class="{{ Route::is('admin.delivery-man-withdraw') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.delivery-man-withdraw') }}">{{__('Withdraw')}}</a></li>

                <li class="{{ Route::is('admin.pending-delivery-man-withdraw') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pending-delivery-man-withdraw') }}">{{__('Pending Withdraw')}}</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.flash-sale') || Route::is('admin.currency.*') || Route::is('admin.shipping.*') || Route::is('admin.coupon.*') || Route::is('admin.payment-method') || Route::is('admin.flash-sale-product') || Route::is('admin.shipping-import-page') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>{{__('admin.Ecommerce')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.flash-sale') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.flash-sale') }}">{{__('admin.Flash Sale')}}</a></li>

                <li class="{{ Route::is('admin.flash-sale-product') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.flash-sale-product') }}">{{__('admin.Flash Sale Product')}}</a></li>

                <li class="{{ Route::is('admin.coupon.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.coupon.index') }}">{{__('admin.Coupon')}}</a></li>

                <li class="{{ Route::is('admin.shipping.*') || Route::is('admin.shipping-import-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.shipping.index') }}">{{__('admin.Shipping Rule')}}</a></li>

                <li class="{{ Route::is('admin.payment-method') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.payment-method') }}">{{__('admin.Payment Method')}}</a></li>

            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.withdraw-method.*') || Route::is('admin.seller-withdraw') || Route::is('admin.pending-seller-withdraw') || Route::is('admin.show-seller-withdraw')  ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>{{__('admin.Withdraw Payment')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.withdraw-method.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.withdraw-method.index') }}">{{__('admin.Withdraw Method')}}</a></li>

                <li class="{{ Route::is('admin.seller-withdraw') || Route::is('admin.show-seller-withdraw') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.seller-withdraw') }}">{{__('admin.Seller Withdraw')}}</a></li>

                <li class="{{ Route::is('admin.pending-seller-withdraw') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pending-seller-withdraw') }}">{{__('admin.Pending Seller Withdraw')}}</a></li>

            </ul>
          </li>

          <li class="nav-item dropdown {{  Route::is('admin.customer-list') || Route::is('admin.customer-show') || Route::is('admin.pending-customer-list') || Route::is('admin.seller-list') || Route::is('admin.seller-show') || Route::is('admin.pending-seller-list') || Route::is('admin.seller-shop-detail') || Route::is('admin.seller-reviews') || Route::is('admin.show-seller-review-details') || Route::is('admin.send-email-to-seller') || Route::is('admin.email-history') || Route::is('admin.product-by-seller') || Route::is('admin.send-email-to-all-seller') || Route::is('admin.send-email-to-all-customer') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>{{__('admin.Users')}}</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.customer-list') || Route::is('admin.customer-show') || Route::is('admin.send-email-to-all-customer') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.customer-list') }}">{{__('admin.Customer List')}}</a></li>

                <li class="{{ Route::is('admin.pending-customer-list') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pending-customer-list') }}">{{__('admin.Pending Customers')}}</a></li>

                <li class="{{ Route::is('admin.seller-list') || Route::is('admin.seller-show') || Route::is('admin.seller-shop-detail') || Route::is('admin.seller-reviews') || Route::is('admin.show-seller-review-details') || Route::is('admin.send-email-to-seller') || Route::is('admin.email-history') || Route::is('admin.product-by-seller') || Route::is('admin.send-email-to-all-seller') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.seller-list') }}">{{__('admin.Seller List')}}</a></li>

                <li class="{{ Route::is('admin.pending-seller-list') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pending-seller-list') }}">{{__('admin.Pending Sellers')}}</a></li>

            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.service.*') || Route::is('admin.maintainance-mode') || Route::is('admin.announcement') ||  Route::is('admin.slider.*') || Route::is('admin.home-page') || Route::is('admin.banner-image.index') || Route::is('admin.homepage-one-visibility') || Route::is('admin.cart-bottom-banner') || Route::is('admin.shop-page') || Route::is('admin.seo-setup') || Route::is('admin.menu-visibility') || Route::is('admin.product-detail-page') || Route::is('admin.default-avatar') || Route::is('admin.seller-conditions') || Route::is('admin.subscription-banner') || Route::is('admin.testimonial.*') || Route::is('admin.homepage-section-title') || Route::is('admin.image-content') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-globe"></i><span>{{__('admin.Manage Website')}}</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.seo-setup') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.seo-setup') }}">{{__('admin.SEO Setup')}}</a></li>

                <li class="{{ Route::is('admin.shop-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.shop-page') }}">{{ __('admin.Shop Page') }}</a></li>

                <li class="{{ Route::is('admin.service.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.service.index') }}">{{__('admin.Service')}}</a></li>

                <li class="{{ Route::is('admin.seller-conditions') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.seller-conditions') }}">{{__('admin.Seller Conditions')}}</a></li>

                <li class="{{ Route::is('admin.testimonial.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.testimonial.index') }}">{{__('admin.Testimonial')}}</a></li>

                <li class="{{ Route::is('admin.maintainance-mode') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.maintainance-mode') }}">{{__('admin.Maintainance Mode')}}</a></li>

                <li class="{{ Route::is('admin.announcement') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.announcement') }}">{{__('admin.Announcement')}}</a></li>

                <li class="{{ Route::is('admin.subscription-banner') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.subscription-banner') }}">{{__('admin.Subscription Banner')}}</a></li>

                <li class="{{ Route::is('admin.image-content') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.image-content') }}">{{__('admin.Image Content')}}</a></li>

                <li class="{{ Route::is('admin.default-avatar') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.default-avatar') }}">{{__('admin.Default Avatar')}}</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{Route::is('admin.homepage-section-title') ||Route::is('admin.slider.*')|| Route::is('admin.shop-by-concern.index') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('Manage Homepage')}}</span></a>

            <ul class="dropdown-menu">           
            <li class="{{ Route::is('admin.homepage-section-title') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.homepage-section-title') }}">{{__('admin.Homepage Section Title')}}</a></li>

            <li class="{{ Route::is('admin.slider.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.slider.index') }}">{{__('admin.Slider')}}</a></li>

            <li class="{{ Route::is('admin.best-offer-products.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.best-offer-products.index') }}">{{__('Best Offer For You')}}</a></li>

            <li class="{{ Route::is('admin.shop-by-concern.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.shop-by-concern.index') }}">{{__('Shop By Concern')}}</a></li>

            <li class="{{ Route::is('admin.top-brands.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.top-brands.index') }}">{{__('Top Brands')}}</a></li>

            <li class="{{ Route::is('admin.advertisement') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.advertisement') }}">{{__('Manage Banners')}}</a></li>

            <li class="{{ Route::is('admin.featured-brands.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.featured-brands.index') }}">{{__('Featured Brands')}}</a></li>

            <li class="{{ Route::is('admin.featured-products.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.featured-products.index') }}">{{__('Featured Brands Products')}}</a></li>

            <li class="{{ Route::is('admin.best-seller-banners.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.best-seller-banners.index') }}">{{__('Best Seller Banners')}}</a></li>

            <li class="{{ Route::is('admin.best-discount-products.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.best-discount-products.index') }}">{{__('Best discount Products')}}</a></li>

            <li class="{{ Route::is('admin.top-categories-products.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.top-categories-products.index') }}">{{__('Top Categories Products')}}</a></li>

            <li class="{{ Route::is('admin.influncer-picks.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.influencer-picks.index') }}">{{__('Influencer Picks')}}</a></li>
            </ul>
          </li>
          <!-- brandpage -->
          <li class="nav-item dropdown {{Route::is('admin.brandpage-section-title') || Route::is('admin.brand-banners.index') || Route::is('admin.brand-offers.index') ||Route::is('admin.brand-description.index') ||Route::is('admin.brand-best-sellers.index') ||Route::is('admin.brand-categories.index') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('Manage Brand Page')}}</span></a>
            <ul class="dropdown-menu"> 
              <li class="{{ Route::is('admin.brandpage-section-title') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.brandpage-section-title') }}">{{__('Brandpage Section Title')}}</a></li>          
              <li class="{{ Route::is('admin.brand-banners.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.brand-banners.index') }}">{{__('Brand Banners')}}</a></li>
              <li class="{{ Route::is('admin.brand-offers.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.brand-offers.index') }}">{{__('Brand Offers')}}</a></li>
              <li class="{{ Route::is('admin.brand-description.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.brand-description.index') }}">{{__('Brand description')}}</a></li>
              <li class="{{ Route::is('admin.brand-best-sellers.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.brand-best-sellers.index') }}">{{__('Brand Best Sellers')}}</a></li>
              <li class="{{ Route::is('admin.brand-categories.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.brand-categories.index') }}">{{__('Brand Categories')}}</a></li>
            </ul>
          </li>

          <!-- categorypage -->
          <li class="nav-item dropdown {{Route::is('admin.categorypage-section-title') || Route::is('admin.category-best-sellers.index') || Route::is('admin.category-list.index') || Route::is('admin.category-offer-brands.index') || Route::is('admin.category-shop-concern.index') || Route::is('admin.category-banners.index') || Route::is('admin.category-trending.index') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('Manage Category Page')}}</span></a>
            <ul class="dropdown-menu">           
              <li class="{{ Route::is('admin.categorypage-section-title') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.categorypage-section-title') }}">{{__('Category Page Title')}}</a></li>          

              <li class="{{ Route::is('admin.category-banners.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category-banners.index') }}">{{__('Category Banners')}}</a></li>
              <li class="{{ Route::is('admin.category-trending.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category-trending.index') }}">{{__('Category Trending')}}</a></li>
              <li class="{{ Route::is('admin.category-shop-concern.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category-shop-concern.index') }}">{{__('Category By shop Concern')}}</a></li>
              <li class="{{ Route::is('admin.category-offer-brands.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category-offer-brands.index') }}">{{__('Category Offer Brands')}}</a></li>
              <li class="{{ Route::is('admin.category-list.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category-list.index') }}">{{__('Category List')}}</a></li>
              <li class="{{ Route::is('admin.category-best-sellers.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.category-best-sellers.index') }}">{{__('Category Best Sellers')}}</a></li>
            </ul>
          </li>

          {{-- Luxe Page --}}
          <li class="nav-item dropdown {{Route::is('admin.lux-trending-now.index') || Route::is('admin.lux-top-picks.index') || Route::is('admin.lux-slider.index') || Route::is('admin.lux-shop-by-type.index') || Route::is('admin.lux-shop-by-concern.index') || Route::is('admin.lux-section5.index') || Route::is('admin.luxpage-section-title') || Route::is('admin.lux-best-sellers.index') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('Manage Luxury Page')}}</span></a>
            <ul class="dropdown-menu">           
              <li class="{{ Route::is('admin.luxpage-section-title') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.luxpage-section-title') }}">{{__('Luxury Page Title')}}</a></li>          

              <li class="{{ Route::is('admin.lux-best-sellers.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.lux-best-sellers.index') }}">{{__('Best Sellers')}}</a></li>
              <li class="{{ Route::is('admin.lux-section5.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.lux-section5.index') }}">{{__('Section5')}}</a></li>
              <li class="{{ Route::is('admin.lux-shop-by-concern.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.lux-shop-by-concern.index') }}">{{__('Shop by Concern')}}</a></li>
              <li class="{{ Route::is('admin.lux-shop-by-type.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.lux-shop-by-type.index') }}">{{__('Shop by Type')}}</a></li>
              <li class="{{ Route::is('admin.lux-slider.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.lux-slider.index') }}">{{__('Sliders')}}</a></li>
              <li class="{{ Route::is('admin.lux-top-picks.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.lux-top-picks.index') }}">{{__('Top Picks')}}</a></li>
              <li class="{{ Route::is('admin.lux-trending-now.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.lux-trending-now.index') }}">{{__('Trending Now')}}</a></li>
            </ul>
          </li>
          
          {{-- Offer Page --}}
          <li class="nav-item dropdown {{Route::is('admin.offer-slider.index') || Route::is('admin.offer-shop-by-categories.index') || Route::is('admin.offer-best-sellers.index') || Route::is('admin.offer-best-offer.index') || Route::is('admin.offer-best-in-beauty.index') || Route::is('admin.offer-best-brands.index') || Route::is('admin.offerpage-section-title') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('Manage Offer Page')}}</span></a>
            <ul class="dropdown-menu">           
              <li class="{{ Route::is('admin.offerpage-section-title') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.offerpage-section-title') }}">{{__('Category Page Title')}}</a></li>          

              <li class="{{ Route::is('admin.offer-best-brands.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.offer-best-brands.index') }}">{{__('Best Brands')}}</a></li>
              <li class="{{ Route::is('admin.offer-best-in-beauty.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.offer-best-in-beauty.index') }}">{{__('Best In Beauty')}}</a></li>
              <li class="{{ Route::is('admin.offer-best-offer.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.offer-best-offer.index') }}">{{__('Best In Offer')}}</a></li>
              <li class="{{ Route::is('admin.offer-best-sellers.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.offer-best-sellers.index') }}">{{__('Best Sellers')}}</a></li>
              <li class="{{ Route::is('admin.offer-shop-by-categories.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.offer-shop-by-categories.index') }}">{{__('Shop By Category')}}</a></li>
              <li class="{{ Route::is('admin.offer-slider.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.offer-slider.index') }}">{{__('Slider')}}</a></li>
            </ul>
          </li>

          

          <li class="nav-item dropdown {{ Route::is('admin.footer.*') || Route::is('admin.social-link.*') || Route::is('admin.footer-link.*') || Route::is('admin.second-col-footer-link') || Route::is('admin.third-col-footer-link') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('Website Menu')}}</span></a>

            <ul class="dropdown-menu">
            <li class="{{ Route::is('admin.mega-menu-category.*') || Route::is('admin.mega-menu-sub-category') || Route::is('admin.create-mega-menu-sub-category') || Route::is('admin.edit-mega-menu-sub-category') || Route::is('admin.mega-menu-banner') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.mega-menu-category.index') }}">{{__('admin.Mega Menu Category')}}</a></li>

            <li class="{{ Route::is('admin.popular-category') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.popular-category') }}">{{__('admin.Popular Category')}}</a></li>

            <li class="{{ Route::is('admin.featured-category') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.featured-category') }}">{{__('admin.Featured Category')}}</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.footer.*') || Route::is('admin.social-link.*') || Route::is('admin.footer-link.*') || Route::is('admin.second-col-footer-link') || Route::is('admin.third-col-footer-link') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('admin.Website Footer')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.footer.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.footer.index') }}">{{__('admin.Footer')}}</a></li>

                <li class="{{ Route::is('admin.social-link.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.social-link.index') }}">{{__('admin.Social Link')}}</a></li>

                <li class="{{ Route::is('admin.footer-link.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.footer-link.index') }}">{{__('admin.First Column Link')}}</a></li>

                <li class="{{ Route::is('admin.second-col-footer-link') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.second-col-footer-link') }}">{{__('admin.Second Column Link')}}</a></li>

                <li class="{{ Route::is('admin.third-col-footer-link') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.third-col-footer-link') }}">{{__('admin.Third Column Link')}}</a></li>

            </ul>
          </li>



          <li class="nav-item dropdown {{ Route::is('admin.about-us.*') || Route::is('admin.custom-page.*') || Route::is('admin.terms-and-condition.*') || Route::is('admin.privacy-policy.*') || Route::is('admin.faq.*') || Route::is('admin.error-page.*') || Route::is('admin.contact-us.*') || Route::is('admin.login-page') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>{{__('admin.Pages')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.about-us.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.about-us.index') }}">{{__('admin.About Us')}}</a></li>

                <li class="{{ Route::is('admin.contact-us.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.contact-us.index') }}">{{__('admin.Contact Us')}}</a></li>

                <li class="{{ Route::is('admin.custom-page.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.custom-page.index') }}">{{__('admin.Custom Page')}}</a></li>

                <li class="{{ Route::is('admin.terms-and-condition.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.terms-and-condition.index') }}">{{__('admin.Terms And Conditions')}}</a></li>

                <li class="{{ Route::is('admin.privacy-policy.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.privacy-policy.index') }}">{{__('admin.Privacy Policy')}}</a></li>

                <li class="{{ Route::is('admin.faq.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.faq.index') }}">{{__('admin.FAQ')}}</a></li>

                <li class="{{ Route::is('admin.error-page.*') ? 'active' : '' }} d-none"><a class="nav-link" href="{{ route('admin.error-page.index') }}">{{__('admin.Error Page')}}</a></li>

                <li class="{{ Route::is('admin.login-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.login-page') }}">{{__('admin.Login Page')}}</a></li>

            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.blog-category.*') || Route::is('admin.blog.*') || Route::is('admin.popular-blog.*') || Route::is('admin.blog-comment.*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('admin.Blogs')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.blog-category.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.blog-category.index') }}">{{__('admin.Categories')}}</a></li>

                <li class="{{ Route::is('admin.blog.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.blog.index') }}">{{__('admin.Blogs')}}</a></li>

                <li class="{{ Route::is('admin.popular-blog.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.popular-blog.index') }}">{{__('admin.Popular Blogs')}}</a></li>

                <li class="{{ Route::is('admin.blog-comment.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.blog-comment.index') }}">{{__('admin.Comments')}}</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.email-configuration') || Route::is('admin.email-template') || Route::is('admin.edit-email-template') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i><span>{{__('admin.Email Configuration')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.email-configuration') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.email-configuration') }}">{{__('admin.Setting')}}</a></li>

                <li class="{{ Route::is('admin.email-template') || Route::is('admin.edit-email-template') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.email-template') }}">{{__('admin.Email Template')}}</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{ Route::is('admin.sms-notification') || Route::is('admin.sms-template') || Route::is('admin.edit-sms-template') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i><span>{{__('admin.Sms Configuration')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.sms-notification') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.sms-notification') }}">{{__('admin.Setting')}}</a></li>

                <li class="{{ Route::is('admin.sms-template') || Route::is('admin.edit-sms-template') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.sms-template') }}">{{__('admin.Sms Template')}}</a></li>
            </ul>
          </li>



          <li class="nav-item dropdown {{ Route::is('admin.admin-language') || Route::is('admin.admin-validation-language') || Route::is('admin.website-language') || Route::is('admin.website-validation-language') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>{{__('admin.Language')}}</span></a>

            <ul class="dropdown-menu">
                <li class="{{ Route::is('admin.admin-language') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.admin-language') }}">{{__('admin.Admin Language')}}</a></li>

                <li class="{{ Route::is('admin.admin-validation-language') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.admin-validation-language') }}">{{__('admin.Admin Validation')}}</a></li>

                <li class="{{ Route::is('admin.website-language') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.website-language') }}">{{__('admin.Frontend Language')}}</a></li>
                <li class="{{ Route::is('admin.website-validation-language') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.website-validation-language') }}">{{__('admin.Frontend Validation')}}</a></li>
            </ul>
          </li>

          <li class="{{ Route::is('admin.general-setting') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.general-setting') }}"><i class="fas fa-cog"></i> <span>{{__('admin.Setting')}}</span></a></li>

          @php
              $logedInAdmin = Auth::guard('admin')->user();
          @endphp
          @if ($logedInAdmin->admin_type == 1)
          <li  class="{{ Route::is('admin.clear-database') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.clear-database') }}"><i class="fas fa-trash"></i> <span>{{__('admin.Clear Database')}}</span></a></li>
          @endif

          <li class="{{ Route::is('admin.subscriber') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.subscriber') }}"><i class="fas fa-fire"></i> <span>{{__('admin.Subscribers')}}</span></a></li>

          <li class="{{ Route::is('admin.contact-message') || Route::is('admin.show-contact-message') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.contact-message') }}"><i class="fas fa-fa fa-envelope"></i> <span>{{__('admin.Contact Message')}}</span></a></li>

          @if ($logedInAdmin->admin_type == 1)
            <li class="{{ Route::is('admin.admin.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.admin.index') }}"><i class="fas fa-user"></i> <span>{{__('admin.Admin list')}}</span></a></li>
          @endif

        </ul>

    </aside>
  </div>
