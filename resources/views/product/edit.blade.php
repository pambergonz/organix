<form class="" action='/product/update/{{$product->id}}' method="post" enctype="multipart/form-data">
  @csrf
  {{method_field('PUT')}}

    <label for="productName">Name:
      <input type="text" id="productName" name="name" value="">
    </label>
    <label for="productPrice">Price:
      <input type="number" id="productPrice" name="price" value="">
    </label>
    <label for="productStock">Stock:
      <input type="number" id="productStock" name="stock" value="">
    </label>
    <label for="productRating">Rating:
      <input type="number" id="productRating" name="rating" value="">
    </label>
    <label for="productDescription">Description:
      <input type="text" id="productDescription" name="description" value="">
    </label>
    <label for="productImage">Image:
      <input type="file" id="productImage" name="image" value="">
    </label>
    <button class="submit" type="submit">Submit</button>
  </form>
  <form class="" action='/product/destroy/{{$product->id}}' method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('DELETE')}}
    <button class="submit" type="delete">Delete</button>
  </form>
