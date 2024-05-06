<div class="modal fade text-dark" id="editKeyModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card-3d-shadow-radius">
            <div class="modal-header" style="position: relative;">
                <h5 class="modal-title">Edit Package Key</h5>

                <button type="button" class="btn btn-danger btn-shadow" style="position: absolute;right:12px;"
                    data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></button>

            </div>
            <form method="POST" name="editForm" action="{{ route('packagekey.update') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="col-md-12 mb-2">
                        <div class="form-floating">
                            <input type="hidden" id="key_id" value="{{old('key_id')}}" name="key_id" />
                            <input type="text"
                                class="form-control @if ($errors->EditKeyError->first('editKeyTitle')) is-invalid @endif"
                                onkeyup="editKey()" id="editKeyTitle" value="{{ old('editKeyTitle') }}"
                                placeholder="Your Key" name="editKeyTitle">
                            <label for="editKeyTitle">Key Title</label>
                            @if ($errors->EditKeyError->first('editKeyTitle'))
                                <div class='invalid-feedback'>{{ $errors->EditKeyError->first('editKeyTitle') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="form-floating">
                            <input type="number"
                                class="form-control @if ($errors->EditKeyError->first('editKeyPrice')) is-invalid @endif"
                                id="editKeyPrice" value="{{ old('editKeyPrice') }}" placeholder="Key Price"
                                name="editKeyPrice">
                            <label for="editKeyPrice">Key Price</label>
                            @if ($errors->EditKeyError->first('editKeyPrice'))
                                <div class='invalid-feedback'>{{ $errors->EditKeyError->first('editKeyPrice') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-1">
                                <input type="hidden" value="{{old('editImgVal')}}" id="editImgVal" name="editImgVal" />
                                <img
                                src="{{old('editImgVal')}}"
                                id="editImgTag"
                                    class=" img-thumbnail object-fit-cover rounded-circle"
                                    style="max-height: 60px;height: 60px; max-width: 60px;width:60px;" />
                            </div>
                            <div class="col-11">
                                <div class="form-floating">
                                    <input type="file" class="form-control" id="editKeyIcon"
                                        placeholder="Your Key Icon" name="editKeyIcon">
                                    <label for="editKeyIcon">Key Icon</label>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 mb-2">
                        <div class="form-floating">
                            <textarea class="form-control" style="height: 100px;" id="editKeyDescription" placeholder="Key Description"
                                name="editKeyDescription">{{ old('editKeyDescription') }}</textarea>
                            <label for="editKeyDescription">Key Description</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-shadow" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-shadow">Update</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End Large Modal-->
@if (count($errors->EditKeyError))
    <script>
        $(document).ready(function() {
            $("#editKeyModal").modal('show');
        })
    </script>
@endif
<script>
    $(".edit-modal").click(function() {
        id = $(this).data("id")
        title = $(this).data("title")
        price = $(this).data("price")
        description = $(this).data("description")
        icon = $(this).data("icon")
        $("#editKeyTitle").val(title)
        $("#editKeyPrice").val(price)
        $("#editKeyDescription").val(description)
        $("#key_id").val(id)
        $("#editImgVal").val(icon)
        $("#editImgTag").attr("src",icon)
        // alert(id + title + price + description)
    })

    $(document).ready(function() {
        $('#editKeyModal').on('hidden.bs.modal', function(e) {
            $(".invalid-feedback").remove();
            $(".is-invalid").removeClass("is-invalid");
        })

    })
</script>
