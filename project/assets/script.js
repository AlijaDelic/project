$(document).ready(function () {

    //choose ingridians
    var count = -1;
    $("#choosed_ingridian_button").on("click", function () {
        count++;
        var c_ing_name = $("#choosed_ingridian_name").val();
        var c_ing_amount = $("#choosed_ingridian_amount").val();

        if (c_ing_name != "" && c_ing_amount != "" && c_ing_name != "Izaberite sastojak") {
            var ingName = 'ingridian['+count+'][name]';
            var ingAmount = 'ingridian['+count+'][amount]';
            $("#table-3").append("" +
                "<tr>" +
                "<td>" +
                "<input class='form-control text-center' type='text' name='"+ ingName +"' value=' "+ c_ing_name + "'>" +
                "</td>" +
                "<td>" +
                "<input class='form-control text-center ' type='text' name='"+ ingAmount +"' value='" + c_ing_amount + "'>" +
                "</td>" +
                "<td>" +
                "<div class='btn btn-danger delete-1'>Obrisi</div></td></tr>");

            $(".delete-1").on("click", function () {
                $(this).closest('tr').remove();
            })
        }
        else {
            $("#alert-msg").addClass("alert-danger");
            $("#alert-msg").text("Popunite sva polja");
        }
    })
    //validation
    $("#add_new_button").on("click", function () {
        count +=1;
        $("#alert-msg-1").hide();

        var add_new_ing = $("#add_new_ingridian").val();
        var add_ing_amount = $("#add_new_ingridian_amount").val();


        var all_existing_ingridians = $('#choosed_ingridian_name').find('option');
        var exist = 1;
        for (var i = 0; i < all_existing_ingridians.length; i++) {
            if (all_existing_ingridians[i].value == add_new_ing) {
                exist = 0
            }
        }
        var compare = exist * all_existing_ingridians.length;
        if (compare == 0) {
            $("#alert-msg-1").addClass("alert-danger");
            $("#alert-msg-1").text("Sastojak je u listi iznad.");
            $("#alert-msg-1").show();
            return;
        }

        if (add_new_ing != "" && add_ing_amount != "") {
            var ingName = 'ingridian['+count+'][name]';
            var ingAmount = 'ingridian['+count+'][amount]';
            $("#table-3").append("" +
                "<tr><td>" +
                "<input class='form-control text-center' type='text' name='"+ ingName +"' value=' "+ add_new_ing + "'>" +
                "</td>" +
                "<td>" +
                "<input class='form-control text-center' type='text' name='"+ ingAmount +"' value='" + add_ing_amount + "'>" +
                "</td>" +
                "<td><div class='btn btn-danger delete-1'>Obrisi</div></td>" +
                "</tr>");
        }
        else {

            $("#alert-msg-1").addClass("alert-danger");
            $("#alert-msg-1").text("Popunite sva polja");
            $("#alert-msg-1").show();
        }

        $(".delete-1").on("click",function () {
            $(this).closest('tr').remove();
        })
    })

    /*search*/
    /*$(".search-button").on("click",function () {
        var search = $(".search-field").val();
        console.log(search);
        if (search != '')
        {

        }
    })*/

});