<!-- product section -->
      <section class="product_section layout_padding" id="products">
         <div class="container">
            @if(session('info'))
               <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach($products as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{ route('product.details', $product) }}" class="option1">
                              View Details
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="{{ asset('product_images/'.$product->image) }}" 
                             alt="{{ $product->title }}" 
                             style="width: 250px; height: 300px; object-fit: cover;">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{ $product->title }}
                        </h5>
                        @if($product->discount_price)
                           <h6>
                              <span class="text-danger">${{ number_format($product->discount_price, 2) }}</span>
                              <small class="text-muted text-decoration-line-through">${{ number_format($product->price, 2) }}</small>
                           </h6>
                        @else
                           <h6>
                              ${{ number_format($product->price, 2) }}
                           </h6>
                        @endif
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <!-- end product section -->