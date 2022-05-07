

 <h4>Recent Products</h4>
 @if (!count($prods))
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

               @foreach ($prods as $items)
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
