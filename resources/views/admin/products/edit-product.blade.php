@include('layouts.inc.head')
@include('layouts.inc.nav')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      </div>

      @include('layouts.error')
      @foreach ($prodData as $items)

      <h4>{{ $items->name }}</h4>
      <div class="col-md-6">

        <form  action="/edit-product/{{ $items->id }}" method="POST" id="add-form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="mb-3">
              <label for="name" class="form-label">product name</label>
              <input type="text" class="form-control" name="name" value=" {{ $items->name }} " id="name" aria-describedby="emailHelp" >
            </div>
            <div class="mb-3">
                <select class="form-control" name="cat_id" id="">
                    <option value=" {{ $items->cat_id }} ">{{ $items->cat_id }} </option>
                    @foreach ($cats as $catItems )
                    <option value=" {{ $catItems->id }} ">{{ $catItems->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="small_desc" class="form-label">Small Description</label>
                <textarea class="form-control" id="description" name="small_desc" rows="2" > {{ $items->small_desc }}</textarea>
            </div>

            <div class="mb-3">
                <label for="selling_price" class="form-label">Selling Price</label>
                <input type="text" class="form-control" name="selling_price" value="{{ $items->selling_price }}"  id="meta_title" aria-describedby="emailHelp" >
            </div>
            <div class="mb-3">
                <label for="discount_price" class="form-label">Discount Price</label>
                <input type="text" class="form-control" name="discount_price" value="{{ $items->discount_price }}"  id="discount_price" aria-describedby="emailHelp" >
            </div>

            <div class="mb-6">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" {{ $items->status === 1 ? 'checked' : '' }} class="form-check-input" name="status"  >
            </div>


            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Producct Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="prod_desc" rows="2" >{{ $items->prod_desc }} </textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Product Keywords</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="prod_keywords" rows="2" >{{ $items->prod_keywords }} </textarea>
            </div>
            <div class="mb-12">
                {{-- <label for="image" class="form-label">Category Image</label> --}}
                <img class="img img-thumbnail" src="{{ asset('uploads/products/images/'.$items->image) }}" alt="{{ $items->name}} " >
            </div>
            @endforeach
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" name="image" accept="image/*" id="image" >
            </div>
            <br>
            <br>
            <br>

            <button type="submit" class="btn btn-primary">Update Products</button>

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
