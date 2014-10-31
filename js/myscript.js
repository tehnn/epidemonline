function LoadTest1(id) {
    var id = id.trim();
    if (id) {
        $.ajax({
            url: 'index.php?r=Test/Load',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $("input[name=res]").val(data);
                $("input[name=txt]").val('');
            }
        });

    }

    return false;
}
