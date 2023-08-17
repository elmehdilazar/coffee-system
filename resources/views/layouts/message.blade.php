<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@if (session()->has("success"))


<div class="position-fixed top-25 start-50  mt-5 translate-middle" style="z-index: 3000;">

    <div role="alert " aria-live="assertive" aria-atomic="true" class="toast bg-success" data-autohide="false">
        <div class="toast-header bg-success ">
            <span class="rounded mr-2"> <i class="fa fa-check-circle" aria-hidden="true"></i></span>
            <strong class="mr-auto text-white bg-success ">{{ session()->get("success") }} </strong>

            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>




</div>
<script>
    $('.toast').toast('show');
</script>
@endif


@hasSection (session()->has("error"))


<div class="position-fixed top-25 start-50  mt-5 translate-middle" style="z-index: 3000;">

    <div role="alert " aria-live="assertive" aria-atomic="true" class="toast bg-danger" data-autohide="false">
        <div class="toast-header bg-danger ">
            <span class="rounded mr-2"> <i class="fas fa-ban" aria-hidden="true"></i></span>
            <strong class="mr-auto text-white bg-danger ">{{ session()->get("error") }} </strong>

            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>




</div>
<script>
    $('.toast').toast('show');
</script>
@endif

@hasSection (session()->has("warning"))


<div class="position-fixed top-25 start-50  mt-5 translate-middle" style="z-index: 3000;">

    <div role="alert " aria-live="assertive" aria-atomic="true" class="toast bg-warning" data-autohide="false">
        <div class="toast-header bg-warning ">
            <span class="rounded mr-2"> <i class="fas fa-exclamation" aria-hidden="true"></i></span>
            <strong class="mr-auto text-white bg-warning ">{{ session()->get("wrning") }} </strong>

            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>




</div>
<script>
    $('.toast').toast('show');
</script>
@endif

