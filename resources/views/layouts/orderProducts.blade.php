<div class="modal-wrapper" id="productSelection" >
    <div class="modal-container" style="width: 100%; height:100%; overflow-y:scroll;">
        @if($products->count() > 0)
            <div class="my-modal-header">
                <h3 id="modal-title">
                    Add Products to Order
                </h3>
            </div>
            <div class="modal-body-wrap">
                &nbsp;
                <div class="filter-row">
                    <div class="inner-search">
                        <form>

                            <div class="row form-row inner-search-form-row">
                                
                                
                            </div>                                 
                        </form>
                    </div>
                    <div style="display:grid; place-items:end;">
                        <button class="modal-close-btn" id="close-modal-productSelection" type="button">Close</button>
                    </div> 
                </div>
                <div class="my-modal-body" style="overflow: scroll" id="selectByProduct">
                    <div class="row form-row">

                        @foreach($products as $product)
                            <div class="col-md-4 col-sm-12">
                                
                                <div class="form-group">
                                    <input name="products[{{ $product->product_name }}][product_id]" class="form-check-input" type="checkbox" value="{{ $product->id }}" id="flexCheckIndeterminateDisabled">
                                    <label class="form-label" for="flexCheckIndeterminateDisabled">{{ $product->product_name }}</label>
                                    @error('product_categories')
                                        <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                
                        
                            </div>

                        @endforeach
                    </div>
                
                </div>

               
            </div>
        @else
            <div class="my-modal-header">
                <h3 id="modal-title">
                    You have not added any products to run sales on yet yet
                </h3>
            </div>
            <div class="my-modal-body">
            
                {{-- @if($categories->count() > 0)
                    <option value="" disabled selected>Select Product Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                    
                    
                @else
                    <option value="" disabled selected>You have not added any category yet</option>
                @endif --}}
                <p id="modal-body" style="text-align: center">
                    products will show up here as you add them, ensure to add products 
                     as customers often search products by names. 
                </p>
    
            </div>
            <div class="modal-footer" style="text-align: center">
                <div class="not-added-add-now">
                    <a href="{{ route('admin.product.new') }}" class="modal-close-btn" style="text-align:center; background-color:#0f2a3d; color:#ffefce;" >Add Product</a>
                </div>
            </div>
        @endif 

    </div>
</div>



  