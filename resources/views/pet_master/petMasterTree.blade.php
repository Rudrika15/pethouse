<input name="parentPetMaster" type="hidden" value="{{$updateCategory->parent_id ?? null}}" id="selectedItemId" />
<input type="text" id="justAnotherInputBox" class="form-control" placeholder="Type to filter" autocomplete="off" />

<script>
    getItem()

    function getItem() {
        $.ajax({
            method: "GET",
            url: "{{ route('petmaster.tree') }}",
            success: function(data) {
                jsonData = JSON.parse(data)

                if("{{$updateCategory->id ?? null}}" ? true : false)
                {
                    jsonData.unshift({id:'',title:'Root Pet Master'})
                }
                // console.log(jsonData);
                let instance = $("#justAnotherInputBox").comboTree({
                    source: jsonData,
                    selected:[{{$updateCategory->parent_id ?? null ? $updateCategory->parent_id : old('parentPetMaster') }}],
                    disabled:{{$updateCategory->id ?? 0}},
                    isMultiple: false,
                    // collapse:true,
                });

            }
        })
    }

</script>
