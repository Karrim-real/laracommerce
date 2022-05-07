@include('layouts.inc.head')
@include('layouts.inc.nav')



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      </div>
      @include('layouts.error')
      @foreach ($dataCat as $items)
      <h4>{{ $items->name }}</h4>
      <div class="col-md-6">

        <form  action="/cate-edit/{{ $items->id }}" method="POST" id="add-form" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="mb-3">
              <label for="name" class="form-label">Category name</label>
              <input type="text" class="form-control" name="name" value=" {{ $items->name }} " id="name" aria-describedby="emailHelp" >
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="2" > {{ $items->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" {{ $items->meta_title }} id="meta_title" aria-describedby="emailHelp" >
            </div>

            <div class="mb-6">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" {{ $items->status === 1 ? 'checked' : '' }} class="form-check-input" name="status" d>
            </div>

            <div class="mb-6">
                <label for="popular" class="form-label">Popular</label>
                <input type="checkbox" class="form-check-input" {{ $items->popular === 1 ? 'checked' : '' }} name="popular"  >
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Meta Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_desc" rows="2" >{{ $items->meta_desc }} </textarea>
            </div>


            <div class="mb-3">
                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                <input type="text" class="form-control"value="{{ $items->meta_keywords }} " name="meta_keywords" id="meta_keywords"  >
            </div>
            <div class="mb-12">
                {{-- <label for="image" class="form-label">Category Image</label> --}}
                <img class="img img-thumbnail" src="{{ asset('uploads/images/'.$items->image) }}". alt="{{ $items->name}} " >

            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                <input type="file" class="form-control" name="image" accept="image/*" id="image" >
            </div>
            @endforeach
            <br>
            <br>
            <br>

          <button type="submit" class="btn btn-primary btn-lg">Update</button>
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
