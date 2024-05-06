<input name="parentCategory" type="hidden" value="{{$updateCategory->parent_id ?? null}}" id="selectedItemId" />
<input type="text" id="justAnotherInputBox" class="form-control" placeholder="Type to filter" autocomplete="off" />

<script>
    getItem()

    function getItem() {
        $.ajax({
            method: "GET",
            url: "{{ route('category.tree') }}",
            success: function(data) {
                jsonData = JSON.parse(data)
                if("{{$updateCategory->id ?? null}}" ? true : false)
                {
                    jsonData.unshift({id:'',title:'Root Category'})
                }
                let instance = $("#justAnotherInputBox").comboTree({
                    source: jsonData,
                    selected:[{{$updateCategory->parent_id ?? null ? $updateCategory->parent_id : old('parentCategory') }}],
                    disabled:{{$updateCategory->id ?? 0}},
                    isMultiple: false,
                    // collapse:true,
                });

            }
        })
    }

</script>
