@include('layouts.inc.head')
@include('layouts.inc.nav')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>

		<div>

            @if(session('status'))
            <script>
                swal({
                    title: 'Good Job',
                    text: '{{ session('status') }}',
                    icon: 'success'
                  });
            </script>
            @endif

		</div>
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

      <h4>Recent Products</h4>
      @if (!count($prodsData))
      <script>
          swal({
              title: 'Oops!',
              text: 'No Available Products',
              icon: 'warning'
            });
      </script>
      <div class="col-md-6 center-block">
        <h6 class="alert alert-warning text-center">No Available Products</h6>
      </div>
      @else
      <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category  Name</th>
                    <th scope="col">Short Desc</th>
                    <th scope="col">Selling Price</th>
                    <th scope="col">Discount Price</th>
                    <th scope="col">Pics</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($prodsData as $items)
                  <tr>
                    <td>{{ $items->id }}</td>
                    <td>{{ $items->name }}</td>
                    <td>{{ $items->small_desc }}</td>
                    <td>${{ $items->selling_price }}</td>
                    <td>${{ $items->discount_price }}</td>
                    <td><img class="img-cart" src="{{ asset('uploads/products/images/'.$items->image) }}" alt="{{ $items->name }}" ></td>
                    <td><a href="/product/{{ $items->id }}"><button class="btn btn-success btn-sm">View</button> </a></td>
                    <td><a href="/product/{{ $items->id }}/edit"><button class="btn btn-info btn-sm">Edit</button> </a></td>
                    <td><a href="/product/{{ $items->id }}/delete"><button class="btn btn-danger btn-sm">Delete</button> </a></td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif
    </main>
  </div>
</div>
@include('layouts.inc.footer')
