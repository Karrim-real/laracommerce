@include('layouts.inc.head')
@include('layouts.inc.nav')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Categorys</h1>

		<div class="col-lg-8">
			<input class="form-control padding-right" type="text" placeholder="Search" aria-label="Search">

			</div>
        <div class="btn-toolbar mb-2 mb-md-0">
          <!-- <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div> -->

        </div>
      </div>
      <h4>Add Category</h4>
      @include('layouts.error')
      <div class="col-md-6">
        <form  action="create-category" method="POST" id="add-form" enctype="multipart/form-data">
            {{csrf_field()}}

        {{-- @include('error') --}}
            <div class="mb-3">
              <label for="name" class="form-label">Category name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" aria-describedby="emailHelp">
            </div>

            <div class="mb-6">
                <label for="status" class="form-label">Status</label>
                <input type="checkbox" class="form-check-input" name="status" >
            </div>

            <div class="mb-6">
                <label for="popular" class="form-label">Popular</label>
                <input type="checkbox" class="form-check-input" name="popular" >
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Meta Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_desc" rows="2"></textarea>
            </div>


            <div class="mb-3">
                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" >
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Category Image</label>
                <input type="file" class="form-control" name="image" accept="image/*" id="image" >
            </div>
          <button type="submit" class="btn btn-primary">Add Category</button>
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
