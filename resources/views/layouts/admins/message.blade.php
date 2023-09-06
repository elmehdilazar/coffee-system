<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@if (session()->has("success"))


<div class="position-fixed top-25 start-50  mt-5 translate-middle" style="z-index: 3000;">
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <span class="fas fa-bullhorn me-1"></span>
{{ session()->get("success") }}
  <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
</div>




</div>

@endif


@if (session()->has("error"))

<div class="position-fixed top-25 start-50  mt-5 translate-middle" style="z-index: 3000;">
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <span class="fas fa-bullhorn me-1"></span>
{{ session()->get("error") }}
  <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
</div>




</div>>
@endif

@if (session()->has("warning"))


<div class="position-fixed top-25 start-50  mt-5 translate-middle" style="z-index: 3000;">
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <span class="fas fa-bullhorn me-1"></span>
{{ session()->get("warning") }}
  <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
</div>




</div>
@endif

