@include('layouts.inc.head')
@include('layouts.inc.nav')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class="btn-toolbar mb-2 mb-md-0">
          <!-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div> -->

        </div>
      </div>
      <h4>Add Product</h4>
      @include('layouts.error')
      <div class="col-md-6">
        <form  action="create" method="POST" id="add-form" enctype="multipart/form-data">
            {{csrf_field()}}

        {{-- @include('error') --}}
            <div class="mb-3">
              <label for="name" class="form-label">Product name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <select class="form-control" name="cat_id" id="">
                    @foreach ($cate as $catItems )
                    <option value=" {{ $catItems->id }} ">{{ $catItems->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Small Description</label>
                <textarea class="form-control" id="description" name="small_desc" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label for="selling_price" class="form-label">Selling Price</label>
                <input type="number" class="form-control" name="selling_price" id="selling_price" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="discount_price" class="form-label">Discount Price</label>
                <input type="number" class="form-control" name="discount_price" id="discount_price" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="prod_desc" rows="2"></textarea>
            </div>
            <div class="mb-6">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" class="form-check-input" name="status" >
            </div>
            <div class="mb-3">
                <label for="meta_keywords" class="form-label">Product Keywords</label>
                <input type="text" class="form-control" name="prod_keywords" id="meta_keywords" >
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" name="image" accept="image/*" id="image" >
            </div>
          <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
        </div>

    </main>
  </div>
</div>
<br>
<br>
<br>
<br>
@include('layouts.inc.footer')
