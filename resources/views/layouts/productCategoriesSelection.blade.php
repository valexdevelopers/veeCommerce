<div class="modal-wrapper" id="productCategory" >
    <div class="modal-container">
        @if($categories->count() > 0)
            <div class="my-modal-header">
                <h3 id="modal-title">
                    Select Product Categories
                </h3>
            </div>
            <div class="my-modal-body" style="overflow: scroll">
                <div class="row form-row">
                    <div class="col-md-4 col-sm-12 ">
                        @foreach($categories as $category)
                        <div class="form-group">
                                <input name="product_categories[{{ $category->category_name }}][category_id]" class="form-check-input" type="checkbox" value="{{ $category->id }}" id="flexCheckIndeterminateDisabled">
                                <label class="form-label" for="flexCheckIndeterminateDisabled">{{ $category->category_name }}</label>
                                @error('product_categories[{{ $category->category_name }}][category_id]')
                                    <div class="help-block form-text with-errors form-control-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        
                        @endforeach
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                <div>
                    <button class="modal-close-btn" id="close-modal-productCategory" type="button">Close</button>
                </div>
            </div>
        @else
            <div class="my-modal-header">
                <h3 id="modal-title">
                    You have not added any categories yet
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
                    Categories will show up here as you add them, ensure to add product categories 
                     as customers often search products by categories. 
                </p>
    
            </div>
            <div class="modal-footer">
                <div class="not-added-add-now">
                    <a href="{{ route('admin.category.new') }}" class="modal-close-btn" style="text-align:center; background-color:#0f2a3d; color:#ffefce;" >Add Categories</a>
                </div>
            </div>
        @endif 

    </div>
</div>



  